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
                                <ul class="list-inline large">
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas1']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas2']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas3']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas4']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas5']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas6']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas7']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas8']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas9']}}</li>
                                    <li class="list-group-item list-group-item-action list-group-item-success">{{$ruang ['Fasilitas10']}}</li>
                                    <li class="list-inline-item m-0"></li>
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
  <div class="row">
    <div class="col-lg-8 mx-auto">
        <ul class="list-group shadow">
            <li class="list-group-item">
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                                            
                    
                    <button class="open-button" onclick="openForm()">Tambah Fasilitas</button>

                    <div class="form-popup" id="myForm">
                    <form action="/action_page.php" class="form-container">
                        <h1>Tambah</h1>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>


                        <button type="submit" class="btn">Tambah</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Keluar</button>
                    </form>
                    </div>   
            </li>
        </ul>
    </div>
</div>
</div>

<style>

body{background: linear-gradient(to right, #c04848, #480048);min-height: 100vh}.text-gray{color: #aaa}img{height: 170px;width: 140px}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>

<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
  @livewireScripts
</body>