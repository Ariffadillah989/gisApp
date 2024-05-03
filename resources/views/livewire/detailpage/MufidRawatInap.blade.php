<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ruang Rawat Inap</title>
    @livewireStyles
</head>
<body>
  @include('layouts/homeButton')
  <div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Ruang Rawat Inap</h1>
        </div>
    </div>
  @foreach($ruangs as $ruang)
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$ruang ['Kelas']}}</h5>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <ul class="list-inline small">
                                    <li class="list-group-item">{{$ruang ['Fasilitas1']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas2']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas3']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas4']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas5']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas6']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas7']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas8']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas9']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-group-item">{{$ruang ['Fasilitas10']}}<i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                </ul>
                            </div>
                        </div><img src="{{$ruang ['Gambar']}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
                <!-- list group item -->
            </ul> <!-- End -->
        </div>
    </div>
  @endforeach
</div>
<style>

body{background: linear-gradient(to right, #c04848, #480048);min-height: 100vh}.text-gray{color: #aaa}img{height: 170px;width: 140px}

</style>
    </head>



  @livewireScripts
</body>
</html>