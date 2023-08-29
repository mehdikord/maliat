<?php
namespace App\Interfaces\Companies;

interface CompaniesInterface
{

    public function index();

    public function store($request);

    public function update($request,$item);

    public function delete($item);




}
