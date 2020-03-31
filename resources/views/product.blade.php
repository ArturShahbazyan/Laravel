@extends('default.layout.layout')


@section('content')

<div class="container">
    <div class="row">
        <form action="{{ route('product') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="file" name="images[]" multiple>
                    </div>

                    <div class="form-group">
                        <input type="text" name="product_name" class="product_name form-control" vlaue="">
                    </div>

                    <input type="submit" name="submit" class="btn btn-info" value="Add product">
                </div>
        </form>
    </div>

    <div class="products">
        @foreach($products as $product)

        <div class="col-md-3 product-col">
            <img width="200" class="img-responsive products_img text-center" src="../images/{{$product->product_img}}"
                alt="">
            <h4 class="product_name"><b>{{ $product->product_name }}</b></h4>
            <a onclick="return confirm('Are you sure!')" href="delete/{{$product->id}}" class="delete_link">Delete</a>
        </div>
        @endforeach

    </div>
</div>

</div>

@endsection