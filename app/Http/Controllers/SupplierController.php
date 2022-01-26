<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier = Suplier::orderBy('created_at', 'DESC')->get();
        return view('suplier.index', compact('suplier'));
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
            'name' => 'required',
        ]);

        $suplier = Suplier::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('insert',"sukses");
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
        $suplier = Suplier::find($id);
        return view('suplier.edit', compact('suplier'));
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
            'name' => 'required',
        ]);

        $suplier = Suplier::find($id);

        $suplier->update([
            'name' => $request->name
        ]);

        return redirect(route('suplier.index'))->with('insert',"sukses");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier = Suplier::withCount(['productin'])->find($id);
        if ($suplier->productin_count == 0) {
            $suplier->delete();
            return redirect(route('suplier.index'))->with(['delete' => 'Kategori Dihapus!']);
        }
        return redirect(route('suplier.index'))->with(['error' => 'Kategori Ini Memiliki Anak Kategori!']);
    }
}
