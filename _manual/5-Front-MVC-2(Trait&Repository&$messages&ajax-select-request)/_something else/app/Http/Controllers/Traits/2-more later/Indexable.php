<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Indexable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\FrontRepository(or AdminRepository)
     * @var ...     
     */
    protected $repository;

    /**
     * The layout
     *
     * @var string
     */
    protected $namespace; 

    /**
     * Display a listing of the records.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = $this->repository->getData($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view($this->namespace . ".brick-standard", ['messages' => $messages])->render(),
            ]);
        } 

        return view($this->namespace . '.index', ['messages' => $messages]);
        //return view('front.index', ['namespace' => $this->namespace]);
    }

}