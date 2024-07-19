<?php

namespace App\Http\Controllers;

use App\Services\EmiDetailService;

class EmiDetailsController extends Controller
{
    protected $emiDetailService;

    public function __construct(EmiDetailService $emiDetailService)
    {
        $this->emiDetailService = $emiDetailService;
        $this->middleware('auth');
    }

    public function process()
    {
        $this->emiDetailService->processEmiDetails();
        return redirect()->route('emi.show');
    }

    public function show()
    {
        $emiDetails = $this->emiDetailService->getAllEmiDetails();
        return view('emi.index', compact('emiDetails'));
    }
}
