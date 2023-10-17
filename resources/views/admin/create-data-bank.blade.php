@extends('layouts.master')
@section ('title')
Admin | Data Bank
@endsection

@section('content');
  <section class="section">
    <div class="section-header">
      <h1>Buat Data Bank</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Buat Data Bank</a></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Buat Data Bank</h2>
      <p class="section-lead"></p>
      <br>
      <form method="POST" action="{{ route('storeDataBank') }}" enctype="multipart/form-data">   
        @csrf
        <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                    <h4>Form Data Bank</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control" name="nama_bank" >
                            </div>
                        </div>
                        <br>
                        
                        <div class="row align-items-start">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <input type="submit" value="Simpan" class="btn btn-block btn-primary">    
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
{{-- @section('script')
<script>
  $('.sidebar-menu li').click(function() {
    $(this).toggleClass('active');
  }); 
</script>
@endsection --}}