<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
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
        return view('contact.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('contact.create', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForCustomer($id)
    {
        $customer = Customer::find($id);
        return view('contact.createForCustomer', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'customer_id'   => 'required',
                'name'          => 'required',
                'position'      => 'required',
                'phone'         => 'required',
            ],

            [
                'name.required'     => 'Campo obligatorio',
                'position.required' => 'Campo obligatorio',
                'phone.required'    => 'Campo obligatorio',
            ],
        );

        Contact::insert(
            [
                'customer_id'   => $request->customer_id,
                'name'          => $request->name,
                'position'      => $request->position,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'created_at'    => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Datos de Contacto registrados con exito',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
