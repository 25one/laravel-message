<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ClearCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearcart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear old items from cart';

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
        DB::delete('delete from carts where month(datecart)<>' . date('m'));
    }
}
