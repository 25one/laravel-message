<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Indexable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\CardRepository
     * @var \App\Repositories\AdminRepository     
     */
    protected $repository; //CardRepository or AdminRepository

    /**
     * The namespace
     *
     * @var string
     */
    protected $namespace; //front or back

    /**
     * Show the application home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request, $this->getParameters());

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view($this->namespace . ".brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view($this->namespace . '.index', ['products' => $products]);
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