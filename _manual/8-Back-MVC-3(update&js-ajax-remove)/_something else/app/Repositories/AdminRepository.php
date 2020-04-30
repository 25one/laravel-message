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
     * Store post of apiuser.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @return void
     */
    public function storeapimessage($request)
    {
        return $apimessage = Apimessage::create(array_merge($request->all(), ['user_id' => \Auth::guard('api')->user()->id])); //in mobi-message must be later {"title":"aaa","message":"bbb","datevisit":"2019-12-12","id":1}
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

    /**
     * Update message.
     *
     * @param  \App\Models\Apimessage $message
     * @return void
     */
    public function update($request, $message)
    {
        $message->update($request->all());
        //$message->title = $request->title;
        //$message->message = $request->message;
        //$message->save();        
    }        


}

