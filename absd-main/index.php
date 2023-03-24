<?php 

session_start();
include 'connect.php';
include 'query.php';
ini_set('display_errors', 0); // Hide Error

$username = $_SESSION['username'];
$sql = "SELECT username FROM users WHERE username = '$username'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $user[] = $row;

}

if ( !isset($_SESSION['username'])) {
	header("Location: login/login.php");
	exit;
}

// var_dump($_POST)

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="img/icon-absd.png">
    <title>ABSD Cloud</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	    <!--fontawesome-->
      <link rel="stylesheet" href="fontawesome/fontawesome-free-6.2.1-web/css/all.css">
	    <link rel="stylesheet" href="font/font/flaticon.css">
      <link rel="stylesheet" href="style.css">
      <script src="app.js"></script>
  </head>

  <body>

    <div class="upload" id="upload-1">
      <div class="overlay" onclick="popUpload()"></div>
      <div class="container" id="container-upload">
          <h2>UPLOAD</h2>
          <form method="post" enctype="multipart/form-data">
              <div id="file" class="mb-3">
                  <label for="formFileMultiple" class="form-label">Enter 1 file or more</label>
                  <input id="inputFile" class="form-control" name="file" type="file" multiple>
              </div>
              <button id="buttonUpload" disabled style="margin-top: 3.5vh; padding: 1vh 5vh" type="submit" class="btn btn-primary" name="submit">
                  Upload
              </button>
          </form>
      </div>
    </div>

  
  <div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
        <ul class="nav flex-column" style="margin-left: 35px; margin-top: 20px;">
            <li class="nav-item" style="margin-bottom: 10px;">
              <button class="btn btn-primary mt-4 mb-3" onclick="popUpload()" style="width: 120px; margin-left: 25px;"><i class="fa-solid fa-arrow-up-from-bracket" style="margin-right: 12px;"></i>Upload</button>
            </li>
            <li class="nav-item">
              <a class="btn btn-danger" href="logout.php" style="width: 120px; margin-bottom: 330px; margin-left: 25px;"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-right: 12px;"></i>Log Out</a>
            </li>
            <li class="nav-item">
                <!-- <a class="btn btn-outline-primary btn-sm" href="#" style="width: 120px; margin-bottom: 30px;"><i class="fa-solid fa-pen-to-square" style="margin-right: 12px;"></i>File Edit</a> -->
              </li>
          </ul>
          <button type="button" class="btn" id="btnProfil" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%; display: flex; flex-basis: content; cursor: pointer; border: none;">
            <img src="img/profil.png" alt="Foto Profil" width="50px" height="50px" style="margin-left: 30px; margin-right: 15px; border-radius: 100px;">
            <div style="border: 0px solid red;">
              <p style="margin: 4px 0 0 0; font-weight: 600; font-size: 16px;"><?= $user[0]['username']; ?></p>
              <p style="font-size: 12px; opacity: 70%;">Administrator</p>
            </div>
          </button>
        </div>
	    </nav>

        <!-- NAVBAR -->
        <div class="container-fluid p-0 px-lg-0 px-md-0">
        <div id="page-content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light my-navbar">
                <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                    <span></span>
			        <span></span>
				    <span></span>
                </div>
            <a class="navbar-brand" href="index.php">
              <img src="img/logo-absd.png">
            </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
          <div class="navbar-nav ml-auto">
            <form class="d-flex" method="GET" action="">
                <input class="form-control me-2" type="search" placeholder="Search" autocomplete="off" aria-label="Search" name="search">
                <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
             </div>
            </nav>
            </div>

        <!-- CONTENT -->
        <button id="btnFloat" class="btn btn-primary mt-4 mb-3" onclick="popUpload()" style="width: 80px; aspect-ratio: 1/1; border-radius: 200px; position: fixed; right: 10%; bottom: 5%; z-index: 20; font-size: 24px;">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="30" height="30" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 5px">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
           <path d="M7 9l5 -5l5 5"></path>
           <path d="M12 4l0 12"></path>
        </svg>
        </button>
        <div class="container-fluid px-lg-4" style="width: 91.5%; padding-bottom: 3.5%">
        <div class="row">
        <div class="col-md-12 mt-lg-4 mt-4">
          <ul class="nav flex-row" style="margin-left: 15px; margin-right: 73px; color: #0d6efd; font-size: 25px; font-weight: bold; justify-content: space-between;">
            <li>
              <a style="font-weight: 600; color: #222222;">Files</a>
            </li>
            <li>
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Filter By
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><form action="" method="post"><button class="dropdown-item" type="submit" name="descending" id="newest">Newest</button></form></li>
                  <li><form action="" method="post"><button class="dropdown-item" type="submit" name="ascending" id="oldest">Oldest</button></form></li>
                </ul>
              </div>
            </li>
          </ul> 

      <br>

              <div class="row text-center g-4">
              <?php if (!isset($files)) { ?>
                <p>Tidak ada data apapun</p>
              <?php } ?>
              <?php foreach($files as $file) : ?>
              <?php 
                $tmpName = explode('.', $file['filename']);
                $extension = strtolower(end($tmpName));
                ?>
              <div class="col-md-3 col-lg-2 col-sm-6 col-6" id="cardWrapper ">
                <div class="card mb-3 h-100" id="card">
                  <div class="card-body text-center">
                    <?php if ($extension === 'xlsx') { ?>
                      <img src="img/Logo Excel.png" style="width: 80px; margin-bottom: 10px;">
                      <?php } elseif ($extension === 'docx') { ?>
                        <img src="img/Logo Docx.png" style="width: 80px; margin-bottom: 10px;">
                      <?php } elseif ($extension === 'pdf') { ?>
                        <img src="img/Logo pdf.png" style="width: 80px; margin-bottom: 10px;">
                      <?php } ?>
                      <button type="button" id="iconDots" class="btn btn-sm btn-secondary-outline dropdown-toggle-split bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false" style=" margin-left: 3%; position: absolute; z-index: 1;">
                        <span >
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical" width="25" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                          </svg>
                        </span>
                      </button>
                      <ul class="bi bi-pen dropdown-menu">
                        <li class="menuLink"><form action="" method="post">
                          <a class="dropdown-item" href="download.php?filename=<?= $file["filename"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="20" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 8% 4% 0">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                          <path d="M7 11l5 5l5 -5"></path>
                          <path d="M12 4l0 12"></path>
                        </svg>
                        Download</a>
                      </form></li>

                        <li>
                        <a type="submit" class="dropdown-item" href="rename.php?id=<?= $file["id"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 8% 0 0">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                          <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                          <path d="M16 5l3 3"></path>
                        </svg>
                        Rename</a>
                        </li>
                        <hr>
                        <li><form action="" method="post">

                        <a type="submit" class="dropdown-item" style="color: #EC1019" href="delete.php?id=<?= $file["id"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 8% 2% 0; color: #EC1019;">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 7l16 0"></path>
                          <path d="M10 11l0 6"></path>
                          <path d="M14 11l0 6"></path>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                        Delete File</a>
                        </form></li>
                      </ul>
                    <h3 class="card-title"><?= $file['displayname'] ?> </h3>
                      <p class="card-text"><?= $file['date'] ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
              
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <img src="img/profil.png" alt="Foto Profil" width="100px" height="100px" style="margin-top: 10px; border-radius: 10px;">
                        <p style="margin: 20px 0 0 0; font-weight: 600; font-size: 16px;">Mister Ojan Hz</p>
                        <p style="font-size: 12px; opacity: 70%;">Administrator</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
        </div>
        </div>
        <!-- CONTENT -->
	</div>
  
  <!-- Pagination -->
  <!-- <nav aria-label="..." style="width: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid red; position: fixed; z-index: 20;">
  <ul class="pagination pagination-md">
    <li class="page-item active" aria-current="page">
      <span class="page-link">1</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav> -->

  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

  <script>
    $('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );
    });

    document.getElementById("inputFile").onchange = function() {
    if(this.value) {
        document.getElementById("buttonUpload").disabled = false; 
    }  
  }
    /*
    if(document.getElementById('inputFile').value == "") {
      document.getElementById('buttonUpload').disabled = true;
      alert("ini true")
    }
    else if(document.getElementById('inputFile').value != ""){
      document.getElementById('buttonUpload').disabled = false;
    } */

    /*
    const new = document.getElementById("newest");
    const old = document.getElementById("oldest");

    new.onclick = function(){
      document.getElementById("btn-drop").innerHTML = "Newest";
    }
    old.onclick = function(){
      document.getElementById('btn-drop').innerHTML = "Oldest";
    } */

    /*
    if (new.clicked == true) {
      document.getElementById('btn-drop').innerHTML = "Newest";
    }
    else if (old.clicked == true) {
      document.getElementById('btn-drop').innerHTML = "Oldest";
    }
    else {
      document.getElementById('btn-drop').innerHTML = "Filter By";
    }*/
  </script>
 </body>
</html>