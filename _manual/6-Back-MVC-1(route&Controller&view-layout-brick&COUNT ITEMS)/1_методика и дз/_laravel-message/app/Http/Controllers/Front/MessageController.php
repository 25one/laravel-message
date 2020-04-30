<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\MessageRepository,
   Http\Controllers\Traits\Indexable

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
        //$this->middleware('auth');
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

}
