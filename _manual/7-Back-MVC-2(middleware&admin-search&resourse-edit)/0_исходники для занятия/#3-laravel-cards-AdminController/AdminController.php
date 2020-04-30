<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
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
    //use Http\Controllers\Traits\Indexable; 

    /**
     * The Controller instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    //protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('admin');
        //$this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->middleware('admin')->only('create', 'store');
        $this->repository = $repository;
        $this->namespace = 'back';
    }

    /**
     * Show the application front-dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function index(Request $request)
    {
        $cards = $this->repository->getData($request);

        return view('front.index', compact('cards'));
    }
    */

    /**
     * Create a new view for creating a new card in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
        return view('back.cards.create');        
     }

    /**
     * Store a newly created card in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @return \Illuminate\Http\Response
     */
     public function store(JoinedRequest $request)
     {
        $this->repository->store($request);

        return redirect(route('cards.create'))->with('card-ok', 'New card has been successfully created...'); //redirect(url('/cards/create'))...       
     }

    /**
     * Create a new view for editing a card in storage
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
     public function edit(Joined $card)
     {
        $this->authorize('manage', $card);

        return view('back.cards.edit', compact('card'));
     }

    /**
     * Update selected card in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @param  \App\Models\Joined $card     
     * @return \Illuminate\Http\Response
     */
     public function update(JoinedRequest $request, Joined $card)
     {
        $this->authorize('manage', $card);

        $this->repository->update($request, $card);

        return redirect(route('dashboard'))->with('card-updated', 'Selected card has been successfully updated...'); //redirect(url('/dashboard'))...       
     }

    /**
     * Updatenotrestful selected card in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @param  \App\Models\Joined $card     
     * @return \Illuminate\Http\Response
     */
     public function updatenotrestful(JoinedRequest $request, $id)
     {
        $this->repository->updatenotrestful($request, $id);

        return redirect(route('dashboard'))->with('card-updated', 'Selected card has been successfully updated...'); //redirect(url('/dashboard'))...       
     }

    /**
     * Delete selected card in storage.
     *
     * @param  ...
     * @param  \App\Models\Joined $card     
     * @return \Illuminate\Http\Response
     */
     public function destroy(Joined $card)
     {
        $this->authorize('manage', $card);

        //$this->repository->destroy($card);
        $card->delete();

        return response()->json();      
     }     

}
