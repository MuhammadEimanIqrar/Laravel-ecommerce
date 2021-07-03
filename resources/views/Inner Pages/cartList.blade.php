@extends('Layout.Master')
@section('content')

<div class="container my-5">
    <h3 class="mb-4 text-center"> All Cart Items </h3>
    <div style="border-radius: 8px; box-shadow: 0px 3px 19px #7a747a">
        <table class="table table-striped p-3 text-center">
            <thead>
                <tr>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                    <tr>
                        <th scope="row"><img src="{{ $product -> gallery }}" alt="{{ $product -> name }}" style="max-width: 100px; max-height: 100px;"></th>
                        <td>{{ $product -> name }}</td>
                        <td>{{ $product -> description }}</td>
                        <td>{{ $product -> price }}</td>
                        <td><button class="btn btn-danger"><a href="/removeCartItem/{{ $product -> cart_id }}" style="text-decoration: none; color: white;">Remove</a></button></td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="p-4">
            <button class="btn btn-success"><a href="/orderNow" style="text-decoration: none; color: white;">Order Now</a></button>
          </div>
    </div>
</div>

@endsection()