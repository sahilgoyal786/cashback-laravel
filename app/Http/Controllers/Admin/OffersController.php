<?php namespace cashback\Http\Controllers\Admin;

use cashback\Category;
use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\Offer;
use cashback\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $offers = Offer::join('categories', 'offers.category_id', '=', 'categories.id')
            ->join('stores', 'stores.id', '=', 'categories.store_id')
            ->orderBy('stores.name', 'asc')
            ->paginate(25, ['stores.name as store', 'stores.image as store_image', 'categories.name as category', 'offers.id as id',
                'offers.name as name', 'offers.link', 'offers.description as description', 'offers.featured as featured', 'offers.expiry_date']);

        return view('admin/offers/index')->with('offers', $offers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $categories = Category::join('stores', 'stores.id', '=', 'categories.store_id')
            ->select(['stores.name as store_name', 'categories.name', 'categories.id'])->orderBy('stores.name', 'asc')->get();

        $values = [];
        $stores = Store::ordered();
        foreach ($stores as $store) {
            $cats = [];
            foreach ($categories as $category) {
                if (strcmp($category['store_name'], $store['name']) == 0) {
                    $cats[] = array('id' => $category['id'], 'name' => $category['name']);
                }
            }
            $values[$store['name']] = $cats;
        }
        return view('admin.offers.create')
            ->with('store_name', '')
            ->with('categories', $values)
            ->with('category_id', 0)
            ->with('offer', new Offer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'link' => 'required',
            'description' => 'required',
            'expiry_date' => 'required',
        ]);
        if(!isset($request['featured'])){
            $request['featured'] = 0;
        }
        Offer::create($request->all());
        Session::flash('status', 'The offer has been added successfully.');
        return redirect('admin/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //

        $offer = Offer::find($id);

        $categories = Category::join('stores', 'stores.id', '=', 'categories.store_id')
            ->select(['stores.name as store_name', 'categories.name', 'categories.id'])
            ->orderBy('stores.name', 'asc')
            ->orderBy( 'categories.name','asc')->get();
        $stores = Store::ordered();

        $values = [];
        foreach ($stores as $store) {
            $cats = [];
            foreach ($categories as $category) {
                if (strcmp($category['store_name'], $store['name']) == 0) {
                    $cats[] = array('id' => $category['id'], 'name' => $category['name']);
                }
            }
            $values[$store['name']] = $cats;
        }


        return view('admin.offers.edit')
            ->with('categories', $values)
            ->with('category_id', $offer->category_id)
            ->with('store_name', Category::find($offer->category_id)->getStore()->name)
            ->with('offer', $offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        //
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'link' => 'required',
            'description' => 'required',
            'expiry_date' => 'required',
        ]);
        if(!isset($request['featured'])){
            $request['featured'] = 0;
        }
        Offer::find($id)->update($request->all());
        Session::flash('status', 'The offer has been updated successfully.');
        return redirect('admin/offers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        Offer::destroy($id);
        Session::flash('status', 'The offer has been deleted successfully');
        return redirect('admin/offers');
    }

    public function get_category_offers($id)
    {

        $offers = Offer::join('categories', 'offers.category_id', '=', 'categories.id')
            ->join('stores', 'stores.id', '=', 'categories.store_id')
            ->where('category_id', $id)
            ->orderBy('stores.name', 'asc')
            ->paginate(25, ['stores.name as store', 'stores.image as store_image', 'categories.name as category', 'offers.id as id',
                'offers.name as name', 'offers.link', 'offers.description as description','offers.featured as featured',  'offers.expiry_date']);

        return view('admin/offers/index')->with('offers', $offers);
    }


}
