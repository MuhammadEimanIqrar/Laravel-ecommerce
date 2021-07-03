@extends('Layout.Master')
@section('content')

<div class="container my-5">
    <h3 class="mb-4 text-center"> Order Details </h3>
    <div style="border-radius: 8px; box-shadow: 0px 3px 19px #7a747a">
        <table class="table p-3">
              <tbody>
                    <tr>
                        <td>Amount: </td>
                        <td>$ {{$total_Price}}</td>
                    </tr>
                    <tr>
                        <td>Tax: </td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>Deliverey: </td>
                        <td>$ 10</td>
                    </tr>
                    <tr>
                        <td>Total Amount: </td>
                        <td>$ {{$total_Price + 10}}</td>
                    </tr>
              </tbody>
          </table>
          <div class="p-2">
            <form action="/orderPlace" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="address" id="" cols="30" rows="2"class="form-control" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group mt-3">
                  <label for="pwd">Payment Methods:</label> <br><br>
                  <input type="radio" value="cash" name="payment"><span> Online Payment</span> <br><br>
                  <input type="radio" value="cash" name="payment"><span> EMI Payment</span> <br><br>
                  <input type="radio" value="cash" name="payment"><span> Payment on Deliverey</span> <br><br>
                </div>
                <button type="submit" class="btn btn-primary">Order Now</button>
              </form>
          </div>
    </div>
</div>

@endsection()