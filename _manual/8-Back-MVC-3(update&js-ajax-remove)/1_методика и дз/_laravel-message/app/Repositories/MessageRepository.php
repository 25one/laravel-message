<?php

namespace App\Repositories;

use App\Models\ {
    Apimessage

};
use App\Http\Controllers\Traits\Getdataable;

class MessageRepository
{
    use Getdataable;

    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    //protected $model;

    /**
     * Create a new MessageRepository instance.
     *
     * @param  \App\Models\Apimessage $apimessage      
     */
    public function __construct(Apimessage $apimessage)
    {
        $this->model = $apimessage;
    }

    /**
     * Get data from messages.
     *
     * @param  \App\Models\Apimessage $apimessage      
     */
    /*
    public function getData($request, $parameters) //$parameters['order'], $parameters['direction']
    {
        $query = $this->model
           ->select('id', 'user_id', 'title', 'message', 'datevisit')
           ->orderBy($parameters['order'], $parameters['direction']); 

        if($request->type) $query->where('user_id', $request->type);

        return $query->get();   
    }
    */

}
