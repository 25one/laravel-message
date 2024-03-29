<?php

namespace App\Repositories;

use App\Models\ {
   Apimessage

};

class MessageRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_apimessage;

    /**
     * Create a new MessageRepository instance.
     *
     * @param  \App\Models\Apimessage $apimessage
     */
    public function __construct(Apimessage $apimessage)
    {
        $this->model_apimessage = $apimessage; 
    }

    /**
     * Create a query for Messages.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->model_apimessage
            ->select('id', 'user_id', 'title', 'message', 'datevisit')
            ->orderBy('datevisit', 'desc');

        if($request->search_messages) $query->where('message', 'like', '%' . $request->search_messages . '%');

        return $query->get();
    }

}
