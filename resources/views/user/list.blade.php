<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Tabel Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark fs-5">
        <div class="container">
            <a class="navbar-brand fw-semibold fs-4 text-light" href="#">List Peminjaman</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-center text-light" aria-current="page" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-center text-light" aria-current="page" href="/">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="container">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Rombel</th>
                            <th>Rayon</th>
                            <th>No Laptop</th>
                            <th>Ruangan</th>
                            @auth
                            <th>Action</th>
                            <th>Validator</th>
                            @endauth                       
                        </tr>
                    </thead>
                    <?php $i = 1;?>
                    @foreach($data as $dt)
                    <tbody>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$dt->nisn}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->rombel}}</td>
                            <td>{{$dt->rayon}}</td>
                            <td>{{$dt->no_laptop}}</td>
                            <td>{{$dt->ruangan}}</td>
                            @auth
                            <td>
                                <?php if($dt->status == 0 ){ ?>
                                <div class="row">
                                    <form method="POST" action="{{route('approve')}}">
                                        @csrf
                                        <input type="hidden" name="nisn" value="{{$dt->nisn}}">
                                        <input type="submit" value="Validasi" class="btn btn-primary btn-lg btn-demo">
                                    </form>
                                </div>
                                <?php }else{echo "Peminjaman Divalidasi";} ?>
                            </td>
                            @if ($dt->validator)
                                <td>{{$dt->validator}}</td>
                            @else 
                                <td>-</td>
                            @endif
                            @endauth
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
