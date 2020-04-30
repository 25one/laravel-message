<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Requests\ApimessageRequest   

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
    //public function store(Request $request)
    public function store(ApimessageRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() for ApimessageRequest $request + see in ApimessageRequest
        {
            return $request->validator->errors(); //{"message":["The message field is required."]}
        } else {

            return json_encode($this->repository->storeapi($request)); //true or false (will be ->save() in Repository, create – won’t be because $request->apitoken is not used)    
        }
    }

}
