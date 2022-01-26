<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductOut;
use App\Models\Product;
use App\Models\Income;
use App\Models\Suplier;
use Log;
use DB;
use Illuminate\Support\Str;
use PDF;
use App\Models\Order;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productout = ProductOut::orderBy('created_at', 'DESC')->get();
        $product = Product::orderBy('created_at', 'ASC')->get();
        $suplier = Suplier::orderBy('created_at', 'ASC')->get();
        return view('productOut.index', compact(['productout', 'product', 'suplier']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = \Cart::getContent();
        $product = Product::all();
        return view('transaksi.index',compact('carts','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

    public function export($invoice)
    {
        $order = Order::where('invoice',$invoice)->first();
        $productout = ProductOut::where('order_id',$order->id)->get();
        $pdf = PDF::loadView('productout.pdf', compact('order','productout'));
        $pdf->setPaper('A4', 'potrait');
        //$pdf->setPaper('f4', 'potrait');
        return $pdf->stream();
    }

    public function success($invoice)
    {
        $order =Order::where('invoice',$invoice)->first();
        return view('productOut.success',compact('order'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $productout = ProductOut::find($id);
        $income = Income::find($productout->id);
        $income->delete();   
        $order = Order::find($productout->order_id);
        $order->delete();
        $productout->delete();

        return redirect()->back()->with('delete',"sukses");
    }

    public function search(Request $request,$kode)
    {
        if($request->ajax()){
            $output="";
            $products= DB::table('products')->where('kode',$kode)->get()->first();
            return response()->json($products);
        }
    }

    public function addToCart($kode)
    {
        $product = DB::table('products')->where('kode',$kode)->first();

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'stok' => $product->qty,
              )
        ));

        return response()->json(['status' => 'success']);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        // dd($request->all());
          
        // Log::info($input);
     
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
        
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            
            
            \Cart::update($request->id,[
                'quantity' => array (
                    'relative' => false ,
                    'value' => $request->quantity
               ),
            ]);
        }

        // if($request->id && $request->quantity){
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->quantity;
        //     session()->put('cart', $cart);
        //     session()->flash('success', 'Cart updated successfully');
        // }
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
    }

    public function checkout(Request $request)
    {
        $carts = \Cart::getContent();
        $this->data['item'] = $carts;
        $order = Order::create([
            'invoice' => Str::random(4) . '-' . time(),
            'subtotal' => \Cart::getSubTotal(),
        ]);
        foreach ($carts as $item) {
            $product = Product::find($item['id']);
            $stok = $product->qty;
            $product->update([
                'qty' => $stok - $item['quantity']
            ]);
            $productout = ProductOut::create([
                'product_id' => $item['id'],
                'order_id' => $order->id,
                'price' => $item['price'],
                'qty' => $item['quantity'],
            ]);
            $income = Income::create([
                'product_id' => $item['id'],
                'productout_id' => $productout->id,
                'description' => "Menjual",
                'qty' => $productout->qty,
                'price' => $productout->price,
                'subtotal' => $productout->price * $productout->qty
            ]);
            \Cart::remove($item['id']);
        }

        $subtotal = $request->total;
        $pembayaran = $request->uang;
        $kembalian = $pembayaran - $subtotal;
        $invoice = $order->invoice;
        return view('productout.success', compact('invoice','kembalian'));
    }

    
}
