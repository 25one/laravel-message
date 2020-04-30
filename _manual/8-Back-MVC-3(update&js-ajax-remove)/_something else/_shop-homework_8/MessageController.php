<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\MessageRepository,
    Models\Apimessage,
    Http\Requests\MessageRequest

};

class MessageController extends Controller
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
    public function __construct(MessageRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the home-page.
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

        $message = $restmessage;

        return view('front.messages.restmessages.edit', compact('message'));
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @param  \App\Models\Apimessage $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Apimessage $restmessage)
    //public function update(Request $request, Apimessage $restmessage)
    {
        $this->authorize('manage', $restmessage);

        $this->repository->update($request, $restmessage);

        return redirect(route('messages'))->with('message-updated', __('The message has been successfully updated'));
     } 

                                
}
