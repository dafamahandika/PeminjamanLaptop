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
        <table id="data-admin" class="table table-striped table-bordered table-md"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No. Handphone</th>
                    <th>Asal Sekolah</th>
                    <th>Referensi</th>
                    <th>Validator</th>
                    <th>Status</th>
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
<script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>
@endsection
