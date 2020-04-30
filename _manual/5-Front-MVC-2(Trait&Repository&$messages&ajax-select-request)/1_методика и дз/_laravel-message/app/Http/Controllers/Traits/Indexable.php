<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Indexable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\MessageRepository
     * @var \App\Repositories\AdminRepository     
     */
    protected $repository; //MessageRepository or AdminRepository

    /**
     * The namespace
     *
     * @var string
     */
    protected $namespace; //front or back

    /**
     * Display a listing of the records.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //CardController, AdminController
        $messages = $this->repository->getData($request, $this->getParameters());

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view($this->namespace . ".brick-standard", ['messages' => $messages])->render(),
            ]);
        }
        
        //front or back
        return view($this->namespace . '.index', compact('messages'));
        //return view($this->namespace . '.index');
    }

    /**
     * Get parameters.
     *
     * @param  ...
     * @return array
     */
    protected function getParameters()
    {
        // Default parameters
        $parameters = config("parameters.".$this->namespace); //$parameters['order'], $parameters['direction'] 

        return $parameters; 
    }        

}