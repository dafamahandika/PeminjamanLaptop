@extends('layouts.master')

@section ('title')
PPDB SMK Wikrama Bogor
@endsection

@section('content')
     <section class="section">
          <div class="section-header">
               <h1>Dashboard {{ Auth::user()->name }}</h1>
               <div class="section-header-breadcrumb">
               <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
               <div class="breadcrumb-item"><a href="#">Student</a></div>
               </div>
          </div>

          <div class="section-body">
               <h2 class="section-title">Hi {{ Auth::user()->name }}</h2>
               <p class="section-lead">Selamat Datang Di PPDB SMK Wikrama Bogor</p>
          </div>
          @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
          
          @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif

          @if ($student->status == 'Pending')
               <div class="alert alert-info alert-dismissible fade show" role="alert"> 
                    <div class="texy-center">
                         <p>Silahkan Lakukan Pembayaran</p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
          
          @if ($student->status == 'Waiting')
               <div class="alert alert-info alert-dismissible fade show" role="alert"> 
                    <div class="texy-center">
                         <p>Silahkan Tunggu Validasi</p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
          
          @if ($student->status == 'Validasi')
               <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                    <div class="text-center">
                         <p>Pembayaran Telah Di Validasi, Silahkan tunggu info selanjutnya</p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
          
          @if ($student->status == 'Tolak')
               <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                    <div class="text-center">
                         <p>Pembayaran Di Tolak, Silahkan Lakukan Pembayaran Kembali</p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
     </section>
@endsection
     