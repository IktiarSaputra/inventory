<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductIn;
use App\Models\Product;
use App\Models\Expense;
use App\Models\Suplier;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productin = ProductIn::orderBy('created_at', 'DESC')->get();
        $product = Product::orderBy('created_at', 'ASC')->get();
        $suplier = Suplier::orderBy('created_at', 'ASC')->get();
        return view('productIn.index', compact(['productin', 'product', 'suplier']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|integer',
            'suplier_id' => 'required|integer',
            'price' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $productin = ProductIn::create([
            'product_id' =>$request->product_id,
            'suplier_id' => $request->suplier_id,
            'price' => $request->price,
            'qty' => $request->stok,
        ]);

        $product = Product::find($request->product_id);
        $stok = $product->qty;
        $product->update([
            'qty' => $request->stok + $stok,
        ]);

        $expense = Expense::create([
            'product_id' => $request->product_id,
            'productin_id' => $productin->id,
            'description' => "Membeli",
            'qty' => $productin->qty,
            'price' => $productin->price,
            'subtotal' => $productin->price * $productin->qty
        ]);

        return redirect()->back()->with('insert', "Insert");
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
        $productin = ProductIn::find($id);
        $product = Product::all();
        $suplier = Suplier::all();
        return view('productin.edit', compact(['productin', 'product', 'suplier']));
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
        $this->validate($request, [
            'product_id' => 'required|integer',
            'price' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $productin = ProductIn::find($id);
        $product = Product::find($productin->product_id);
        $stok = $product->qty;
        if ($productin->qty > $request->stok) {
            $jumlah = $productin->qty - $request->stok;
            $product->update([
                'qty' => $stok - $jumlah,
            ]);
        } else {
            $jumlah = $request->stok - $productin->qty;
            $product->update([
                'qty' => $stok + $jumlah,
            ]);
        }
        $productin->update([
            'product_id' =>$request->product_id,
            'suplier_id' =>$request->suplier_id,
            'price' => $request->price,
            'qty' => $request->stok,
        ]);

        $expense = Expense::find($productin->id);
        $expense->update([
            'product_id' => $request->product_id,
            'productin_id' => $productin->id,
            'description' => "Membeli",
            'qty' => $productin->qty,
            'price' => $productin->price,
            'subtotal' => $productin->price * $productin->qty
        ]);

        return redirect(route('productIn.index'))->with('update', "Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $product_id)
    {
        $productin = ProductIn::find($id);
        $expense = Expense::find($productin->id);
        $expense->delete();
        $product = Product::find($product_id);
        $stok = $productin->qty;
        if ($product->qty > $stok) {
            $product->update([
                'qty' => $product->qty - $stok
            ]);
        } else {
            $product->update([
                'qty' => 0
            ]);
        }
        
        $productin->delete();

        return redirect()->back()->with('delete',"sukses");
    }
}
