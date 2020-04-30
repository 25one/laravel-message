<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository
   //Http\Requests\ApiRequest,

};

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Store a new message.
     *
     * @return void
     */
    //public function store(ApiRequest $request)
    public function store(Request $request)
    {
       return json_encode($this->repository->storeapi($request)); //true or false (will be $this->model->save() in Repository, Apimessage::create – won’t be because $request->apitoken is not used)        
    }

}
