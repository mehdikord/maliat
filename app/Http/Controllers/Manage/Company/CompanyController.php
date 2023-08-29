<?php

namespace App\Http\Controllers\Manage\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Companies\CompaniesRequest;
use App\Http\Requests\Companies\CompaniesUpdateRequest;
use App\Interfaces\Companies\CompaniesInterface;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private CompaniesInterface $repository;
    public function __construct(CompaniesInterface $faqs)
    {
        $this->repository = $faqs;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(CompaniesRequest $request)
    {
        return $this->repository->store($request);
    }
    public function update(Company $company,CompaniesUpdateRequest $request)
    {
        return $this->repository->update($request,$company);
    }

    public function delete(Company $company)
    {
        return $this->repository->delete($company);
    }
}
