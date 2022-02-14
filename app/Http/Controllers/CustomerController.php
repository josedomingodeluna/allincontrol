<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'first_name' => 'required',
                'last_name'  => 'required',
                'phone'      => 'required',
                'email'      => 'required',
            ],
        );

        Customer::insert(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'rfc' => $request->rfc,
                'zip' => $request->zip,
                'address' => $request->address,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Cliente Registrado',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'first_name' => 'required'
            ],
        );

        Customer::find($id)->update(
            [
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'rfc'           => $request->rfc,
                'zip'           => $request->zip,
                'address'       => $request->address,
                'notes'         => $request->notes,
                'created_at'    => Carbon::now(),
            ]
        );
        
        $notification = array(
            'message' => 'Cliente Actualizado',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('deleted','yes');
    }
}
