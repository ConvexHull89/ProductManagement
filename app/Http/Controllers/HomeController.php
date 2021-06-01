<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $products = Product::all();
        return view('home',compact('products'));
    }
    public function cart($id){
        $product = Product::findorFail($id);
        return view('cart', compact('product'));
    }

    public function order(Request $request, $id){
        $product = Product::findorFail($id);
        if($request->amount < $product->qty){
            $date = Carbon::now();
            $date->toDateString();
            $temp = $product->qty - $request->amount;
            Product::findorFail($id)->update([
                'qty' => $temp,
            ]);
            Order::create([
                'date' => $date,
                'ordername' => $request->nameproduct,
                'amount' => $request->amount,
                'price' => $request->price,
                'totalprice' => ($request->amount)*($request->price),
            ]);
            return redirect('/home');
        }
        return back()->with(['error' => 'Please Enter The Available Amount!' ]);
    }
}
