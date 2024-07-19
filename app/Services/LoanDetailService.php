<?php
namespace App\Services;

use App\Repositories\LoanDetailRepository;

class LoanDetailService
{
    protected $repository;

    public function __construct(LoanDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllLoanDetails()
    {
        return $this->repository->all();
    }
}
