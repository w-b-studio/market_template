<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    function index() {
        return view('pages.requests.index');
    }

    function create() {
        return view('pages.requests.form');
    }

    function store()
    {
        $data = request()->validate(
            ['number' => 'required',]
        );
        $request = \App\Models\Request::query()
            ->create($data);
        $request->save();

        return redirect()->route('request.index');
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
