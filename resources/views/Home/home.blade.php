@extends('Layout.Master')
@section('content')

{{-- Carousel Section Start --}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($products as $product)
        <div class="carousel-item {{ $product['id'] == 1 ? 'active' : '' }}">
            <a href="ProductDetail/{{ $product['id'] }}">
              <img src="{{ $product['gallery'] }}" style="max-height: 80vh; width: auto" class="d-block w-100" alt="{{$product['name']}}">
            </a>
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  {{-- Carousel Section End --}}

  {{-- Trending Section Start --}}
  <div class="trending-wrapper" style="margin-top: 60px;">
      <h3 style="margin-left: 30px;"> Trending Products </h3>
    @foreach ($products as $product)
      <div class="trending-item" style="float: left; margin: 20px;">
          <a href="ProductDetail/{{ $product['id'] }}">
            <img src="{{ $product['gallery'] }}" style="max-height: 180px; width: auto;" class="trending-image alt="{{$product['name']}}">
            <h4> {{ $product['name']}} </h4>
          </a>
      </div>
    @endforeach
  </div>
  {{-- Trending Section Start --}}

@endsection