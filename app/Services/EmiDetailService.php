<?php

namespace App\Services;

use App\Repositories\EmiDetailRepository;
use App\Repositories\LoanDetailRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        // Method implementation...
    }

    public function getAllEmiDetails()
    {
        return $this->emiDetailRepository->all();
    }
}
