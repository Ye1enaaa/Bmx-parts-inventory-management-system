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
    /*public function handle(Client $twilio): void
    {
        $stock = DB::table('products')->value('quantity');
        
        if($stock < 5){
            $twilio = new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'));
            $twilio->messages->create(
                '+639659065840',
                [
                    'from' => config('services.twilio.phone_number'),
                    'body' => 'Stock is below 5, Current stock' . $stock,
                ]
            );

            $this->info('SMS notif sent successful');
        }else{
            $this->info('Stock above 5');
        }
    }*/
}
