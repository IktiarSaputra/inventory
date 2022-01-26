<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductIn;
use App\Models\ProductOut;
use App\Models\Expense;
use App\Models\Income;
use \Milon\Barcode\DNS1D;
use Response;
use Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        $barang = Product::orderBy('created_at', 'DESC')->first();
        // if ($barang == null) {
        //     $kode = 'BRG-001';
        // } else {
        //     $kode = 'BRG-00'.($barang->id + 1);
        // }
        $kode = mt_rand(100000, 999999);
        $category = Category::orderBy('created_at','ASC')->get();
        
        return view('products.index', compact(['product', 'kode', 'category']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = \QrCode::format('png')
                 ->size(200)->errorCorrection('H')
                 ->generate('A simple example of QR code!');
        $output_file = '/img/qr-code/img-' . time() . '.png';
        Storage::disk('public')->put($output_file, $image);
        return response()->download($pathToFile, $name, $headers);
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
            'name' => 'required|string',
            'price' => 'required|integer',
            'qty' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $product = Product::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'category_id' => $request->category_id
        ]);

        return redirect()->back()->with(['insert' => "Kategori Dihapus!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('created_at', 'ASC')->get();
        return view('products.edit', compact(['category', 'product']));
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
            'name' => 'required|string',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $product = Product::find($id);
        $product->update([
            'kode' => $request->kode,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('product.index'))->with(['update' => "Kategori Dihapus!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::withCount(['productin'])->find($id);
        if ($product->child_count == 0 && $product->productin_count == 0 && $product->productout_count == 0 && $product->expense_count == 0 && $product->income_count == 0) {
            $product->delete();
            return redirect(route('product.index'))->with(['delete' => "Kategori Dihapus!"]);
        }
        // $product = Product::find($id);
        // $productin = Productin::find($product->id);
        // $productout = ProductOut::find($product->id);
        // $income = Income::find($product->id);
        // $expense = Expense::find($product->id);
        // $product->delete();
        // $productin->delete();
        // $productout->delete();
        // $income->delete();
        // $expense->delete();

        return redirect(route('product.index'))->with(['error' => 'Kategori Ini Memiliki Anak Kategori!']);
    }

    public function downloadQRCode(Request $request, $id)
    {
            $product = Product::find($id);        
            $url = route('product.show', $product->id);
            $headers    = array('Content-Type' => ['png','svg','eps']);
            $type       = 'png';
            $image      = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNGPath('4445645656', 'C39+',3,33) . '" alt="barcode"   />';

            $imageName = 'QrCode - ' . $product->name;

            \Storage::disk('public')->put($imageName, $image);

            return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers);
    }
}
