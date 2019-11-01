<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
// use ;
use App\Models\Product;
use App\Models\Cat;

class ImportPrice extends Command {



    // php artisan import:import:price
    protected $signature = 'import:price';
    protected $description = 'Price import';
    public function __construct()    {        parent::__construct();    }
    public function handle(){

        echo "Import Prices: ";
        // exec('wget --secure-protocol=TLSv1 --no-check-certificate --header="Content-Type: text/xml" --http-user=18 --http-password=18 --post-file=post_pricetypes.xml -O public\storage\data_pricetypes.xml -q https://46.39.29.2:2244/rk7api/v0/xmlinterface.xml');
        // exec('wget --secure-protocol=TLSv1 --no-check-certificate --header="Content-Type: text/xml" --http-user=18 --http-password=18 --post-file=post_prices.xml -O public\storage\data_prices.xml -q https://46.39.29.2:2244/rk7api/v0/xmlinterface.xml');

        $data_prices = Storage::get('public\data_prices.xml');
        $json2 = json_encode(  simplexml_load_string($data_prices) );
        $array2 = json_decode($json2,TRUE);

        $ii=0;
        foreach ($array2["RK7Reference"]["Items"]['Item'] as $itemp) {

            // Основная цена
            if ($itemp['@attributes']['PriceType']=="3") {
                // echo $itemp['@attributes']['PriceType'];
                // !Бесконеность
                if ("9223372036854775807"!=$itemp['@attributes']['Value']) {

                        // echo $itemp['@attributes']['Value']."\n";

                        // echo $itemp['@attributes']['ObjectID']."\n";
                        // ищем по id
                    // array( "ident" => $itemp['@attributes']['ObjectID'])
                        // $p = Product::where('ident', $itemp['@attributes']['ObjectID'])->first();
                        $p = Product::where('ident' , '=', $itemp['@attributes']['ObjectID'])->first();
                        // $p = Product::find();
                        if ($p) {
                                // echo $p->name;
                                // $p->price = $itemp['@attributes']['Value'];
                                $p->price_amount = $itemp['@attributes']['Value']/100;

                                // echo $itemp['@attributes']['Value'];

                                $p->save();
                                echo "$";
                                $ii=$ii+1;
                        }
                        unset($p);
                }
            }
        }
        
        echo "\n";
        // всего против загружено
        echo "Product::count ";
        echo Product::count();
        echo "\n";
        echo "all prices: ".count($array2["RK7Reference"]["Items"]['Item'])." !== ".$ii." uploads";
        echo "\n";
        echo Product::count()-$ii. " product bad prices";
        echo "\n";
    }

}
