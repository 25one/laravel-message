<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  //without «,» for end
    Repositories\FrontRepository,
    Http\Requests\MessageRequest,    
    Http\Controllers\Traits\Indexable

};

class MessageController extends Controller
{
    use Indexable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FrontRepository $frontrepository)
    //public function __construct()
    {
        $this->middleware('auth')->only('create', 'store');
        $this->repository = $frontrepository;
        $this->namespace = 'front';
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.messages.create');
    } 

    /**
     * Store a newly created message in storage.
     *
     * @param  \App\Http\Requests\MessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    //public function store(Request $request)
    {
        $this->repository->store($request);        
        return redirect(route('newmessages.create'))->with('message-ok', __('The message has been successfully created'));   
    }               

}
