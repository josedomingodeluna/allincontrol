<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;

use App\Models\PurchaseOrder;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\Folio;
use App\Models\DocumentData;
use App\Models\PurchaseOrderProduct;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::all();

        return view('purchase_order.index', compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers = Customer::all();
        
        if($customers->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras a ningun Cliente',
                'alert-type' => 'error'
            );

            return redirect()->route('customer.create')->with($notification);
        }
        
        $branches = Branch::all();
        
        if($branches->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Sucursal',
                'alert-type' => 'error'
            );

            return redirect()->route('branch.create')->with($notification);
        }

        $folios = Folio::all();

        if($folios->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Serie',
                'alert-type' => 'error'
            );

            return redirect()->route('folio.create')->with($notification);
        }

        return view('purchase_order.create', compact('customers', 'branches', 'folios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $total = \Cart::total();

        $this->validate($request,
            [
                'branch'    => 'required',
                'folio'     => 'required',
                'customer'  => 'required'
            ],
            [
                'branch.required' => 'La Sucursal es necesario',
                'folio.required' => 'El Folio es necesario',
                'customer.required' => 'El Cliente es necesario'
            ]
        );

        $purchase_order = PurchaseOrder::create(
            [
                'user_id' => $user_id,
                'branch_id' => $request->branch,
                'folio_id' => $request->folio,
                'customer_id' => $request->customer,
                'total' => $total,
                'created_at' => Carbon::now(),
            ]
        );
        
        $purchase_order_id = $purchase_order->id;
        
        foreach(\Cart::content() as $item) {
            PurchaseOrderProduct::insert([
                'purchase_order_id' => $purchase_order_id,
                'product_id' => $item->id,
                'qty' => $item->qty,
            ]);
        }

        \Cart::destroy();

        $notification = array(
            'message' => 'Sucursal registrada',
            'alert-type' => 'success'
        );

        return redirect()->route('purchase_order.index')->with($notification);
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
        //
    }

    
    /**
     * Create a preview purchase order
     */
    public function preview()
    {
        return view('purchase_order.preview');
    }

    public function delete()
    {
        \Cart::destroy();
        
        return redirect()->route('product.index')->with('deleted','yes');
    }

    public function addItem($id, $name, $price)
    {
        \Cart::add($id, $name, 1, $price, 500);

        return redirect()->route('product.index');
    }

    public function editItem(Request $request,$id)
    {
        $qty = (int) $request->quantity;

        \Cart::update($id, $qty);

        return redirect()->route('purchase_order.preview');
    }

    public function removeItem($id)
    {
        \Cart::remove($id);

        return redirect()->route('purchase_order.preview');
    }

    public function getBranchFolios($branch_id) {
        $folios = Folio::where('branch_id',$branch_id)->get();
        return json_encode($folios);
    }

    /**
     * 
     */
    public function print($id) {
        $purchase_order = PurchaseOrder::find($id);
        $customer = Customer::find($purchase_order->customer_id);
        $branch = Branch::find($purchase_order->branch_id);
        $document_data = DocumentData::find(1);
        $items = PurchaseOrderProduct::where('purchase_order_id', $id)->get();

        return view('purchase_order.format', compact('purchase_order', 'items', 'customer','branch','document_data'));
    }
    
}
