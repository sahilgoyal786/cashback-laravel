<?php namespace cashback\Http\Controllers\Admin;

use cashback\Category;
use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        $categories = Category::join('stores', 'stores.id', '=', 'categories.store_id')
            ->paginate(25,array('stores.image', 'categories.cashback', 'categories.name', 'categories.id'));

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.categories.create')
            ->with('stores', Store::ordered())
            ->with('current_store', new Store())
            ->with('category', new Category());
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
            'name' => 'required',
            'cashback' => 'required|numeric',
        ]);
        //
        Category::create($request->all());
        Session::flash('status', 'The category has been added successfully');
        return redirect('admin/categories');


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
        $category = Category::find($id);
        return view('admin.categories.edit')
            ->with('stores', Store::ordered())
            ->with('current_store', $category->getStore())
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'cashback' => 'required|numeric',
        ]);


        Category::find($id)->update($request->all());
        Session::flash('status','The category has been updated successfully');
        return redirect('admin/categories');

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

        Category::destroy($id);
        Session::flash('status', 'The category has been deleted successfully');
        return redirect('admin/categories');
    }


    public function get_store_categories($id){

        return view('admin/stores/categories')
            ->with('categories',Store::find($id)->getCategories()->paginate(25))
            ->with('store',Store::find($id));
    }


}
