<?php 

use App\Http\Controllers\ProductController;

$total = 0;
if (Session::has('user')) {
  $total = ProductController::CartItems();
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"> E-Comm </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/orders">Orders</a>
          </li>
        </ul>
        <ul class="navbar-nav mx-auto">
          <li>
            <form action="/search" method="post"class="d-flex">
              @csrf
              <input name="query" class="form-control me-2" style="width: 50vw;" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </li>
        </ul>
        <ul class="navbar-nav me-5">
            <li>
                <a class="nav-link" href="/cartList">Cart({{$total}})</a>
            </li>
            @if (Session::has('user'))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Session()->get('user')['name'] }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
              </li>
            @else
              <li><a class="nav-link" href="/login">Login</a></li>
              <li><a class="nav-link" href="/register">Register</a></li>
            @endif
        </ul>
      </div>
    </div>
  </nav>