<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository

};
use Validator;

class ApiController extends Controller
{

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
     * Store a newly created apimessage in storage.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return json_encode($this->repository->storeapi($request)); //true or false (will be ->save() in Repository, create – won’t be because $request->apitoken is not used)    
    }

}
