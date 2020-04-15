@extends('index')

@section('title','SeeLime')

@section('body')
<body>
  <form action="/" method="get" class="auth-form" enctype="multipart/form-data">
      <div class="banner">
        <img src="assets/img/auth/cashier_illustration.png" alt="">
      </div>
      <div class="form">
        <h1 class="candara">Smart solve , Easy ways</h1>
        <h3 class="default-fade mt-0 mb-4 txt-thin">save your time with smart thing and make your spare to get amazing to do</h3>
        <label for="" class="default-fade">Email</label>
        <input class="input mt-1 mb-3" type="email" name="" placeholder="ex: your@example.com">
        <label for="" class="default-fade">Password</label>
        <input class="input mt-1 mb-3" type="password" name="">
        <button type="submit" class="btn-circular btn-primary">Login Now</button>
        <a href="/register" class="btn-circular btn-secondary ml-1">Registration</a>
      </div>
  </form>
</body>
<style>
  nav {
    box-shadow: none !important;
  }
</style>
@endsection