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
        <table id="my-table" class="table table-striped table-bordered table-md text-center" cellspacing="1">
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
                    <td>{{'Rp.'. number_format($payment->nominal,2,',','.')}}</td>
                    <td>{{$payment->nama_bank}}</td>
                    <td><a href="/payments/{{ $payment->bukti_payment }}" target="_blank">Lihat</a></td>
                    <td><a href="{{ route('showStudent', ['nisn' => $payment->nisn]) }}">Detail</a></td>
                    <td>
                    @if ($payment->status == 'validasi')
                        <p>Telah divalidasi</p>
                    @elseif($payment->status == 'tolak')
                        <p>Di Tolak</p>
                    @else
                    <div class="container ">
                        <div class="row justify-content-center">
                        <form action="{{ route('validationPayment', ['nisn' => $payment->nisn]) }}" method="post">
                            @csrf
                            <button  class="btn btn-success mr-1">Validasi</i></button>
                        </form>
                        <form action="{{ route('rejectPayment', ['nisn' => $payment->nisn]) }}" method="post">
                            @csrf 
                            <button class="btn btn-danger mr-1">Tolak</i></button>
                        </form>
                        </div>
                    </div>
                    @endif
                    
                    </td>
                    
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection