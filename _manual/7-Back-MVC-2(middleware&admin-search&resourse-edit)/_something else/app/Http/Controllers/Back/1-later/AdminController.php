<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  //without «,» for end
    Repositories\AdminRepository,
    Http\Controllers\Traits\Indexable,
    Models\Apimessage

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
        $this->middleware('admin');
        $this->repository = $adminrepository;
        $this->namespace = 'back';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apimessage $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Apimessage $message)
    {
       return view('back.messages.edit', compact('message'));
    }    

}
