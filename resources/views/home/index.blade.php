@extends('layouts.app')

@section('carousel')
@include('layouts.carousel')
@endsection

@section('content')
    <div class="row">

        @foreach ($all_products as $product)
            {{--                    {{dd()}}--}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" height="253px" width="144px" src="{{json_decode($product->image)->src}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$product->title}}</a>
                        </h4>
                        <h5>{{json_decode($product->variants)[0]->price}}грв</h5>
                        <p class="card-text">{{strip_tags(substr($product->body_html, 0, 500))}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.row -->

@endsection