<?php namespace cashback\Http\Controllers\Admin;

use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\Store;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class StoresController extends Controller
{

    /**
     *Checks if the user is logged in or not
     *
     */
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
        $stores = Store::paginate(25);
        return view('admin.stores.index')->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $store = new Store();
        return view('admin.stores.create')->with('store', $store);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'), 'name' => Input::get('name'), 'link' => Input::get('link'), 'description' => Input::get('description'), 'featured' => Input::get('featured'));
        $name = Input::get('name');
        $file['slug'] = str_replace(' ', '-', strtolower($name));
        $store = new Store($file);
        $rules = ['image' => 'required', "name" => "required", 'description' => 'required',
            'slug' => 'required|unique:stores|max:255' , "link" => "required"];
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('admin/stores/create')->with('store', $store)->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'stores'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = str_replace(' ', '_', $file['name']) . '_' . rand(111111, 999999) . '.' . $extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                $file['image'] = $destinationPath . '/' . $fileName;
                if(!isset($file['featured'])){
                    $file['featured'] = '';
                }
                $store = new Store($file);
                $store->save();


                Session::flash('status', 'Store added successfully');

                return redirect('admin/stores');
            } else {
                // sending back with error message.
//                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('admin/stores/create')->withErrors('error', 'uploaded file is not valid');
            }
        }
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
        return view('admin/stores/edit')->with('store', Store::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        // getting all of the post data


        $file = array('image' => Input::file('image'), 'name' => Input::get('name'),  "link" => Input::get('link'), 'description' => Input::get('description'), 'featured' => Input::get('featured'));
        $name = Input::get('name');
        $file['slug'] = str_replace(' ', '-', strtolower($name));
        $store = new Store($file);
        $old = Store::findOrFail($id);
        // setting up rules
        $rules = ["name" => "required", 'description' => 'required', 'slug' => 'required', "link" => "required"]; //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::back()->with('store', $store)->withErrors($validator);
        } else {

            if (Input::file('image')) {
                // checking file is valid.
                if (Input::file('image')->isValid()) {
                    $destinationPath = 'stores'; // upload path
                    $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                    $fileName = str_replace(' ', '_', $file['name']) . '_' . rand(111111, 999999) . '.' . $extension; // renameing image
                    Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                    $file['image'] = $destinationPath . '/' . $fileName;
                } else {
                    // sending back with error message.
//                Session::flash('error', 'uploaded file is not valid');
                    return Redirect::back()->withErrors('error', 'uploaded file is not valid');
                }
            } else {
                $file = array_diff($file, array("image" => ""));
            }

            if(!isset($file['featured'])){
                $file['featured'] = 0;
            }
            $old->update($file);
            Session::flash('status', 'Store updated successfully');

            return Redirect::to('admin/stores');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //

        File::delete(Store::find($id)->image);
        Store::destroy($id);

        return redirect('admin/stores');

    }


}
