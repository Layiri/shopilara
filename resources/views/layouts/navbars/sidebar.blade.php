<div class="col-lg-3">
    <div class="list-group">
        @foreach ($all_collections as $collection)
            <a href="{{route("collection.index", [$collection->id])}}" class="list-group-item">{{$collection->title}}</a>
        @endforeach
    </div>
</div>
