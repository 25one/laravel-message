<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  //without «,» for end
    Repositories\FrontRepository,
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
        //$this->middleware('auth');
        $this->repository = $frontrepository;
        $this->namespace = 'front';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    //public function index(Request $request, CardRepository $repository)
    public function index(Request $request)    
    {
        //$cards = $repository->getData($request);
        //return view('front.index', compact('cards')); //['cards' => $cards]
        return view('front.index');
    }
    */

}
