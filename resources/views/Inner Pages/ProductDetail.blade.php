@extends('Layout.Master')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <img src="{{ $product['gallery'] }}" alt="{{$product['name']}}" style="max-width: 40vw; max-height: 70vh;">
        </div>
        <div class="col-sm-6 mt-4">
            <h2> {{ $product['name'] }} </h2>
            <h4> Price: {{ $product['price'] }} </h4>
            <h6> Details: {{ $product['description']}} </h6>
            <h6> Category: {{ $product['category']}} </h6>

            <div class="d-flex">
                <form action="/add_to_cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button class="btn mt-5 me-2" style="background-color: #102E59; color: #B3E542;"> Add to Cart </button>
                </form>
                    
                    <button class="btn mt-5" style="background-color: #102E59;">
                        <a href="/" style="text-decoration: none; color: #B3E542;"> Go Back </a>
                    </button>
              </div>

        </div>
    </div>
</div>

@endsection