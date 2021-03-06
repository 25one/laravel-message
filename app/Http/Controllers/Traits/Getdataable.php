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
    protected $namespace; //back && others...

    /**
     * Get data from messages.
     *
     * @param  \App\Models\Apimessage $apimessage      
     */
    public function getData($request, $parameters, $nbrPages) //$parameters['order'], $parameters['direction']
    {
        $query = $this->model
           ->select('id', 'user_id', 'title', 'message', 'datevisit')
           ->orderBy($parameters['order'], $parameters['direction']); 

        //if($request->type) $query->where('user_id', $request->type);
        if($parameters['changeduser']) $query->where('user_id', $parameters['changeduser']);           

        //if(!\Request::is('/') && auth()->user()->role !== 'admin') $query->where('user_id', auth()->user()->id);
        if($this->namespace == 'back' && auth()->user()->role !== 'admin') $query->where('user_id', auth()->user()->id);

        //return $query->get();   
        return $query->paginate($nbrPages); //!!!not get - paginate
    }

}