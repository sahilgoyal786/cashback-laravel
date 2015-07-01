<?php namespace cashback;

use Illuminate\Database\Eloquent\Model;

class Constants extends Model {


    public static function availableCategories(){
        return [
            ['name'=>'Electronics','slug'=>'electronics'],
            ['name'=>'Fashion','slug'=>'fashion'],
            ['name'=>'Travel','slug'=>'travel'],
            ['name'=>'Mobile Recharge','slug'=>'mobile-recharge'],
            ['name'=>'Mobiles','slug'=>'mobiles'],
            ['name'=>'Flowers and Gifts','slug'=>'flowers-and-gifts'],
            ['name'=>'Books','slug'=>'books'],
            ['name'=>'Food','slug'=>'food'],
            ['name'=>'Home and Kitchen','slug'=>'home-and-kitchen'],
            ['name'=>'Jewellery','slug'=>'jewellery'],
        ];
    }


}
