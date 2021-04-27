<?php

namespace App\Http\Controllers;

use App\Models\Collect;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $collect = Collect::latest()->paginate(5);

        return view('collect.index', compact('collect'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('collect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([ //TODO
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        Collect::create($request->all());

        return redirect()->route('collect.index')
            ->with('success', 'Collect was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collect  $collect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Collect $collect)
    {
        return view('collect.show', compact('collect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collect  $collect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Collect $collect)
    {
        return view('collect.edit', compact('collect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collect  $collect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Collect $collect)
    {
        $request->validate([ //TODO::
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $collect->update($request->all());

        return redirect()->route('collect.index')
            ->with('success', 'Collect updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collect  $collect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Collect $collect)
    {
        $collect->delete();
        return redirect()->route('collect.index')
            ->with('success', 'Collect was deleted successfully');

    }
}
