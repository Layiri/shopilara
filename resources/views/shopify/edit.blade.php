

@extends('layouts.app')

@section('title')
    Edit shop : {{$shopifyAuth['shop_name']}}
@endsection

@section('content')
    <form method="post" action="{{ route('shopify_store.update', $shopifyAuth['id']) }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>*Shop name</label>
            <input type="text" class="form-control" name="shop_name" id="shop_name" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}" required>
        </div>

        <div class="form-group">
            <label>*Api Key</label>
            <input type="password" class="form-control" name="api_key" id="api_key" value="{{ old('api_key', $shopifyAuth['api_key']) }}" required>
        </div>

        <div class="form-group">
            <label>*Api Secret Key</label>
            <input type="password" class="form-control" name="api_secret_key" id="api_secret_key" value="{{ old('api_secret_key', $shopifyAuth['api_secret_key']) }}">
        </div>

        <div class="form-group">
            <label>*Scopes</label>
            <input type="password" class="form-control" name="scopes" id="scopes" value="{{ old('scopes', $shopifyAuth['scopes']) }}">
        </div>


        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>

@endsection
