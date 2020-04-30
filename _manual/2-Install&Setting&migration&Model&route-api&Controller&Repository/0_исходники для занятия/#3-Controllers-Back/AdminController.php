<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Controllers\Traits\Indexable,
   Http\Requests\CardRequest,
   Models\Joined

};

class AdminController extends Controller
{
    use Indexable;
    //...

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
        //$this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->middleware('admin')->only('create', 'store');
        $this->repository = $repository;
        $this->namespace = 'back';
    }

    /**
     * Create a new view for storing.
     *
     * @return void
     */
    public function create()
    {
        return view('back.cards.create');
    }

    /**
     * Store a new card.
     *
     * @return void
     */
    public function store(CardRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('cards.create'))->with('card-ok', 'New card has been created...');
    }  

    /**
     * Edit-view for selected card.
     *
     * @return void
     */
    public function edit(Joined $card) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $card);

       return view('back.cards.edit', compact('card')); //['card' => $card]
    } 

    /**
     * Update selected card.
     *
     * @return void
     */
    public function update(CardRequest $request, Joined $card) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $card);

       $this->repository->update($request, $card); 

       return redirect(route('dashboard'))->with('card-updated', 'The card has been updated...');
    }   

    /**
     * Delete selected card.
     *
     * @return void
     */
    public function destroy(Request $request, Joined $card) //!!!RESTful ->find($id)
    {
       $this->authorize('manage', $card);     

       //$this->repository->destroy($card); 
       $card->delete();

       return $this->index($request);
    }                        

}
