@extends('layouts.master')
@section ('title')
PPDB SMK Wikrama Bogor
@endsection

@section('content');
  <section class="section">
    <div class="section-header">
      <h1>Pembayaran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Student</a></div>
        <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pembayaran</h2>
      <p class="section-lead">Silahkan upload bukti pembayaran anda di form berikut</p>
      <br>
      <form method="POST" action="{{ route('storePayment') }}" enctype="multipart/form-data">   
        @csrf
        <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                    <h4>Form Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Nama Bank</label>
                                <select name="nama_bank"  class="form-control @error('nama_bank') is-invalid @enderror"  required>
                                  <option hidden>Pilih Nama Bank</option> 
                                  @foreach( $data as $dt)
                                  <option value="{{ $dt->nama_bank }}">{{ $dt->nama_bank }}</option>
                                  @endforeach
                                </select>
                                  @error('nama_bank')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                                
                                <div class="form-group mt-3">
                                  <label for="pemilik_rekening">Pemilih Rekening</label>
                                  <input type="text" name="pemilik_rekening" class="form-control @error('pemilik_rekening') is-invalid @enderror" placeholder="Dafa Mahandika" />
                                  @error('pemilik_rekening')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                                </div>

                                <div class="form-group mt-3">
                                  <label for="nominal" class="form-label">Nominal</label>
                                  <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror" placeholder="Rp. 200.000" />
                                  @error('nominal')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                                </div>

                                <div class="mt-3">
                                  <label for="formFileMultiple" class="form-label">Bukti Pembayaran</label>
                                  <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFileMultiple" name="bukti_payment" required>
                                  @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                
                                <div class="row align-items-start">
                                  <div class="col-sm-8"></div>
                                  <div class="col-sm-4">
                                    <input type="submit" value="Kirim" class="btn btn-block btn-primary">    
                                  </div>
                                </div>

                              </div>
                          </div>     
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
  </section>
@endsection