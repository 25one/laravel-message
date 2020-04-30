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

    /**
     * Update selected message.
     *
     * @return void
     */
    public function update(MessageRequest $request, Apimessage $restmessage) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $restmessage);

       $this->repository->update($request, $restmessage); 

       return redirect(route('messages'))->with('message-updated', 'The message has been updated...');
    }

    /**
     * Delete selected message.
     *
     * @return void
     */
    public function destroy(Request $request, Apimessage $restmessage) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $restmessage);

       $restmessage->delete(); 

       return $this->index($request);
    }    

    /**
     * Create a new view for creating a new message in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */              
    public function create()
    {
       return view('front.messages.restmessages.create');
    }

    /**
     * Store a newly created message in storage.
     *
     * @param  \App\Http\Requests\MessageRequest $restmessage
     * @return \Illuminate\Http\Response
     */      
    public function store(MessageRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('restmessages.create'))->with('message-ok', 'The new message has been created...');
    }  
       
}
