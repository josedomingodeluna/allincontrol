<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Employee;
use App\Models\Branch;

class EmployeeController extends Controller
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
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();

        return view('employee.create', compact('branches'));
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
                'first_name'    => 'required',
                'last_name'     => 'required',
                'rfc'           => 'min:4|max:13|unique:employees',
                'curp'          => 'min:0|max:18',
            ],

            [
                'rfc.unique'    => 'RFC ya esta registrado',
            ],
        );

        Employee::insert(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'rfc' => $request->rfc,
                'curp' => $request->curp,
                'phone' => $request->phone,
                'address' => $request->last_name,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Empleado registrado',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.index')->with($notification);
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
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
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

        Employee::find($id)->update(
            [
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'rfc'         => $request->rfc,
                'curp'         => $request->curp,
                'address'           => $request->address,
                'phone'           => $request->phone,
                'notes'         => $request->notes,
                'created_at'    => Carbon::now(),
            ]
        );
        
        $notification = array(
            'message' => 'Empleado Actualizado',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
            $employee->delete();
            return redirect()->route('employee.index')->with('deleted','yes');
    }
}
