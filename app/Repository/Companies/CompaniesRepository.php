<?php
namespace App\Repository\Companies;


use App\Interfaces\Companies\CompaniesInterface;
use App\Models\Company;

class CompaniesRepository implements CompaniesInterface
{
    public function index()
    {
        return response_success(Company::OrderbyDesc('id')->get());
    }

    public function store($request)
    {
        $item = Company::create([
            'name' => $request->name,
            'code' => 625987451,
            'economic_code' => $request->economic_code,
            'type' => $request->type,
            'description' => $request->description,
            'is_active' => 1,
        ]);
        return response_success($item);
    }

    public function update($request,$item)
    {
        $item->update([
            'name' => $request->name,
            'economic_code' => $request->economic_code,
            'type' => $request->type,
            'description' => $request->description,
            'is_active' => 1,
        ]);
        return response_success($item);
    }

    public function delete($item)
    {
        $item->delete();
        return response_success(true,'item deleted success');

    }


}
