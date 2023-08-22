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
                        <img src="https://images.unsplash.com/photo-1533042789716-e9a9c97cf4ee?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjl8fGhvc3BpdGFsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" width="100%" height="100%" style="vertical-align:top">
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
                                <ul>
                                    <li>Ruang Vip</li>
                                    <li>Ruang Kelas 1</li>
                                    <li>Ruang Kelas 2</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        
                          <div class="column">
                            <div class="card">
                              <div class="container">
                                <h2>Ruang Rawat Jalan</h2>
                                <ul>
                                <li>POLI JANTUNG </li>
                                <li>POLI BEDAH </li>
                                <li>POLI ANAK </li>
                                <li>POLI GIGI </li>
                                </ul>
                                <a href="https://rsucitrahusada.com/user/fasilitas_detail/pelayanan-rawat-jalan" class="btn btn-primary">Lihat Lebih Lengkap</a>
                              </div>
                            </div>
                          </div>
                          
                          <div class="column">
                            <div class="card">
                              <div class="container">
                                <h2> Program</h2>
                                <ul>
                                <li>Program Diet </li>
                                <li>Program Tepat Sehat </li>
                                </ul>
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
      padding: 0 16px;
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
    <body>