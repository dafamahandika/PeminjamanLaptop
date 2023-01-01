@extends('layouts.master')

@section('title')
Admin | Data Payments
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Student Payments</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Payments</div>
        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Daftar Student Payments</h3>
        <table id="data-admin" class="table table-striped table-bordered table-md text-center"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Seleksi</th>
                    <th>Pemilik rekening</th>
                    <th>Nominal</th>
                    <th>Bank</th>
                    <th>Bukti</th>
                    <th>Detail</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($payments as $payment)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$payment->student_id}}</td>
                    <td>{{$payment->pemilik_rekening}}</td>
                    <td>{{$payment->nominal}}</td>
                    <td>{{$payment->nama_bank}}</td>
                    <td><a href="">Lihat</a></td>
                    <td><a href="{{ route('showStudent', ['nisn' => $payment->nisn]) }}">Detail</a></td>
                    <td>
                    @if ($payment->status == 'validasi')
                        <p>Telah divalidasi</p>
                    @elseif($payment->status == 'tolak')
                        <p>Di Tolak</p>
                    @else
                        <form action="{{ route('validationPayment', ['nisn' => $payment->nisn]) }}" method="post">
                            @csrf
                            <button  class="btn btn-success mr-1">Validasi</i></button>
                            <a href="{{ route('rejectPayment', ['nisn' => $payment->nisn]) }}" class="btn btn-danger mr-1">Tolak</i></a>
                        </form>
                    @endif
                    
                    </td>
                    
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
