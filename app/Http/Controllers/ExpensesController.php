<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;
use App\Models\Productin;
use App\Models\Product;
use PDF;

class ExpensesController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }
        $expense = Expense::whereBetween('created_at', [$start, $end])->get();
        return view('expense.index', compact('expense'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $expense = Expense::create([
            'description' => $request->description,
            'qty' => $request->qty,
            'price' => $request->price,
            'subtotal' => $request->price * $request->qty
        ]);

        return redirect()->back()->with('insert', "sukses");
    }

    public function export($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $orders = Expense::whereBetween('created_at', [$start, $end])->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = PDF::loadView('expense.expense_pdf', compact('orders', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }

    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->update([
            'description' => $request->description,
            'price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->price * $request->qty
        ]);

        return redirect(route('expense.index'))->with('update',"sukses");
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('delete', "sukses");
    }
}
