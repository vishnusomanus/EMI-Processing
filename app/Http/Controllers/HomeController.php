<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoanDetailService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $loanDetailService;

    public function __construct(LoanDetailService $loanDetailService)
    {
        $this->loanDetailService = $loanDetailService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loanDetails = $this->loanDetailService->getAllLoanDetails();
        return view('home', compact('loanDetails'));
    }
}
