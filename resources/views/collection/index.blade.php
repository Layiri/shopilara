@extends('layouts.app')

@section('carousel')
Collections
@endsection
@section('carousel')
    @include('layouts.carousel')
@endsection

@section('content')
    <div class="row">
        @foreach ($all_products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" height="253px" width="144px" src="{{json_decode($product->image)->src}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$product->title}}</a>
                        </h4>
                        <h5>{{json_decode($product->variants)[0]->price}}грв</h5>
                        <p class="card-text">{{strip_tags(substr($product->body_html, 0, 300))}}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.row -->

@endsection
