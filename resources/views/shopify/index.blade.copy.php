<?php
/**
 * @var \App\Models\ShopifyAuth $shops
 */
?>

    <!DOCTYPE html>
<html>
<head>
    <title>ShopiLara</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">ShopiLara</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('shopify_store') }}">View All Shops</a></li>
            <li><a href="{{ URL::to('shopify_store/create') }}">Create a shop</a>
        </ul>
    </nav>
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <h1>All the Shops</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>API Key</td>
            <td>Scopes</td>
            <td>Token</td>
            <td>Shared Secret</td>
            <td>Code</td>
            <td>User</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->shop_name }}</td>
                <td>{{ $value->api_key }}</td>
                <td>{{ $value->scopes }}</td>
                <td>{{ $value->token }}</td>
                <td>{{ $value->shared_secret }}</td>
                <td>{{ $value->code }}</td>
                <td>{{ $value->user_id }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
{{--                    <a class="btn btn-small btn-success" href="{{ URL::to('shopify_store/' . $value->id) }}">Show</a>--}}
                    <a class="btn btn-small btn-info" href="{{ URL::to('shopify_store/' . $value->id . '/edit') }}">Edit</a>
{{--                    <a class="btn btn-small btn-info" href="{{ URL::to('shopify_store/' . $value->id . '/generate_token') }}">Generate Token</a>--}}
                    <a class="btn btn-small btn-info" href="{{ URL::to('shopify_store/' . $value->id . '/get_data') }}">Get Products and Collections</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
