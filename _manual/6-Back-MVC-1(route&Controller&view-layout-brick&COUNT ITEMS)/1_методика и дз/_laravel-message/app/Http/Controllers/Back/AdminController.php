<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Controllers\Traits\Indexable

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

}
