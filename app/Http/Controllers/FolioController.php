<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Folio;
use App\Models\Branch;

class FolioController extends Controller
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
        $folios = Folio::latest()->get();

        return view('folio.index', compact('folios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $branches = Branch::all();

        if($branches->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Sucursal',
                'alert-type' => 'error'
            );

            return redirect()->route('branch.create')->with($notification);
        }
        return view('folio.create', compact('branches'));
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
                'branch'    => 'required',
                'serie'     => 'required|min:1|max:4',
                'folio'     => 'required'
            ],
            [
                'branch.required'   => 'Debes seleccionar una Sucursal',
                'serie.required'    => 'La Serie es necesaria',
                'serie.min'         => 'Debes ingresar 1 digitos',
                'serie.max'         => 'No debe de ser mayor a 4 digitos',
                'folio.required'    => 'En que numero comenzara la serie'
            ]
        );

        Folio::insert(
            [
                'branch_id' => $request->branch,
                'serie' => $request->serie,
                'folio' => $request->folio,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Folio guardado',
            'alert-type' => 'success'
        );

        return redirect()->route('folio.index')->with($notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $folio = Folio::findOrFail($id);
        $folio->delete();
        return redirect()->route('folio.index')->with('deleted','yes');
    }
}
