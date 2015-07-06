<?php namespace cashback\Http\Controllers;

use cashback\Category;
use cashback\Offer;
use cashback\Store;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function store($slug)
    {

        $store = Store::slug($slug)->get()->first();
        return view('store')
            ->with('store', $store)
            ->with('categories', $store->getCategories()->get())
            ->with('offers', Offer::join('categories', 'offers.category_id', '=', 'categories.id')
                ->join('stores', 'stores.id', '=', 'categories.store_id')
                ->select('categories.name as category',
                    'categories.cashback as cashback', 'offers.id as id', 'stores.slug as slug',
                    'offers.name as name', 'offers.link', 'offers.description as description', 'offers.expiry_date')
                ->where('slug', $slug)
                ->orderBy('expiry_date', 'desc')->active())
            ->with('expired_offers', Offer::join('categories', 'offers.category_id', '=', 'categories.id')
                ->join('stores', 'stores.id', '=', 'categories.store_id')
                ->select('categories.name as category',
                    'categories.cashback as cashback', 'offers.id as id', 'stores.slug as slug',
                    'offers.name as name', 'offers.link', 'offers.description as description', 'offers.expiry_date')
                ->where('slug', $slug)
                ->orderBy('expiry_date', 'desc')->expired());
    }

    public function stores(){
        return view('stores')->with('stores',Store::ordered()->get());
    }

    public function category($category){
        $category = str_replace('-',' ',$category);
        $category = str_replace('_',' ',$category);
//        return Store::join('categories','stores.id','=','categories.store_id')
//        ->where('categories.name',$category)
//            ->select('categories.name as category','categories.cashback as cashback','stores.name as store_name', 'stores.slug as slug')->get();
        return view('category')
            ->with('stores', Store::join('categories','stores.id','=','categories.store_id')
            ->where('categories.name',$category)
            ->select('categories.name as category','stores.max_cashback as max_cashback','stores.name as store_name','stores.image as image', 'stores.slug as slug')->get()
            )->with('category',$category);
    }



}
