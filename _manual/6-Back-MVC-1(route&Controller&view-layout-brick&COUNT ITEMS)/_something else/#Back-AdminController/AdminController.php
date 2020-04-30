<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  
    Repositories\AdminRepository,
    Http\Controllers\Traits\Indexable,
    Http\Requests\JoinedRequest,
    Models\Joined

};

class AdminController extends Controller
{
    use Indexable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $adminrepository)
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
        //$this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->middleware('admin')->only('create', 'store');
        $this->repository = $adminrepository;
        $this->namespace = 'back';
    }

    /**
     * Create a new view for creating a new card in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */
    public function create(){
       return view('back.cards.create');    
    }

    /**
     * Store a newly created card in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JoinedRequest $request){
       $this->repository->store($request);
       return redirect(route('cards.create'))->with('card-ok', 'Card has been successfully created...');    
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */       
    public function edit(Joined $card){
       $this->authorize('manage', $card); 
       return view('back.cards.edit', compact('card'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */    
    public function update(JoinedRequest $request, Joined $card){
       $this->authorize('manage', $card);
       $this->repository->update($request, $card);
       return redirect(route('dashboard'))->with('card-updated', 'Card has been successfully updated...');    
    } 

    /**
     * Remove the card from storage.
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joined $card){
       $this->authorize('manage', $card); 
       $card->delete();

       return response()->json();    
    }          

}
