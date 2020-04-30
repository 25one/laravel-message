<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\MessageRepository

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
                                
}
