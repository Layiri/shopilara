<!-- resources/views/dashboard/reservationEdit.blade.php -->
<?php
    /**
     * @var \App\Models\ShopifyAuth $shopifyAuth
     */
?>

<div class="container">
    <div class="card my-5">
        <div class="card-header">
            <h2>{{ $shopifyAuth['shop_name'] }} - <small class="text-muted">{{ $shopifyAuth['shop_name'] }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent resort in the world!</p>
            <form action="{{ route('shopify_store.update', $shopifyAuth['id']) }}" method="POST">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('shop_name', $shopifyAuth['shop_name']) }}">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
