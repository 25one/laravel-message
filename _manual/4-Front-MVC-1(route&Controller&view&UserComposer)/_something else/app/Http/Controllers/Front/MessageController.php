<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller  //without «,» for end
    //Repositories\FrontRepository

};

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function index(Request $request, FrontRepository $repository)
    public function index(Request $request)
    {
        //$cards = $repository->getData($request);

        /*
        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("front.brick-standard", ['cards' => $cards])->render(),
            ]);
        } 
        */

        //return view('front.index', compact('cards'));
        //return view('front.index', ['cards' => $cards]);
        return view('front.index');
    }
}
