<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestProduct;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    function index() {
        $data = RequestModel::with('requestproduct.product','requestproduct.request')->get();
        return response()->json($data, 200);
    }

    function store(Request $request)
    {
        $data = $request->all();
        $data_req = RequestModel::create($data);
        if(isset($data['products'])){
            foreach ($data['products'] as $product){
                $product['request_id'] = $data_req->id;
                RequestProduct::create($product);
            }
        }
        $products = RequestProduct::with('product','request')->where('product_id', $data['products']->product_id)->first();
        return response()->json($products, 200);
    }

    public function show(\App\Models\Request $request)
    {
        return view('pages.requests.show', [
            'request' => $request
        ]);
    }

    public function edit(\App\Models\Request $request)
    {
        return view('pages.requests.form', [
            'request' => $request
        ]);
    }

    public function update(\App\Models\Request $request)
    {
        $data = request()->validate(
            ['number' => 'required',]
        );

        $request->update($data);
        return redirect()->route('request.show', $request);
    }

    public function destroy(\App\Models\Request $request)
    {
        $request->delete();
        return redirect()->route('request.index');
    }
}