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

  @if($step === 'user_check')
  <form action="/add_transaksi" method="post" class="post-form p-4 d-i-block" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="mt-0 mb-3 txt-normal">Form Data Pelanggan</h3>
    <label for="" class="default-fade">Nama Pelanggan</label>
    <input class="input mb-3" type="text" name="nama_pelanggan">
    <label for="" class="default-fade">Nomor Telepon</label>
    <input class="input mb-3" type="number" name="nomor_hp">
    <label for="" class="default-fade">Alamat</label>
    <input class="input mb-3" type="text" name="alamat">
    <label for="" class="default-fade">Jenis Kelamin</label>
    <br>
    <div class="d-i-block mr-5">
      <h4 class="txt-thin mt-1"><input type="radio" name="jenis_kelamin" value="Male" class="mr-2">Male</h4>
    </div>
    <div class="d-i-block mr-5">
      <h4 class="txt-thin mt-1"><input type="radio" name="jenis_kelamin" value="Female" class="mr-2">Female</h4>
    </div>
    <br>
    <button type="submit" class="btn mt-2" name="user_check">Submit</button>
  </form>

  @elseif($step === 'list_pelanggan')
  <div class="table mt-2">
    <form action="/add_transaksi" method="post" enctype="multipart/form-data" id="list_pelanggan">
      {{ csrf_field() }}
      @foreach($data as $d)
      <input type="hidden" name="id_pelanggan" value="<?php echo $d->id ?>">
      <div class="row">
        <div class="column" style="padding: 0.5em 0"><img src="assets/img/index/joyce.jpg" alt=""></div>
        <div class="column">
          <h4 class="m-0 txt-normal">{{$d->nama_pelanggan}}</h4>
          <h5 class="m-0 txt-thin">9312 orders</h5>
        </div>
        <div class="column">
          <h4 class="m-0 txt-normal">{{$d->alamat}}</h4>
          <h5 class="m-0 txt-thin">{{$d->nomor_hp}}</h5>
        </div>

        <div class="column">
          <?php
        if($d->jenis_kelamin == 'Male') {
          echo '<div class="status-bar d-flex" style="background: #FDEDED">
          <div style="background: #F05253"></div>';
        } else if($d->jenis_kelamin == 'Female') {
          echo '<div class="status-bar d-flex" style="background: #EBEAFC">
          <div style="background: #4640DE"></div>';
        }
        ?>
          <h5 class="m-0 ml-1 txt-normal">{{$d->jenis_kelamin}}</h5>
        </div>
      </div>

      <div class="column tools p-absolute">
        <button type="submit" name="list_menu">
          <a class="d-i-block" name="list_menu">
            <img src="assets/img/index/icon/i-plus.png" alt="">
          </a>
        </button>
      </div>
    </form>
  </div>
  @endforeach

  @elseif($step === 'confirm_pelanggan')
  <div class="table mt-2">
    <form action="/add_transaksi" method="post" enctype="multipart/form-data" id="list_pelanggan">
      {{ csrf_field() }}
      <input type="hidden" name="id_pelanggan" value="<?php echo $data->id ?>">
      <div class="row">
        <div class="column" style="padding: 0.5em 0"><img src="assets/img/index/joyce.jpg" alt=""></div>
        <div class="column">
          <h4 class="m-0 txt-normal">{{$data->nama_pelanggan}}</h4>
          <h5 class="m-0 txt-thin">9312 orders</h5>
        </div>
        <div class="column">
          <h4 class="m-0 txt-normal">{{$data->alamat}}</h4>
          <h5 class="m-0 txt-thin">{{$data->nomor_hp}}</h5>
        </div>

        <div class="column">
          <?php
        if($data->jenis_kelamin == 'Male') {
          echo '<div class="status-bar d-flex" style="background: #FDEDED">
          <div style="background: #F05253"></div>';
        } else if($data->jenis_kelamin == 'Female') {
          echo '<div class="status-bar d-flex" style="background: #EBEAFC">
          <div style="background: #4640DE"></div>';
        }
        ?>
          <h5 class="m-0 ml-1 txt-normal">{{$data->jenis_kelamin}}</h5>
        </div>
      </div>

      <div class="column tools p-absolute">
        <button type="submit" name="list_menu">
          <a class="d-i-block" name="list_menu">
            <img src="assets/img/index/icon/i-plus.png" alt="">
          </a>
        </button>
      </div>
    </form>
  </div>

  @elseif($step === 'list_menu')
  <form action="/add_transaksi" method="post" enctype="multipart/form-data" id="list_pelanggan">
    {{ csrf_field() }}
    <div class="table mt-2">
      <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan ?>">
      @foreach($data as $d)
      <div class="row">
        <div class="column" style="padding: 0.5em 0"><img src="assets/img/menus/<?php echo $d->file_name ?>" alt="">
        </div>
        <div class="column">
          <h4 class="m-0 txt-normal">{{$d->nama_menu}}</h4>
          <h5 class="m-0 txt-thin">9312 orders</h5>
        </div>
        <div class="column">
          <h4 class="m-0 txt-normal">Rp. {{$d->harga}}</h4>
        </div>

        <div class="column">
          <?php
        if($d->type == 'food') {
          echo '<div class="status-bar d-flex" style="background: #FDEDED">
          <div style="background: #F05253"></div>';
        } else if($d->type == 'drink') {
          echo '<div class="status-bar d-flex" style="background: #EBEAFC">
          <div style="background: #4640DE"></div>';
        }
        ?>
          <h5 class="m-0 ml-1 txt-normal">{{$d->type}}</h5>
        </div>
      </div>

      <div class="column tools p-absolute">
        <input type="number" class="input" name="jumlah<?php echo $d->id ?>" placeholder="jumlah pesanan">
      </div>
    </div>
    @endforeach

    <div class="column tools txt-right">
      <input type="number" class="input" name="bayar" placeholder="jumlah pembayaran" style="width: fit-content; padding: 15px 20px; font-size: 14px">
      <input type="submit" name="submit_transaksi" value="Submit" class="btn btn-primary">
    </div>

  </form>

  @elseif($step === 'submit_transaksi')
  <div class="result-transaksi">
    <div class="table mt-2">
      <div class="row">
        <div class="column">
          <h4 class="m-0 mt-1 mb-3 txt-bold">Nama Menu</h4>
        </div>
        <div class="column txt-left">
          <h4 class="m-0 mt-1 mb-3 txt-bold">Harga Menu</h4>
        </div>
        <div class="column mt-1 txt-center">
          <h4 class="m-0 mb-3 txt-bold">Jumlah</h4>
        </div>
        <div class="column txt-center">
          <h4 class="m-0 mt-1 mb-3 txt-bold">Jumlah Harga</h4>
        </div>
      </div>
      @foreach($data as $d)
      <div class="row">
        <div class="column">
          <h4 class="m-0 mt-1 mb-3 txt-thin">{{$d->nama_menu}}</h4>
        </div>
        <div class="column txt-left">
          <h4 class="m-0 mt-1 mb-3 txt-thin">Rp. {{$d->harga}}</h4>
        </div>
        <div class="column mt-1 txt-center">
          <h4 class="m-0 mb-3 txt-thin">{{$d->jumlah}}</h4>
        </div>
        <div class="column txt-center">
          <h4 class="m-0 mt-1 mb-3 txt-thin">Rp. {{$d->harga * $d->jumlah}}</h4>
        </div>
      </div>
      @endforeach
      <div class="result-hasil">
        <div>
          <h4 class="txt-normal">Bayar</h4>
          <h4 class="txt-normal">Total Harga</h4>
          <h4 class="txt-normal">Kembalian</h4>
        </div>
        <div>
          <h4 class="txt-thin">Rp. {{$bayar}}</h4>
          <h4 class="txt-thin">Rp. {{$total}}</h4>
          <h4 class="txt-thin">Rp. {{$bayar - $total}}</h4>
        </div>
        <div class="txt-right pt-4">
          <a href="" class="btn btn-primary" style="background: #e04040">Print to PDF</a>
          <a href="" class="btn btn-primary" style="background: #48af59">Print to Excel</a>
          <a href="/transaksi" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endif
</div>
@endsection