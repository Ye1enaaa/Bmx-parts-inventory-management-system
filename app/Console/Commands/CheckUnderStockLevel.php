<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
//use Twilio\Rest\Client;

class CheckUnderStockLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-under-stock-level';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //dd(session('alert'));
        $stock = DB::table('products')->value('quantity');
        
        if($stock < 6){
            session()->flash('alert','Stock quantity is below 5!');
        }
        //dd(session('alert'));
    }
}
