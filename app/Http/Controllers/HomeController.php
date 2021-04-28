<?php


namespace App\Http\Controllers;


use App\Models\Collection;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $all_products = Product::all();
        $all_collections = Collection::all();

        return view('home.index', compact('all_collections', 'all_products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

}
