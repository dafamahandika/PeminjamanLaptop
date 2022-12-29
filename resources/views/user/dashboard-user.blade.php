@extends('layouts.master')

@section ('title')
PPDB SMK Wikrama Bogor
@endsection

@section('content')
     <section class="section">
          <div class="section-header">
               <h1>Dashboard {{ auth()->user()->name }}</h1>
               <div class="section-header-breadcrumb">
               <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
               <div class="breadcrumb-item"><a href="#">Student</a></div>
               </div>
          </div>

          <div class="section-body">
               <h2 class="section-title">Hi {{ auth()->user()->name }}</h2>
               <p class="section-lead">Selamat Datang Di PPDB SMK Wikrama Bogor</p>
          </div>

          @if ($message = Session::get('success'))
               <div class="alert alert-success d-flex justify-content-center" width="15" height="10" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                         {{$message}}
                    </div>
               </div>
          @endif
     </section>
@endsection
     