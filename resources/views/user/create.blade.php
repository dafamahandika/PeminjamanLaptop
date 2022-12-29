<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/daftar.css">
    <link rel="shortcut icon" href="images/logo-wk.png" type="img/x-icon" />
    <title>Pendaftaran PPDB</title>
</head>
<body>
@if ($message = Session::get('success'))
    <div class="alert alert-success text-center" role="alert">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container contact-form">
        <div class="contact-image">
            <img src="images/logo-wk.png">
        </div>
        <a href="/" type="submit" class="btn btn-secondary float-right mr-10">Kembali</a>
        

        <form  action="{{route('storeDaftar')}}" method="POST">
            @csrf
            <h3 class="text-dark">Masukkan Data Calon Peserta Didik</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="006484****" autofocus required/>
                        @error('NISN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Dafa Mahandika" value="" required/>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin"  class="form-control"  required>
                            <option hidden>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone Ayah</label>
                        <input type="text" name="no_ayah" class="form-control" placeholder="0868********" value="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Referensi Mendaftar</label>
                        <select name="referensi"  class="form-control"  required>
                            <option hidden>Referensi</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Langsung Dari SMK Wikrama">Langsung Dari SMK Wikrama</option>                
                        </select>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Asal Sekolah</label>
                        <select name="asal_sekolah"  class="form-control"  required>
                            <option hidden>Pilih Asal Sekolah</option> 
                            <!-- <option value="SMPN 1 Cisarua">SMPN 1 Cisarua</option> 
                            <option value="SMPN 2 Cisarua">SMPN 2 Cisarua</option>  -->
                            @foreach( $data as $dt)
                            <option value="{{ $dt->nama_sekolah }}">{{ $dt->nama_sekolah }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="dafamahandika@gmail.com" value="" required/>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="text" name="no_phone" class="form-control" placeholder="0868********" value="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Handphone Ibu</label>
                        <input type="text" name="no_ibu" class="form-control" placeholder="0868********" value="" required/>
                    </div>
                </div>
                <button class="btn btn-dark fs-5">Daftar</button>
            </div>
        </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
<!------ Include the above in your HEAD tag ---------->


