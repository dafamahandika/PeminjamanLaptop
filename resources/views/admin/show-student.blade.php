@extends('layouts.master')
@section ('title')
Admin | Data Payments
@endsection

@section('content');
  <section class="section">
    <div class="section-header">
      <h1>Detail</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Detail</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                         <h4>Detail {{ $student->nama }}</h4>
                    </div>
                    <ul>
                         <li>Nomor Seleksi : {{ $student->id }}</li>
                         <li>Tanggal Daftar : {{ $student->created_at }}</li>
                         <li>NISN : {{ $student->nisn }}</li>
                         <li>Nama Lengkap : {{ $student->nama }}</li>
                         <li>Jenis Kelamin : {{ $student->jenis_kelamin }}</li>
                         <li>Email : {{ $student->email }}</li>
                         <li>Asal Sekolah : {{ $student->asal_sekolah }}</li>
                         <li>No. Handphone : {{ $student->no_phone }}</li>
                         <li>No. Handphone Ibu : {{ $student->no_ibu }}</li>
                         <li>No. Handphone Ayah : {{ $student->no_ayah }}</li>
                         <li>Referensi : {{ $student->referensi }}</li>
                    </ul>
                </div>
          </div>
      </div>
    </div>
  </section>
@endsection

{{-- @section('script')
<script>
  $('.sidebar-menu li').click(function() {
    $(this).toggleClass('active');
  }); 
</script>
@endsection --}}