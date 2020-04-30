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
    /**
     * The AdminRepository instance.
     *
     * @var \App\Repositories\AdminRepository
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
        //$this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->repository = $repository;
    }

    /**
     * Store a newly created apiuser in storage.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApimessageRequest $request)
    //public function store(Request $request)
    {
 
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() for ApimessageRequest $request + see in ApimessageRequest
        {
            return $request->validator->errors(); //{"message":["The message field is required."]}
        } else {

            return $this->repository->storeapimessage($request); //in mobi-message must be later {"title":"aaa","message":"bbb","datevisit":"2019-12-12","id":1}
        }  
    
    }        

}

