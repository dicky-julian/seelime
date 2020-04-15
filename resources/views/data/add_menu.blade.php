@extends('index')

@section('title','SeeLime')

@section('body')
<style>
body {
  background: #F1F2F6;
}

@media only screen and (max-width: 650px) {
  .m-4 {
    margin: 1em;
  }

  .ml-4 {
    margin-left: 1em;
  }

  .mr-4 {
    margin-right: 1em;
  }
}
</style>

<div class="dash-header m-4 p-2">
  <div class="acc-info d-flex">
    <div class="acc-img ml-2"></div>
    <div class="ml-1 p-1">
      <h3 class="txt-normal m-0">Joyce Chu</h3>
      <h5 class="txt-thin m-0">Administrator</h5>
    </div>
  </div>
  <div class="count-info">
  <div class="pr-1">
      <a class="d-flex p-1 pl-2">
        <img src="assets/img/index/icon/i-customer.png" alt="">
        <div class="txt-right txt-bold">
          {{$countCustomer}}
          <h5>Customers</h5>
        </div>
      </a>
    </div>

    <div class="pr-1">
      <a class="d-flex p-1 pl-2">
        <img src="assets/img/index/icon/i-menu.png" alt="">
        <div class="txt-right txt-bold">
          {{$countMenu}}
          <h5>Menus</h5>
        </div>
      </a>
    </div>

    <div class="pr-1">
      <a class="d-flex p-1 pl-2">
        <img src="assets/img/index/icon/i-order.png" alt="">
        <div class="txt-right txt-bold">
          {{$countTransaksi}}
          <h5>Transactions</h5>
        </div>
      </a>
    </div>
  </div>
</div>

<div class="custom-body m-4">

  <form action="/add_menu" method="post" class="post-form p-4 d-i-block" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="mt-0 mb-3 txt-normal">Form Tambah Menu</h3>
    <label for="" class="default-fade">Nama Menu</label>
    <input class="input mb-3" type="text" name="nama_menu">
    <label for="" class="default-fade">Harga</label>
    <input class="input mb-3" type="number" name="harga">
    <label for="" class="default-fade">Foto Menu</label>
    <input class="input mb-3" type="file" name="foto" style="border-bottom: 0; padding: 10px 25px 10px 0">
    <label for="" class="default-fade">Tipe Menu</label>
    <br>
    <div class="d-i-block mr-5">
      <h4 class="txt-thin mt-1"><input type="radio" name="type" value="food" class="mr-2">food</h4>
    </div>
    <div class="d-i-block mr-5">
      <h4 class="txt-thin mt-1"><input type="radio" name="type" value="drink" class="mr-2">drink</h4>
    </div>
    <br>
    <button type="submit" class="btn mt-2" name="add_menu">Submit</button>
    <a href="" class="btn mt-2 ml-1">Cancel</a>
  </form>

  <div class="tools-todo d-i-block p-absolute txt-center ">
    <a href="" class="d-i-block">
      <img src="assets/img/index/icon/i-pdf.png" alt="">
    </a>
    <a href="" class="d-i-block">
      <img src="assets/img/index/icon/i-excel.png" alt="">
    </a>
    <a href="" class="d-i-block ">
      <img src="assets/img/index/icon/i-add-data.png" alt="">
    </a>
    <a href="/" class="d-i-block " style="margin-right: 0">
      <img src="assets/img/index/icon/i-home.png" alt="">
    </a>
  </div>
</div>
@endsection