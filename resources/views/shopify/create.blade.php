@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('shopify_store.store') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <label>*Shop name</label>
            <input type="text" class="form-control" name="shop_name" id="shop_name" required>
        </div>

        <div class="form-group">
            <label>*Api Key</label>
            <input type="password" class="form-control" name="api_key" id="api_key" required>
        </div>

        <div class="form-group">
            <label>*Api Secret Key</label>
            <input type="password" class="form-control" name="api_secret_key" id="api_secret_key" required>
        </div>

        <div class="form-group">
            <label>Scopes</label>
            <input type="text" class="form-control" name="scopes" id="scopes">
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
@endsection

