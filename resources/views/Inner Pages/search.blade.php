@extends('Layout.Master')
@section('content')

  <div class="trending-wrapper" style="margin-top: 60px;">
      <h4 style="margin-left: 30px;"> Search Results </h4>
      <button class="btn" style="background-color: #102E59;">
          <a href="/" style="text-decoration: none; color: #B3E542;"> Go Back </a>
      </button>
    @foreach ($products as $product)
      <div class="trending-item" style="float: left; margin: 20px;">
          <a href="ProductDetail/{{ $product['id'] }}" style="text-decoration: none; color: black;">
            <img src="{{ $product['gallery'] }}" style="max-height: 180px; width: auto;" class="trending-image alt="{{$product['name']}}">
            <h4> {{ $product['name']}} </h4>
          </a>
          <p> {{ $product['description']}} </p>
          <h5> Price: ${{ $product['price']}} </h5>

            <form action="/add_to_cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button class="btn mt-2" style="background-color: #102E59; color: #B3E542;"> Add to Cart </button>
            </form>
            
      </div>
    @endforeach
  </div>

@endsection