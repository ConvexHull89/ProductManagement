<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class AdminController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('admin',compact('products','categories'));
    }
    public function viewcategory(){
        $categories = Category::all();
        return view('crecategory', compact('categories'));
    }
    public function createcategory(Request $request){
            $request->validate([
                'category_product' => 'required'
            ]);
            Category::create([
                'category_product' => $request->category_product
            ]);
            return back();
    }
    public function viewproduct(){
        $categories = Category::all();
        return view('creproduct',compact('categories'));
    }
    public function createproduct(Request $request){
        $request->validate([
            'nameproduct' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'_'.'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }else{
            $fileNameToStore = 'no-image.jpg';
        }
        if($request->exists('category_id')){
            $temp = $request->category_id;
        }else{
            $temp = NULL;
        }
        Product::create([
            'nameproduct' => $request->nameproduct,
            'category_id' => $temp,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $fileNameToStore,
        ]);
        return redirect('/admin/home');
    }
    public function editproduct($id){
        $product = Product::findorFail($id);
        $categories = Category::all();
        return view('edit', compact('product','categories'));
    }
    public function destroy($id){
        Product::destroy($id);
        return back();
    }
    public function upproduct(Request $request, $id){
        Product::findorFail($id)->update([
            'nameproduct' => $request->nameproduct,
            'category_id' => $request->category_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description
        ]);
        return redirect('/admin/home');
    }
}
