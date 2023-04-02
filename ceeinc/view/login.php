<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

</head>
<body>
<!-- Bootstrap CSS -->



<div class="container-fluid" >
  <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
    <div class="login_oueter" style="background-color: darkred; border-radius: 25px; ">
      
      <form action="" method="post" id="login" autocomplete="off" class="bg-lixxxght border p-3" style="background-color: white; border-radius: 25px; ">
        <div class="form-rowx"><center>
          <h5><b style="text-align:center; color: black;">Agent Login</b></h5></center>
          <p style="text-align:center; color: black; font-family: cursive; font-size: 12px; "><b> Hey, Enter your details to get signin<br> to your account</b></p>
          <div class="col-12">
            <div class="input-group mb-3">
              <input name="email" type="text" value="" class="input form-control" id="username" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
          
          <div class="col-12">
            <div class="input-group mb-3">
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="background-color: #216fa7;"><i class="fas fa-paper-plane"></i></span>
              </div> -->
              <input style="background-color: #f2642b; font-weight: bold;" name="number" type="submit" value="Sign in" class="input form-control" id="number" placeholder="Number" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>

          <div class="col-sm-12 pt-3 text-center">
            <p><b> - Or Sign in with - </b></p>
            <i class="bi bi-facebook"></i>
          </div>
          <div class="col-12">
            <!-- <button class="btn btn-primary" type="submit" name="signin">Login</button>
            <button class="btn btn-primary" type="submit" name="signin">Login</button> --><center>
            <span class="btn btn-primary" id="basic-addon1" style="width:30%"><i class="fab fa-facebook-square"></i></span>
            <span class="btn btn-primary" id="basic-addon1" style="width:30%"><i class="fab fa-apple"></i></span>
            <span class="btn btn-primary" id="basic-addon1" style="width:30%"><i class="fab fa-google"></i></span></center>
            
          </div><br>
          <center>Don't have on account?<b><a style="text-decoration: none;" href="<?php echo BASE_URL;?>signup"> Register Now</a></b> </center><br>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
<style type="text/css">
body{
  width: 100%;
  height: auto;
  background-image: url('<?php echo BASE_URL;?>assets/wp-content/plugins/aheto/assets/images/001.png');
  background-size: cover;

  }
.login_oueter {
    width: 360px;
    max-width: 100%;
}
.logo_outer{
    text-align: center;
}
.logo_outer img{
    width:120px;
    margin-bottom: 40px;
}
</style>
<script type="text/javascript">
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
</html>