<?php

namespace App\Services;

use App\Repositories\EmiDetailRepository;
use App\Repositories\LoanDetailRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class EmiDetailService
{
    protected $emiDetailRepository;
    protected $loanDetailRepository;

    public function __construct(
        EmiDetailRepository $emiDetailRepository,
        LoanDetailRepository $loanDetailRepository
    ) {
        $this->emiDetailRepository = $emiDetailRepository;
        $this->loanDetailRepository = $loanDetailRepository;
    }

    public function processEmiDetails()
    {
        $loanDetails = $this->loanDetailRepository->all();
        $minDate = $loanDetails->min('first_payment_date');
        $maxDate = $loanDetails->max('last_payment_date');
    
        // Generate dynamic columns based on minimum and maximum dates
        $startDate = Carbon::parse($minDate);
        $endDate = Carbon::parse($maxDate);
        $dates = [];
        while ($startDate->lte($endDate)) {
            $dates[] = $startDate->format('Y_M');
            $startDate->addMonth();
        }
    
        $columns = implode(", ", array_map(function ($date) {
            return "`$date` DECIMAL(15, 2) DEFAULT 0";
        }, $dates));
    
        $this->emiDetailRepository->deleteAll();
        DB::statement("CREATE TABLE emi_details (clientid BIGINT, $columns)");
    
        foreach ($loanDetails as $detail) {
            $emiAmount = round($detail->loan_amount / $detail->num_of_payment, 2);
            $emidata = ['clientid' => $detail->clientid];
    
            $currentDate = Carbon::parse($detail->first_payment_date);
            for ($i = 0; $i < $detail->num_of_payment; $i++) {
                $column = $currentDate->format('Y_M');
                if (isset($emidata[$column])) {
                    $emidata[$column] += $emiAmount;
                } else {
                    $emidata[$column] = $emiAmount;
                }
                $currentDate->addMonthNoOverflow();
            }
    
            // Adjust the last month's EMI to ensure the total EMI equals the loan amount
            $totalEmiPaid = array_sum(Arr::except($emidata, ['clientid']));
            if ($totalEmiPaid != $detail->loan_amount) {
                $lastColumn = Carbon::parse($detail->last_payment_date)->format('Y_M');
                $emidata[$lastColumn] += $detail->loan_amount - $totalEmiPaid;
            }
    
            $this->emiDetailRepository->create($emidata);
        }
    }
    

    public function getAllEmiDetails()
    {
        return $this->emiDetailRepository->all();
    }
}
