<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait Indexable
{
    /**
     * The Repository instance.
     *
     * @var \App\Repositories\MessageRepository
     * @var \App\Repositories\AdminRepository     
     */
    protected $repository; //MessageRepository or AdminRepository

    /**
     * The namespace
     *
     * @var string
     */
    protected $namespace; //front or back

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;    

    /**
     * Display a listing of the records.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //MessageController, AdminController
        $messages = $this->repository->getData($request, $this->getParameters($request), $this->nbrPages);
        $links = $messages->appends($this->getParameters($request))->links($this->namespace . '.pagination'); //!!!$this->getParameters($request) - СОХРАНЕНИЕ ПАРАМЕТРОВ СОРТИРОВКИ ПРИ ПАГИНАЦИИ  
        //$links = $messages->links($this->namespace . '.pagination'); //!!!$this->getParameters($request) - СОХРАНЕНИЕ ПАРАМЕТРОВ СОРТИРОВКИ ПРИ ПАГИНАЦИИ               

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view($this->namespace . ".brick-standard", ['messages' => $messages])->render(),
                'pagination' => $links->toHtml(), //!!!ajax-ДОПОЛНЕНИЕ (СМ.В js)                
            ]);
        }
        
        //front or back
        return view($this->namespace . '.index', compact('messages', 'links'));
        //return view($this->namespace . '.index');
    }

    /**
     * Get parameters.
     *
     * @param  ...
     * @return array
     */
    protected function getParameters($request)
    {
        // Default parameters
        $parameters = config("parameters.".$this->namespace); //$parameters['order'], $parameters['direction'] 

        foreach($parameters as $key => &$value){
           if(isset($request->$key)){
              $value=$request->$key;
           }
        }

        return $parameters; 
    }        

}