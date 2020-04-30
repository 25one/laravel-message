<?php

namespace App\Repositories;

use App\Models\ {
    Joined

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
     * @param  \App\Models\Joined $joined      
     */
    public function __construct(Joined $joined)
    {
        $this->model = $joined;
    }

    /**
     * Get data from cards.
     *
     * @param  \App\Models\Joined $joined      
     */
    public function getData($request, $parameters) //$parameters['order'], $parameters['direction']
    {
        $query = $this->model
           ->select('id', 'user_id', 'card_id', 'number')
           //->where($parameters['wherewho'], 'like', '%' . $parameters['wherewhat'] . '%')
           ->orderBy($parameters['order'], $parameters['direction']); 

           if(auth() && auth()->user()->role != 'admin') $query->where('user_id', auth()->user()->id);
           //if(\Auth() && \Auth()->user()->role != 'admin') $query->where('user_id', \Auth()->user()->id);

        return $query->get();   
    }

    /**
     * Store a new card.
     *
     * @return void
     */
    public function store($request)
    {
       //Joined::create($request->all());
       $this->model->card_id = $request->card_id; 
       $this->model->user_id = $request->user_id; 
       $this->model->number = $request->number; 
       $this->model->save();                      
    }    

    /**
     * Update selected card.
     *
     * @return void
     */
    public function update($request, $card) //!!!RESTful ->find($id)
    {
       //$card->update($request->all());
       $card->card_id = $request->card_id; 
       $card->user_id = $request->user_id; 
       $card->number = $request->number; 
       $card->save();          
    }        

    /**
     * Delete selected card.
     *
     * @return void
     */
    public function destroy($card) //!!!RESTful ->find($id)
    {
       $card->delete(); 
    }        

}
