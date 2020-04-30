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
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * Show the application home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request, $this->getParameters($request), $this->nbrPages);
        $links = $products->appends($this->getParameters($request))->links($this->namespace . '.pagination');         

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view($this->namespace . ".brick-standard", ['products' => $products])->render(),
                'pagination' => $links->toHtml(),                
            ]);
        } 

        return view($this->namespace . '.index', ['products' => $products, 'links' => $links]);
    }

    /**
     * Get parameters.
     *
     * @param  ...
     * @return array
     */
    protected function getParameters($request)
    {
        // Default parameters
        $parameters = config("parameters.".$this->namespace); //$parameters['order'], $parameters['direction'] 

        foreach($parameters as $key => &$value){
           if(isset($request->$key)) {
              $value = $request->$key; 
           }
        } 

        return $parameters; 
    }        

}