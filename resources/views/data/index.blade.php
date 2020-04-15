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
<div class="dash-body mb-4 ml-4 mr-4">
  <div class="list-dash">
    <div class="headline-dash">
      <div class="img"></div>
    </div>

    <h3 class="mt-4 candara">What can to do</h3>
    <div class="list d-flex">
      <a class="list-rel txt-center pt-4" href="/customer"
        style="width: 33.3%; background-image: url(assets/img/index/bg/bg-customer.jpeg);">
        <div class="txt-rel txt-left pl-3 pr-3">
          <h4 class="m-0 light-fade p-absolute">Customers</h4>
          <div class="float-right">
            <div></div>
          </div>
        </div>
      </a>
      <a class="list-rel txt-center ml-2 pt-4" href="/menus"
        style="width: 33.3%; background-image: url(assets/img/index/bg/bg-menu.jpeg);">
        <div class="txt-rel txt-left pl-3 pr-3">
          <h4 class="m-0 light-fade p-absolute">Menus</h4>
        </div>
      </a>
      <a class="list-rel txt-center ml-2 pt-4 f-2" href="/transaksi"
        style="width: 33.3%; background-image: url(assets/img/index/bg/bg-transaction.jpg);">
        <div class="txt-rel txt-left pl-3 pr-3">
          <h4 class="m-0 light-fade p-absolute">Transactions</h4>
        </div>
      </a>
    </div>
  </div>

  <div class="list-record ml-5">
    <div class="menu-record">
      <h3 class="candara m-0 p-2 fade-border">Menus sold records</h3>
      @foreach($data as $d)
      <div class="d-flex p-1 pl-2 fade-border">
        <img src="assets/img/index/bg/food.png" alt="">
        <a class="pl-2">
          <h4 class="m-0 txt-thin">{{$d->nama_menu}}</h4>
          <h5 class="m-0 txt-thin default-primary">144 orders</h5>
        </a>
      </div>
      @endforeach
      <a href="/menus" class="d-block p-2 pl-4 txt-normal btn-fade">View all</a>
    </div>
  </div>
</div>
@endsection