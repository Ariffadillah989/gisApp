<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ruang Rawat Inap</title>
    @livewireStyles
</head>
<body>
  @foreach($ruangs as $ruang)
    <div class="blok1"> 
      <h2>{{$ruang ['Kelas']}}</h2>
        <p>beberapa fasilitas yang disediakan pada ruang {{$ruang ['Kelas']}}</p>
          <img src="{{$ruang ['Gambar']}}" width="45%" height="60%">
          <ul class="">  <b>Fasilitas :</b>
            <li>{{$ruang ['Fasilitas1']}}</li>
            <li>{{$ruang ['Fasilitas2']}}</li>
            <li>{{$ruang ['Fasilitas3']}}</li>
            <li>{{$ruang ['Fasilitas4']}}</li>
          </ul>
    </div>
    @endforeach

<style>

    .detail {
      margin: 0%;
      padding-right: 200px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
    }
    
    html {
      box-sizing: border-box;
    }
    
    .blok1 {
      margin: 100px;
      border: 2px solid powderblue;
      padding: 30px

    }

    .text-block{
      overflow:right;
      float: right;
      padding: 210px;
    }

    #gambar{
      max-width: 60%;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 100px;
    }

</style>
    </head>



  @livewireScripts
</body>
</html>