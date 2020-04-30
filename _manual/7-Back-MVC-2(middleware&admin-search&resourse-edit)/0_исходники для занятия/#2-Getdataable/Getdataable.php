<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Getdataable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\MessageRepository
     * @var \App\Repositories\AdminRepository     
     */
    protected $model; //Apimessage

    /**
     * Get data from messages.
     *
     * @param  \App\Models\Apimessage $apimessage      
     */
    public function getData($request, $parameters) //$parameters['order'], $parameters['direction']
    {
        $query = $this->model
           ->select('id', 'user_id', 'title', 'message', 'datevisit')
           ->orderBy($parameters['order'], $parameters['direction']); 

        if($request->type) $query->where('user_id', $request->type);

        return $query->get();   
    }

}