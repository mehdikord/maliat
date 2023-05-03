<?php
namespace App\Repository\Users;



use App\Interfaces\Users\UsersInterface;
use App\Models\Admin;

class UsersRepository implements UsersInterface
{
    //Managers
    public function managers_index()
    {
        return response_success(Admin::all());
    }

    public function managers_store($request)
    {

    }

    public function managers_update($request,$item)
    {

    }

    public function managers_delete($item)
    {

    }

}
