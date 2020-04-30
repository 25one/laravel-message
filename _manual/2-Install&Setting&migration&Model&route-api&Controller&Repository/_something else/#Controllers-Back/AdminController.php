<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
   Http\Controllers\Controller,
   Repositories\AdminRepository,
   Http\Controllers\Traits\Indexable,
   Http\Requests\AutoRequest,
   Models\Auto

};

class AdminController extends Controller
{
    use Indexable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('auth');
        $this->middleware('admin')->only('create', 'store', 'destroy');
        $this->repository = $repository;
        $this->namespace = 'back';
    }

    /**
     * Create a new view for creating a new auto in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */    
    public function create()
    {
       return view('back.autos.create');
    }

    /**
     * Upload a new image for creating a new auto in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $file = $request->image;         
        $filecontent = $file->openFile()->fread($file->getSize());  
        $filename = date('YmdHis') . $file->getClientOriginalName();  
        $file->move(public_path() . '/images/', $filename);
        return view('back.autos.create', ['image' => $filename]);
    }    

    /**
     * Store a newly created auto in storage.
     *
     * @param  \App\Http\Requests\AutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutoRequest $request)
    {
       $this->repository->store($request); 
       return redirect(route('dashboard'))->with('auto-ok', 'New auto has been successlully created...');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auto $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
       //...

       return view('back.autos.edit', compact('auto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AutoRequest $request
     * @param  \App\Models\Auto $auto
     * @return \Illuminate\Http\Response
     */    
    public function update(AutoRequest $request, Auto $auto)
    {
       //... 

       $this->repository->update($request, $auto); 
       return redirect(route('dashboard'))->with('auto-updated', 'New auto has been successlully updated...');
    } 

    /**
     * Remove the card from storage.
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        //$this->authorize('manage', $card);

        $auto->delete();

        return response()->json(); 
    }             

}
