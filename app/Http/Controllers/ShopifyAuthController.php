<?php

namespace App\Http\Controllers;

use App\Helpers\ShopifyApi;
use App\Models\Collect;
use App\Models\Product;
use App\Models\ShopifyAuth;
use App\Models\User;
use Illuminate\Http\Request;

class ShopifyAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $shops = ShopifyAuth::latest()->paginate(5);

        return view('shopify.index', compact('shops'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('shopify.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|unique:shopify_auth|max:255',
            'api_key' => 'required',
            'shared_secret' => 'required'
        ]);
        $user_id = \Auth::id();
        $request->request->add(['user_id' => 1]); // Todo

        ShopifyAuth::create($request->all());
        return redirect()->route('shopify_store.index')
            ->with('success', 'Shop was created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ShopifyAuth $shopifyAuth
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ShopifyAuth $shopifyAuth)
    {
        return view('shopify.show', compact('shopifyAuth'));

    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param \App\Models\ShopifyAuth $shopifyAuth
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
//     */
//    public function edit(ShopifyAuth $shopifyAuth)
//    {
//        dd($shopifyAuth);
//        return view('shopify.edit', compact('shopifyAuth'));
//    }


    public function edit($id)
    {
        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id)->getAttributes();

//        if ($shopifyAuth['id'] === 1) {

        return view('shopify.edit', compact('shopifyAuth'));
//        } else
//            return redirect('shopify_store.index')->with('error', 'You are not authorized to do that');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user_id = \Auth::id();
        $request->validate([
            'shop_name' => 'required|max:255',
            'api_key' => 'required',
            'shared_secret' => 'required'
        ]);


        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);

        $shopifyAuth->setAttribute('shop_name', $request->request->get('shop_name'));
        $shopifyAuth->setAttribute('api_key', $request->request->get('api_key'));
        $shopifyAuth->setAttribute('scopes', $request->request->get('scopes'));
        $shopifyAuth->setAttribute('shared_secret', $request->request->get('shared_secret'));
        $shopifyAuth->setAttribute('code', $request->request->get('code'));
        $shopifyAuth->setAttribute('user_id', 1);
//        $shopifyAuth->setAttribute('user_id', $user_id); // TODO
        $shopifyAuth->save();

        return redirect()->route('shopify_store.index')
            ->with('success', 'Shop updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ShopifyAuth $shopifyAuth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ShopifyAuth $shopifyAuth)
    {
        $shopifyAuth->delete();
        return redirect()->route('shopify_store.index')
            ->with('success', 'Shop was deleted successfully');
    }

    public function generate_token($id)
    {

        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);

//        $shopifyAuth->code;
//        $shop_name = $shopifyAuth->shop_name;
//        $api_key = $shopifyAuth->api_key;
//        $scopes = $shopifyAuth->scopes;
//        $token = $shopifyAuth->getAttribute();
        $token = ShopifyAuth::generate_token($shopifyAuth);

//        $shared_secret = $shopifyAuth->shared_secret;
//        $code = $shopifyAuth->code;
//        $user_id = $shopifyAuth->user_id;


    }

    public function get_data($id)
    {
        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);
        $api = new ShopifyApi();
        $api->shopify = $shopifyAuth;

//        $products = $api->getAllProducts();
//        Product::saves($products, $shopifyAuth);

        $collects = $api->getAllCollects();
        Collect::saves($collects, $shopifyAuth);

    }


}
