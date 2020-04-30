<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Apimessage;
use DB;

class WordMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word {what}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete all messages with selected word';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $what = $this->argument('what');

        //Eloquent-1
        /*
        $messages = Apimessage::select('id')->where('message', 'like', '%' . 'covid' . '%')->get();
        //$messages->delete(); //error
        foreach($messages as $message){
           $message->delete(); 
        }
        */

        //Eloquent-2
        //$messages = Apimessage::select('id')->where('message', 'like', '%' . $what . '%')->delete();  
        
        //DB
        DB::transaction(function() use ($what) {
            DB::insert('insert into messagesarchives select * from apimessages where message like concat("%", ?, "%")', [$what]);         
            DB::delete('delete from apimessages where message like concat("%", ?, "%")', [$what]); //select, insert, update //...values(?, ?, ?)', [$title, ..., ...]
        });

    }
}
