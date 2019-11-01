<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
// use ;
use App\Models\Product;
use App\Models\Cat;

class ImportProduct extends Command {

    protected $signature = 'import:product';
    protected $description = 'Product import';
    public function __construct()    {        parent::__construct();    }
    public function handle(){
        echo "Get products file skip\n";
        // exec('wget --secure-protocol=TLSv1 --no-check-certificate --header="Content-Type: text/xml" --http-user=18 --http-password=18 --post-file=post_items.xml -O public\storage\data_items.xml -q https://46.39.29.2:2244/rk7api/v0/xmlinterface.xml');
        $data_items = Storage::get('public\data_items.xml');
// Items
        echo "Import Items: ";
        Product::truncate();

        $xml3 = simplexml_load_string($data_items);
        $json3 = json_encode($xml3);
        $array3 = json_decode($json3,TRUE,512,JSON_INVALID_UTF8_IGNORE);
        echo count($array3["RK7Reference"]["Items"]['Item']);
        echo " = ";
        // echo Product::count();
        echo "\n";

// // FOREACH Items
        foreach ($array3["RK7Reference"]["Items"]['Item'] as $item) {
//     // RANDOM
            $arrX = array("/uploads/product-chicken-wings.jpg", "/uploads/product-burger.jpg", "/uploads/product-chicken-burger.jpg", "/uploads/product-sushi.jpg", "/uploads/product-pizza.jpg" );
            $randIndex = array_rand($arrX, 2);
//     // FIND



            $row = Product::create( array('id' => $item['@attributes']['Ident'], 'name' => $item['@attributes']['Name'], 'ident' => $item['@attributes']['Ident'], 'xml_name' => $item['@attributes']['Name'], "cat_id" => (int) $item['@attributes']['MainParentIdent'], 'xml_cat' => $item['@attributes']['CategPath'], 'image'=> $arrX[$randIndex[0]] ) );
            echo "+";


            // $row = Product::where('ident' , '=', $item['@attributes']['Ident'])->first();
            // if ($row) {
            //     $row->update( array('ident' => $item['@attributes']['Ident'], 'xml_name' => $item['@attributes']['Name'], "cat_id" => (int) $item['@attributes']['MainParentIdent'], 'xml_cat' => $item['@attributes']['CategPath'] ) );
            //     echo "~";
            // } else {
            //     $row = Product::create( array('id' => $item['@attributes']['Ident'], 'name' => $item['@attributes']['Name'], 'ident' => $item['@attributes']['Ident'], 'xml_name' => $item['@attributes']['Name'], "cat_id" => (int) $item['@attributes']['MainParentIdent'], 'xml_cat' => $item['@attributes']['CategPath'], 'image'=> $arrX[$randIndex[0]] ) );
            //     echo "+";
            // }









            // $row->save();
//             unset($row);
//             // echo $arrX[$randIndex[0]];
            unset($randIndex);
        }
        echo "\n";
// FOREACH Items END

    }
}
