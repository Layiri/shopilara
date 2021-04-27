<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $collections = Collection::latest()->paginate(5);
        return view('collection.index', compact('collections'))
            ->with('i', (\request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([ //TODO
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        Collection::create($request->all());

        return redirect()->route('collection.index')
            ->with('success', 'Collection was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Collection $collection)
    {
        return view('collection.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Collection $collection)
    {
        return view('collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([ //TODO::
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $collection->update($request->all());

        return redirect()->route('collection.index')
            ->with('success', 'Collection updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('collection.index')
            ->with('success', 'Collection was deleted successfully');
    }
}
