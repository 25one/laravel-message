<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\MessageRepository,
   Http\Controllers\Traits\Indexable,
   Http\Requests\MessageRequest

};

class MessageController extends Controller
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
    public function __construct(MessageRepository $repository)
    //public function __construct()
    {
        $this->middleware('auth')->only('create', 'store');
        $this->repository = $repository;
        $this->namespace = 'front';
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
     * Create a new view for storing.
     *
     * @return void
     */
    public function create()
    {
        return view('front.messages.create');
    }

    /**
     * Store a new message.
     *
     * @return void
     */
    public function store(MessageRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('newmessages.create'))->with('message-ok', 'New message has been created...');
    }  

}
