

@extends('layouts.app')

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
<?php /* ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopiLara create</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="container mt-5">

    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

<!-- Error message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
</div>
</body>

</html>
<?php */ ?>
