
@extends('layouts.app')
@section('title')
    List of shops
@endsection
@section('content')
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif

    <div>
        <div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Shop name</th>
                    <th scope="col">API Key</th>
                    <th scope="col">Token</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $key => $value)
                    <tr>
                        <th scope="row">{{ $value->id }}</th>
                        <td>{{ $value->shop_name }}</td>
                        <td>{{ $value->api_key }}</td>
                        <td>{{ $value->token }}</td>
                        <td class="action_table">
                            <a title="Edit" class="btn btn-small btn-success"
                               href="{{ URL::to('shopify_store/' . $value->id . '/edit') }}"><i class="fa fa-edit"></i>
                            </a>
                            <a title="Generate Token" class="btn btn-small btn-danger"
                               href="{{ URL::to('shopify_store/' . $value->id . '/install') }}"><i
                                    class="fa fa-archive"></i> </a>
                            <a title="Get Products and Collections" class="btn btn-small btn-info"
                               href="{{ URL::to('shopify_store/' . $value->id . '/get_data') }}"><i
                                    class="fa fa-download"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
