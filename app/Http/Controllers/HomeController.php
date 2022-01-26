<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $startexpense = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $endexpense = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $dateexpense = explode(' - ' ,request()->date);
            $startexpense = Carbon::parse($dateexpense[0])->format('Y-m-d') . ' 00:00:01';
            $endexpense = Carbon::parse($dateexpense[1])->format('Y-m-d') . ' 23:59:59';
        }
        $expense = Expense::whereBetween('created_at' , [$startexpense, $endexpense])->get();
        $pengeluaran = Expense::whereBetween('created_at' , [$startexpense, $endexpense])->take(1)->get();

        $startincome = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $endincome = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $dateincome = explode(' - ' ,request()->date);
            $startincome = Carbon::parse($dateincome[0])->format('Y-m-d') . ' 00:00:01';
            $endincome = Carbon::parse($dateincome[1])->format('Y-m-d') . ' 23:59:59';
        }
        $income = Income::whereBetween('created_at' , [$startincome, $endincome])->get();
        $pemasukan = Income::whereBetween('created_at', [$startincome, $endincome])->take(1)->get();
        return view('admin.dashboard', compact('expense','pengeluaran','income','pemasukan'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'current_password' => new MatchOldPassword,
        //     'new_password' => ['max:10'],
        //     'new_confirm_password' => ['same:new_password'],
        // ]);

        $request->validate([
            'name' => ['required', 'string', 'max:2'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
            
        //dd($request->all());
   
        User::find(auth()->user()->id)->update([
            'app_name' => $request->app_name,
            'name' => $request->name,
            'email' => $request->email,
        ]);
   
        return redirect()->back()->with('sukses',"sukses");
    }

    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->back()->with('password',"sukses");
    }
    
}
