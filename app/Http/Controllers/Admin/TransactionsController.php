<?php namespace cashback\Http\Controllers\Admin;

use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\Store;
use cashback\Transaction;
use cashback\User;
use Illuminate\Http\Request;

class TransactionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.transactions.index')->with('transactions',Transaction::paginate(25));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.transactions.create')
            ->with('stores',Store::all())
            ->with('users',User::all())
            ->with('transaction',new Transaction());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $transaction = new Transaction($request->all());
        $transaction->save();
        return redirect('admin/transactions');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('admin.transactions.edit')
            ->with('stores',Store::all())
            ->with('users',User::all())
            ->with('transaction',Transaction::find($id));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id,Request $request)
	{
        $transaction = Transaction::find($id);
        $transaction->update($request->all());
        return redirect('admin/transactions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Transaction::destroy($id);
        \Session::flash('status','The transaction has been deleted successfully.');
        return redirect('admin/transactions');
	}

}
