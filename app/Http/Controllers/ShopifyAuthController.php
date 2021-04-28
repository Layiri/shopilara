<?php

namespace App\Http\Controllers;

use App\Helpers\ShopifyApi;
use App\Models\Collect;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ShopifyAuth;
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
        $all_products = Product::all();
        $all_collections = Collection::all();

        $shops = ShopifyAuth::latest()->paginate(5);

        return view('shopify.index', compact('shops', 'all_products', 'all_collections'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $all_products = Product::all();
        $all_collections = Collection::all();

        return view('shopify.create', compact('all_products','all_collections'));

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
            'api_secret_key' => 'required'
        ]);
//        $user_id = \Auth::id(); // TODO
        $request->request->add(['user_id' => 1]);

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

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id)->getAttributes();
        $all_products = Product::all();
        $all_collections = Collection::all();

        return view('shopify.edit', compact('shopifyAuth','all_products','all_collections'));
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
            'shared_secret' => 'api_secret_key'
        ]);


        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);

        $shopifyAuth->setAttribute('shop_name', $request->request->get('shop_name'));
        $shopifyAuth->setAttribute('api_key', $request->request->get('api_key'));
        $shopifyAuth->setAttribute('scopes', $request->request->get('scopes'));
        $shopifyAuth->setAttribute('api_secret_key', $request->request->get('api_secret_key'));
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

    /**
     * Install and generate new token
     * @param $id
     */
    public function install($id)
    {

        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);
        $install = new ShopifyApi();
        $install->shopify = $shopifyAuth;

        $install->install();
        die;
    }

    /**
     * Generate new token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate_token()
    {

        $params = $_GET;
        $shop_name = explode('.', $params['shop']);
        $shopify = ShopifyAuth::query()->firstWhere('shop_name', '=', $shop_name);


        if ($shopify) {
            $generate_token = new ShopifyApi();
            $generate_token->shopify = $shopify;
            $token = $generate_token->generateToken($params);
            if ($token) {
                $shopify->setAttribute('token', $token);
                $shopify->save();
                return redirect()->route('shopify_store.index')
                    ->with('success', 'Token was successfully generated');
            } else {
                return redirect()->route('shopify_store.index')
                    ->with('error', 'Error to generate token');

            }

        } else {
            return redirect()->route('shopify_store.index')
                ->with('error', 'Error to generate token');
        }
    }

    /**
     * Get products, collects and collection from shopify api
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function get_data($id)
    {
        $shopifyAuth = ShopifyAuth::query()->firstWhere("id", "=", $id);
        $api = new ShopifyApi();
        $api->shopify = $shopifyAuth;

        $products = $api->getAllProducts();
        Product::saves($products, $shopifyAuth);

        $collects = $api->getAllCollects();
        Collect::saves($collects, $shopifyAuth);

        foreach ($collects as $collect) {
            $collections = $api->getCollectionById($collect['collection_id']);
            Collection::saves($collections, $shopifyAuth);
        }

        return redirect()->route('shopify_store.index')
            ->with('success', 'All data was uploaded to database successfully.');
    }


}
