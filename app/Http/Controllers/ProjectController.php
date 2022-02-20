<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
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
        $projects = Project::all();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('project.create', compact('customers'));
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
                'name'          => 'required|unique:projects',
                'budget'        => 'required',
                'start_date'    => 'required',
                'customer_id'   => 'required',
            ],
            [
                'name.required'         => 'El Nombre es necesario',
                'name.unique'           => 'Este Proyecto ya existe',
                'budget.required'       => 'El Precio de Venta es necesario',
                'start_date.required'   => 'La Fecha de inicio es necesaria',
                'customer_id.required'  => 'Es necesario seleccionar un Cliente',
            ],
        );

    Project::insert(
        [
            'name'          => $request->name,
            'budget'        => $request->budget,
            'start_date'    => $request->start_date,
            'customer_id'   => $request->customer_id,
            'created_at'    => Carbon::now(),
        ]
    );

    $notification = array(
        'message' => 'Proyecto registrado con exito',
        'alert-type' => 'success'
    );

    return redirect()->route('project.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit', compact('project'));
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
            'name'          => 'required|unique:products',
            'category'      => 'required',
            'sale_pirce'    => 'required',
            'minstock'      => 'required',
        ],
        [
            'name.required'         => 'El Nombre es necesario',
            'name.unique'           => 'Este Proyecto ya existe',
            'sale_price.required'   => 'El Precio de Venta es necesario',
            'category.required'     => 'Selecciona una Categoria',
            'minstock.required'     => 'El Minimo de Stock es necesario',
        ],
    );

    Product::find($id)->update(
        [
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'budget' => $request->purchase_price,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]
    );

    $notification = array(
        'message' => 'Proyecto Actualizado',
        'alert-type' => 'success'
    );

    return redirect()->route('project.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index')->with('deleted','yes');
    }

    public function import(Request $request) {
        $this->validate($request,
            [
                'import_file'   => 'required|mimes:xlsx,cvs',
            ],
            [
                'import_file.required'  => 'Es necesario seleccionar un archivo.',
                'import_file.mimes'     => 'El archivo debe ser de tipo: xlsx o cvs.',
            ],
        );

        Excel::import(new ProductsImport(), $request->file('import_file'));

        $notification = array(
            'message' => 'Productos Importados correctamente',
            'alert-type' => 'success'
        );
    
        return redirect()->route('product.index')->with($notification);
    }
}
