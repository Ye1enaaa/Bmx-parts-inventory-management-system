<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
//use Twilio\Rest\Client;
use App\Mail\StockNotification;

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
        //$stock = DB::table('products')->value('quantity');
        $stocks = Product::all();

        foreach($stocks as $stock){
            if($stock->quantity < 6){
                session()->flash('alert','Stock quantity is below 5!');
                $email = 'avilasonson@gmail.com';
                Mail::to($email)->send(new StockNotification($stock->name,$stock->quantity));
            }
        }
        //dd(session('alert'));
    }
}
