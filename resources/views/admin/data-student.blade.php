@extends('layouts.master')

@section ('title')
Admin | Data Peserta Didik
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Siswa</h1>
        <div class="section-header-breadcrumb">
            
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Daftar Siswa</h3>
        <h6>Total Siswa = {{ $total }}</h6>
        <h6>Laki-laki = {{ $male }}</h6>
        <h6>Perempuan = {{ $female }}</h6>
        <table class="table table-striped table-bordered table-md text-center" cellspacing="1" id="my-table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. Handphone</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Referensi</th>
                    <th scope="col">Validator</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($data as $dt)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->nisn}}</td>
                    <td>{{$dt->nama}}</td>
                    <td>{{$dt->jenis_kelamin}}</td>
                    <td>{{$dt->email}}</td>
                    <td>{{$dt->no_phone}}</td>
                    <td>{{$dt->asal_sekolah}}</td>
                    <td>{{$dt->referensi}}</td>
                    @if ($dt->validator)
                    <td>{{$dt->validator}}</td>
                    @else
                    <td>-</td>
                    @endif
                    @if ($dt->status)
                    <td>{{$dt->status}}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
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
