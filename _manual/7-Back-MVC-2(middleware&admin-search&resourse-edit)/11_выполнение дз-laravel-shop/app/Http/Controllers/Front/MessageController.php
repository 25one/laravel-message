<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller, 
   Repositories\MessageRepository,
   Models\Apimessage     

};

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $messages = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("front.messages.brick-standard", ['messages' => $messages])->render(),
            ]);
        }                

        return view('front.messages.index', ['messages' => $messages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apimessage $message
     * @return \Illuminate\Http\Response
     */    
    public function edit(Apimessage $restmessage)
    {
        $this->authorize('manage', $restmessage);

        $message = $restmessage; //because view edit use $message

        return view('front.messages.restmessages.edit', compact('message')); //because view edit use $message
    }
       
}
