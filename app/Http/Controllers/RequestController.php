<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    function store()
    {
        $data = request()->validated();
        $request = \App\Models\Request::query()
            ->create($data);
        $request->save();

        return redirect()->route('request.index');
    }

    public function show(Request $request)
    {
        return view('request.show', [
            'request' => $request
        ]);
    }

    public function edit(Request $request)
    {
        return view('request.form', [
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        $data = request()->validated();

        $request->update($data);
        return redirect()->route('request.show', $request);
    }

    public function destroy(Request $request)
    {
        $request->delete();
        return redirect()->route('request.index');
    }
}
