<?php

namespace App\Repositories;

use App\Models\ {
    Auto
};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new AutoRepository instance.
     *
     * @param  \App\Models\Auto $auto
     */
    public function __construct(Auto $auto) //...
    {
        $this->model = $auto;
    }

    /**
     * Create a query for Auto.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getData($request, $parameters)
    {
       $query = $this->model
                ->select('id', 'country_id', 'name', 'image', 'active')
                ->orderBy($parameters['order'], $parameters['direction']);

        if(auth()->user()->role != 'admin') $query->where('active', 1);        
       
       return $query->get();         
    }

    /**
     * Store a newly created auto in storage.
     *
     * @param  \App\Http\Requests\AutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
       return Auto::create($request->all());
    } 

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */    
    public function update($request, $auto)
    {
       $auto->update($request->all());
    }        

}
