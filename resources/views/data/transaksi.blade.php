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
  <form action="" method="post" class="search-form p-2 d-i-block" enctype="multipart/form-data">
    <img src="assets/img/index/icon/i-search.png" alt="" class="m-1 p-absolute">
    <input type="text" placeholder="Search menu">
    <button type="submit" class="btn p-2 float-right">Search</button>
  </form>

  <div class="tools-todo d-i-block p-absolute txt-center ">
    <a href="" class="d-i-block">
      <img src="assets/img/index/icon/i-pdf.png" alt="">
    </a>
    <a href="" class="d-i-block">
      <img src="assets/img/index/icon/i-excel.png" alt="">
    </a>
    <a href="add_transaksi" class="d-i-block ">
      <img src="assets/img/index/icon/i-add-data.png" alt="">
    </a>
    <a href="/" class="d-i-block " style="margin-right: 0">
      <img src="assets/img/index/icon/i-home.png" alt="">
    </a>
  </div>

  <div class="table mt-2">
    <div class="row">
      <div class="column"><h4 class="m-0 txt-normal">ID</h4></div>
      <div class="column"><h4 class="m-0 txt-normal">Nama Pelanggan</h4></div>
      <div class="column"><h4 class="m-0 txt-normal">Nama Petugas</h4></div>
      <div class="column"><h4 class="m-0 mb-2 txt-normal">Total</h4></div>
    </div>

    @foreach($data as $d)
    <div class="row">
      <div class="column mt-1"><h4 class="m-0 mb-3 txt-thin">{{$d->id}}</h4></div>
      <div class="column"><h4 class="m-0 mt-1 mb-3 txt-thin">{{$d->nama_pelanggan}}</h4></div>
      <div class="column"><h4 class="m-0 mt-1 mb-3 txt-thin">{{$d->username}}</h4></div>
      <div class="column"><h4 class="m-0 mt-1 mb-3 txt-thin">{{$d->total}}</h4></div>
      <div class="column tools p-absolute">
        <a href="/delete_transaksi/<?php echo $d->id_pesanan ?>" class="d-i-block">
          <img src="assets/img/index/icon/i-delete.png" alt="">
        </a>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection