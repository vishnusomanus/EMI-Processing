<?php

namespace App\Http\Controllers;

use App\Services\LoanDetailService;

class LoanDetailsController extends Controller
{
    protected $loanDetailService;

    public function __construct(LoanDetailService $loanDetailService)
    {
        $this->loanDetailService = $loanDetailService;
    }

    public function index()
    {
        $loanDetails = $this->loanDetailService->getAllLoanDetails();
        return view('loan_details.index', compact('loanDetails'));
    }
}

