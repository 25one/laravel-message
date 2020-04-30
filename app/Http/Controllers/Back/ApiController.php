<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Requests\ApiRequest,
   Models\User

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
    public function store(ApiRequest $request)
    //public function store(Request $request)
    {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return json_encode($request->validator->errors());
        }      

        return $this->repository->storeapi($request); //{..., {'id'}}
    }  

    /**
     * Finish of user-registration.
     *
     * @return void
     */
    public function index()
    {
        $user = User::find(\Auth::guard('api')->user()->id);
        $user->active = 1;
        $user->save();
        return redirect(route('login'));
    }

}
