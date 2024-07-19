<?php

namespace App\Http\Controllers;

use App\Services\EmiDetailService;

class EmiDetailsController extends Controller
{
    protected $emiDetailService;

    public function __construct(EmiDetailService $emiDetailService)
    {
        $this->emiDetailService = $emiDetailService;
    }

    public function process()
    {
        $this->emiDetailService->processEmiDetails();
        return redirect()->route('emi_details.show');
    }

    public function show()
    {
        $emiDetails = $this->emiDetailService->getAllEmiDetails();
        return view('emi_details.index', compact('emiDetails'));
    }
}
