<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  //without «,» for end
    Repositories\AdminRepository,
    Http\Requests\MessageRequest,    
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
        //$this->middleware('admin')->only('edit', 'update', 'destroy');
        //$this->middleware('admin');
        $this->middleware('auth');
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
       $this->authorize('manage', $message);
        
       return view('back.messages.edit', compact('message'));
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @param  \App\Models\Apimessage $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Apimessage $message)
    //public function update(Request $request, Apimessage $message)
    {
        $this->authorize('manage', $message);

        $this->repository->update($request, $message);

        return redirect(route('dashboard'))->with('message-updated', __('The message has been successfully updated'));
     } 

    /**
     * Remove the message from storage.
     *
     * @param  \App\Models\Apimessage $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apimessage $message)
    {
        $this->authorize('manage', $message);

        $message->delete();

        return response()->json();
    }               

}
