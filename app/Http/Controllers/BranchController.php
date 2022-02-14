<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Branch;
use App\Models\Folio;

class BranchController extends Controller
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
        $branches = Branch::all();

        return view('branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
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
                'name' => 'required|unique:branches',
                'phone' => 'required|min:10|max:10',
                'address' => 'required'
            ],
            [
                'name.required' => 'El nombre es necesario',
                'phone.required' => 'El teléfono debe ser a 10 digitos',
                'phone.min' => 'Debes ingresar 10 digitos',
                'phone.max' => 'No debe de ser mayor a 10 digitos',
                'address.required' => 'La dirección es necesaria'
            ]
        );

        Branch::insert(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email_cs' => $request->email_cs,
                'email_s' => $request->email_s,
                'created_at' => Carbon::now(),
            ]
        );
        $notification = array(
            'message' => 'Sucursal registrada',
            'alert-type' => 'success'
        );

        return redirect()->route('branch.index')->with($notification);
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
        $branch = Branch::find($id);
        return view('branch.edit', compact('branch'));
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
                'name' => 'required',
                'phone' => 'required|min:10|max:10',
                'address' => 'required'
            ],
            [
                'name.required' => 'El nombre es necesario',
                'phone.required' => 'El teléfono debe ser a 10 digitos',
                'phone.min' => 'Debes ingresar 10 digitos',
                'phone.max' => 'No debe de ser mayor a 10 digitos',
                'address.required' => 'La dirección es necesaria'
            ]
        );

        Branch::find($id)->update(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email_cs' => $request->email_customerservice,
                'email_s' => $request->email_sales,
                'created_at' => Carbon::now(),
            ]
        );
        $notification = array(
            'message' => 'Sucursal actualizada',
            'alert-type' => 'success'
        );

        return redirect()->route('branch.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $count = Folio::where('branch', $id)->count();
        if($count>0) {
            return redirect()->route('branch.index')->with('deleted','no');
        } else {
            $branch->delete();
            return redirect()->route('branch.index')->with('deleted','yes');
        }
    }
}
