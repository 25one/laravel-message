<?php

namespace App\Repositories;

use App\Models\ {
    Apimessage
};

class FrontRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new FrontRepository instance.
     *
     * @param  \App\Models\Apimessage $apimessage
     */
    public function __construct(Apimessage $apimessage)
    {
        $this->model = $apimessage;
    }

    /**
     * Get types collection
     *
     * @return Illuminate\Database\Eloquent\Collection Object
     */
    public function getData($request)
    {
        $query = $this->model
            ->select('id', 'user_id', 'title', 'message', 'datevisit')
            ->orderBy('user_id', 'asc')
            ->whereHas('user', function ($q) use ($request) {  
                if($request->user) $q->where('user_id', '=', $request->user);
            })->get();       
        //if($request->type) $query = $query->where('type_id', '=', $request->type)->get();
        //else $query = $query->get();
        
        return $query;      
    }

}
