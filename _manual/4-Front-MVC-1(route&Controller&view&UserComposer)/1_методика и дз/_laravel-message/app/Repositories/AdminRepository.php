<?php

namespace App\Repositories;

use App\Models\ {
    Apimessage

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
     * Create a new AdminRepository instance.
     *
     * @param  \App\Models\Apimessage $apimessage      
     */
    public function __construct(Apimessage $apimessage)
    {
        $this->model = $apimessage;
    }

    /**
     * Store a new card.
     *
     * @return void
     */
    public function storeapi($request)
    {
       return Apimessage::create(array_merge($request->all(), ['user_id' => \Auth::guard('api')->user()->id]));
    }

}
