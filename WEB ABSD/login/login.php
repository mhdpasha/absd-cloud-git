<?php 

session_start();
include '../login-inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="card login-form">
            <div class="card-body">
              <img src="../img/logo-absd.png" id="img" style="width: 150px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;">
              <h4 class="card-title">Login</h4>
              <h6 class="card-subtitle text-muted mb-5 fw-bold">Please login to use this site</h6>

              <form method="post">
                <div class="mb-4">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input name="username" type="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" autocomplete="off">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password  " autocomplete="off">
                </div>

                <?php if ( isset($error) ) : ?>
                <h6 class="card-subtitle mt-3" style="color:red;">username atau password salah*</h6>
              <?php endif; ?>

                <div class="d-grid mt-5" id="login">
                    <button type="submit" class="btn btn-primary btn-login" name="login">Login</button>
                </div>

                <!-- <div class="mt-3">
                    <label>Not Regestered yet ? <a href="#" Class="Link">Create an account</a></label>
                </div> -->

                
              </form>
            </div>
          </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // let animation = anime({
    //   targets: '#img',
    //   translateX: [0, 150, 0, -150, 0],
    //   translateY: [-150, 0, 150, 0, 0],
    //   scale: [1, 2, 1, 3, 1],
    //   rotate: [360, 540, 720, 900, 1080],
    //   easing: 'easeInOutBack',
    //   autoplay: true,
    //   loop: true,
    // })
    // document.getElementById("img").onmouseover = animation.play;
    // document.getElementById("img").onmouseleave = animation.restart;
</script>
</html>