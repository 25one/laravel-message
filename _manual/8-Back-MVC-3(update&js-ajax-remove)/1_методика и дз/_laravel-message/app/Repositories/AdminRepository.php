<?php

namespace App\Repositories;

use App\Models\ {
    Apimessage

};
use App\Http\Controllers\Traits\Getdataable;

class AdminRepository
{
    use Getdataable;

    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    //protected $model;

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
     * Store a new message.
     *
     * @return void
     */
    public function storeapi($request)
    {
       //return Apimessage::create($request->all());
       return Apimessage::create(array_merge($request->all(), ['user_id' => \Auth::guard('api')->user()->id]));      
       /*
       $this->model->title = $request->title; 
       $this->model->message = $request->message; 
       $this->model->datevisit = $request->datevisit; 
       $this->model->save(); 
       */                     
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

    /**
     * Update selected message.
     *
     * @return void
     */
    public function update($request, $message)
    {
       //$message->update($request->all()); 
       //$message->user_id = $request->user_id;
       $message->title = $request->title;
       $message->message = $request->message;
       //$message->datevisit = $request->datevisit;  
       $message->save();                   
    }   

}
