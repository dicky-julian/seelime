@extends('index')

@section('title','SeeLime')

@section('body')
<body>
  <form action="" method="post" class="auth-form" enctype="multipart/form-data">
      <div class="banner">
        <img src="assets/img/auth/cashier_illustration.png" alt="">
      </div>
      <div class="form">
        <h1 class="candara">Smart solve , Easy ways</h1>
        <label for="" class="default-fade">Username</label>
        <input class="input mt-1 mb-3" type="text" name="" placeholder="please take unique word">
        <label for="" class="default-fade">Email</label>
        <input class="input mt-1 mb-3" type="email" name="" placeholder="ex: your@example.com">
        <label for="" class="default-fade">Password</label>
        <input class="input mt-1 mb-3" type="password" name="">
        <button type="submit" class="btn-circular btn-primary">Submit</button>
        <a href="/login" class="btn-circular btn-secondary ml-1">Back</a>
      </div>
  </form>
</body>
<style>
  nav {
    box-shadow: none !important;
  }
</style>
@endsection