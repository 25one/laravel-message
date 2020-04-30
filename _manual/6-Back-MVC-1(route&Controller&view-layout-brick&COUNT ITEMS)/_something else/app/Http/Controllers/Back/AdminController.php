<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  //without «,» for end
    Repositories\AdminRepository,
    Http\Controllers\Traits\Indexable

};

class AdminController extends Controller
{
    use Indexable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $adminrepository)
    //public function __construct()
    {
        $this->repository = $adminrepository;
        $this->namespace = 'back';
    }

}
