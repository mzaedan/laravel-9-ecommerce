<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class ProductController extends Controller
{
    public function index_product()
    {
        $Products = Product::all();

        return view('index_product', [
            'products' => $Products
        ]);
    }

    public function create_product()
    {
        return view('create_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time(). '_' . $request->name . '.' .$file->getClientOriginalExtension();

        Storage::disk('local')->put('public/'. $path, file_get_contents($file));


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
        ]);

        return Redirect::route('create_product');
    }

    public function show_product()
    {
        return view('show_product', compact('product'));
    }
}
