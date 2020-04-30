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
    protected $model_message;

    /**
     * Create a new MessageRepository instance.
     *
     * @param  \App\Models\Apimessage $message
     */
    public function __construct(Apimessage $message)
    {
        $this->model_message = $message;
    }

    /**
     * Create a query for Apimessage.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->model_message
            ->select('id', 'user_id', 'title', 'message', 'datevisit')
            ->orderBy('datevisit', 'desc');

        if($request->search_messages) $query->where('message', 'like', '%' . $request->search_messages . '%');

        return $query->get();
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
    }        

}
