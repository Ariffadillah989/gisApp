<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rumah Sakit Ibnu Sina</title>
    @livewireStyles
</head>
<body>
  <div class="container-fluid">
    @include('layouts/sideBar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Rumah Sakit
                </div>
                <div class="card-body">
                    <div>
                        <h1 align="center">Nama Rumah Sakit</h1>
                    </div>
                    <div style="width: 100%; height:60vh;">
                        <img src="https://static.guesehat.com/static/directories_thumb/161288_Rumah_Sakit_Ibnu_Sina.JPG" width="100%" height="100%" style="vertical-align:top">
                    </div>
                    <div>
                        <div class="about-section">
                          <h1>Rumah Sakit TGK chik Ditiro</h1>
                          <p>Kami Memberi Solusi</p>
                          <p>Selalu Bersama Dalam Memberantas COVID 19</p>
                        </div>
                        
                        <h2 style="text-align:center">FASILITAS RUMAH SAKIT</h2>
                        <div class="row">
                          <div class="column">
                            <div class="card">
                              <div class="container">
                                <h2>Ruang Rawat Inap</h2>
                                <a href="/detailruang" class="btn btn-primary" style="margin: 5%">Lihat Lebih Lengkap</a>

                              </div>
                            </div>
                          </div>
                        
                          <div class="column">
                            <div class="card">
                              <div class="container" style="position: relative">
                                <h2 style="text-align: center">Program Tersedia</h2>
                                <a href="/detailruang" class="btn btn-primary" style="margin: 5%">Lihat Lebih Lengkap</a>
                              </div>
                            </div>
                          </div>

                          <div class="column">
                            <div class="card">
                              <div class="container">
                                <h2>Fasilitas Lainnya</h2>
                                <a href="/detailruang" class="btn btn-primary" style="margin: 5%">Lihat Lebih Lengkap</a>
                              </div>
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>    
     </div>
</div>

<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
    }
    
    html {
      box-sizing: border-box;
    }
    
    *, *:before, *:after {
      box-sizing: inherit;
    }
    
    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }
    
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 8px;
    }
    
    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #474e5d;
      color: white;
    }
    
    .container {
      padding: 0 20px;
      height: 100px;
      position: relative;
      
    }
    
    .container::after, .row::after {
      content: "";
      clear: both;
      display: table;

      
    }
    
    .title {
      color: grey;
    }
    
    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }
    
    .button:hover {
      background-color: #555;
    }
    
    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }
    </style>
    </head>



  @livewireScripts
</body>
</html>