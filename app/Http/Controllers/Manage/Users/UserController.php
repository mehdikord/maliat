<?php

namespace App\Http\Controllers\Manage\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\Users\UsersInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UsersInterface $repository;
    public function __construct(UsersInterface $users)
    {
        $this->repository = $users;
    }

    public function managers_index()
    {
        return $this->repository->managers_index();
    }
}
