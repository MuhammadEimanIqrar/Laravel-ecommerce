@extends('Layout.Master')
@section('content')

<div class="container my-5">
    <h3 class="mb-4 text-center"> Orders </h3>
    <div style="border-radius: 8px; box-shadow: 0px 3px 19px #7a747a">
        <table class="table table-striped p-3 text-center">
            <thead>
                <tr>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Delivery Status</th>
                  <th scope="col">Payment Status</th>
                  <th scope="col">Address</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $order)
                    <tr>
                        <th scope="row"><img src="{{ $order -> gallery }}" alt="{{ $order -> name }}" style="max-width: 100px; max-height: 100px;"></th>
                        <td>{{ $order -> name }}</td>
                        <td>{{ $order -> description }}</td>
                        <td>{{ $order -> price }}</td>
                        <td>{{ $order -> status }}</td>
                        <td>{{ $order -> payment_method }}</td>
                        <td>{{ $order -> address }}</td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
    </div>
</div>

@endsection()