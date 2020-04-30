<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Controllers\Traits\Indexable,
   Models\Apimessage,
   Http\Requests\MessageRequest

};

class AdminController extends Controller
{
    use Indexable;
    //...

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    //public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
        $this->repository = $repository;
        $this->namespace = 'back';
    }

    /**
     * Show front-home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function index(Request $request)
    {
        //$cards = $this->repository->getData($request);

        //return view('front.index', compact('cards')); //['cards' => $cards]
        return view('front.index');
    }
    */

    /**
     * Edit-view for selected card.
     *
     * @return void
     */
    public function edit(Apimessage $message) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $message);

       return view('back.messages.edit', compact('message')); //['message' => $message]
    } 

    /**
     * Update selected message.
     *
     * @return void
     */
    public function update(MessageRequest $request, Apimessage $message) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $message);

       $this->repository->update($request, $message); 

       return redirect(route('dashboard'))->with('message-updated', 'The message has been updated...');
    } 

    /**
     * Delete selected message.
     *
     * @return void
     */
    public function destroy(Request $request, Apimessage $message) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $message);

       $message->delete(); 

       return $this->index($request);
    }         

}
