<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getProduct()
    {
        if (session()->has('access_token')) {

            if(Product::all()->count() == 0)
            {
                $response = Http::withHeaders([
                    'Authorization' => 'JWT ' . session('access_token'),
                    'Content-Type' => 'application/json'
                ])->get('https://apiv2.entegrabilisim.com/product/page=1/');

                $response = json_decode($response->collect(), true);

                $counter = 0;
                foreach ($response['porductList'] as $value) {
                    if ($counter == 5)
                        break;

                    Product::create([
                        'name' => $value['name'],
                        'productCode' => $value['productCode'],
                        'quantity' => $value['quantity'],
                    ]);

                    $counter++;
                }
                return redirect()->route('product')->with('toast_success', 'Product imported of 5 successfully.');
            } else
                return back()->with('toast_error', 'There are enough products!');

        } else
            return back()->with('toast_error', 'Unauthorized action');

    }

    public function index()
    {
        if (session()->has('access_token')) {
            $products = Product::all();
            return view('product.index', compact('products'));

        } else
            return view('auth.login');

    }

    public function edit($id)
    {
        if (session()->has('access_token')) {
            $product = Product::find($id);
            return view('product.edit',compact('product'));

        } else
            return view('auth.login');

    }

    public function update(Request $request, $id)
    {

        if (session()->has('access_token')) {
            $product = Product::find($id);
            $product->update([
                'name' => $request->get('name'),
                'productCode' => $request->get('productCode'),
                'quantity' => $request->get('quantity'),
            ]);

            return back()->with('toast_success','Updated product successfully');

        } else
            return view('auth.login');

    }

    public function destroy($id)
    {
        if (session()->has('access_token')) {
            $product = Product::find($id);
            $product->delete();
            return back()->with('toast_success', 'Successfully deleted product.');
        } else
            return view('auth.login');

    }
}
