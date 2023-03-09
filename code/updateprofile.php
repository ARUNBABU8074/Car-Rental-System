<?php
include "config.php";
include "session.php";
// $update = false;

// Check user login or not
// if (!isset($_SESSION['uname'])) {
//   header('Location: login.php');
// }

// logout
// if (isset($_POST['but_logout'])) {
//   session_destroy();
//   header('Location: index.php');
// }
$n = $_SESSION['log_id'];
// $q="select useremail from regst where username='".$n."'";

// $result = mysqli_query($conn,$q);
// //echo $result;
// $row = mysqli_fetch_array($result);
// $count = $row['useremail'];
// echo "Your Email is  $count";
$q7 = "select * from driver where log_id='" . $n . "'";

$result7 = mysqli_query($conn, $q7);

$row2 = mysqli_fetch_array($result7);
$fname = $row2['fname'];
$email = $row2['email'];
$lname = $row2['lname'];
$phone = $row2['phone'];
$im=$row2['dim'];

$q8 = "select * from login where log_id='" . $n . "'";
$result8 = mysqli_query($conn, $q8);
$row3 = mysqli_fetch_array($result8);
$uname = $row3['username'];
$psw = $row3['passwd'];
// $_SESSION['password']=$psw;

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];

  // $pass = $_POST['password'];
  // $cpass = $_POST['cpassword'];

  $sql = "update `driver` set  fname='$fname',lname='$lname', phone='$phone' where log_id='" . $n . "'";
  $result2 = mysqli_query($conn, $sql);
  // $sql2 = "update login set password='$pass'where email='$n'";
  // $result3 = mysqli_query($conn, $sql2);
  if ($result2) {
    $update = true;
  }
}
if(isset($_POST['submitpass'])){
  $passwords=$_POST['pass'];
  $sql2 = "update login set passwd='$passwords' where log_id='$n'";
  $result3 = mysqli_query($conn, $sql2);
  echo '<script>alert("Password Updated Successfully");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">



  <title>Profile</title>
  <link rel="icon" type="image/x-icon" href="./images/022.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <style>
    #anton {
      margin-top: -20px;
    }
    #anton2{
      margin-top: -5px;
    }
  </style>
</head>

<body>
  <div class="container-xl px-4 mt-4">

    <nav class="nav nav-borders">
      <a class="nav-link active ms-0" href="" target="__blank">My Profile</a>
      <a class="nav-link active ms-0" href="driver-home.php" target="__blank">Home</a>
<!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a> -->
<!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a> -->
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-xl-4">

        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Profile Picture</div>
          <div class="card-body text-center">

            <img class="img-account-profile rounded-circle mb-2" src="images/<?php echo $im;?>" alt="">

            <!-- <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>  -->

            <!-- <button class="btn btn-primary" type="file">Upload new image</button>   -->
            <h3><?php echo $fname ." ". $lname?></h3>
          </div>
        </div>
      </div>
      <div class="col-xl-8">

        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <form action="" method="post" onsubmit="return Val();">

              <!-- <div class="mb-3">
<label class="small mb-1" for="inputUsername">Email</label>
<input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $_SESSION['uname'] ?>">
</div> -->

              <div class="row gx-3 mb-3">

                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">First name</label>
                  <input class="form-control" id="fname" name="fname" type="text" placeholder="Enter your first name" value="<?php echo $fname ?>" onkeyup="return Validate();">
                  <span id="usr1" style="color:red;">&nbsp</span>
                </div>


                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Last name</label>

                  <input class="form-control" id="lname" name="lname" type="text" placeholder="Enter your last name" value="<?php echo $lname ?>" onkeyup="return Validate2();">
                  <span id="usr2" style="color:red;"> &nbsp;</span>
                </div>

              </div>



              <div class="row gx-3 mb-3" id="anton">
                <div class="col-md-6">
                  <label class="small mb-1" for="inputUsername">Email</label>
                  <input class="form-control" id="inputUsername" type="text" placeholder="Email" value="<?php echo $email ?>" disabled>

                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputPhone">Phone number</label>
                  <input class="form-control" type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $phone ?>" onkeyup="return Validatephone();">
                  <span id="phoneer" style="color:red;">&nbsp</span>
                </div>


              </div>

              <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
           

              <!-- Modal -->

            </form>
          </div>
        </div>
      </div>


      
      <div class="col-xl-8" style="margin-left:33.2%">

        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <form action="" method="post" onsubmit="return Validatep();">

              <!-- <div class="mb-3">
<label class="small mb-1" for="inputUsername">Email</label>
<input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $_SESSION['uname'] ?>">
</div> -->

              <div class="row gx-3 mb-3">

              <div class="col-md-6">
                  <label class="small mb-1" for="inputUsername">User Name</label>
                  <input class="form-control" id="inputUsername" type="text" placeholder="Email" value="<?php echo $uname; ?>" disabled>

                </div>


                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Enter Your Old Password</label>

                  <input class="form-control" id="password" name="password" type="text" placeholder="Enter Your Password"  onkeyup="return Validatepassword();">
                  <input class="form-control" id="oldpass" name="oldpass" type="hidden" value="<?php echo $psw;?>">
                </div>

              </div>



              <div class="row gx-3 mb-3" id="anton2">
              <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">New Password</label>

                  <input class="form-control" id="pass" name="pass" type="text" placeholder="Password"  onkeyup="return Validatepass();" disabled>
                  <span id="passworder" style="color:red;"> &nbsp;</span>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputPhone">Confirm Password</label>
                  <input class="form-control" type="text" id="cpass" name="cpass" placeholder="Confirm Password" onkeyup="return Validatecpass();" disabled>
                  <span id="cpassworder" style="color:red;">&nbsp</span>
                </div>


              </div>

              <button class="btn btn-primary" type="submit" name="submitpass">Update Password</button>
           

              <!-- Modal -->

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
    body {
      margin-top: 20px;
      background-color: #f2f6fc;
      color: #69707a;
    }

    .img-account-profile {
      height: 10rem;
    }

    .rounded-circle {
      border-radius: 50% !important;
    }

    .card {
      box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
      font-weight: 500;
    }

    .card-header:first-child {
      border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
      padding: 1rem 1.35rem;
      margin-bottom: 0;
      background-color: rgba(33, 40, 50, 0.03);
      border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
      display: block;
      width: 100%;
      padding: 0.875rem 1.125rem;
      font-size: 0.875rem;
      font-weight: 400;
      line-height: 1;
      color: #69707a;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #c5ccd6;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 0.35rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
      color: #0061f2;
      border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
      color: #69707a;
      border-bottom-width: 0.125rem;
      border-bottom-style: solid;
      border-bottom-color: transparent;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      padding-left: 0;
      padding-right: 0;
      margin-left: 1rem;
      margin-right: 1rem;
    }
  </style>
  <script type="text/javascript">

  </script>
</body>

<script>
  function Validate() {

    var fname = document.getElementById('fname').value;

    if (fname.length < 3 || fname.length > 12) {
      document.getElementById('usr1').innerHTML = "Invalid Name";
      document.getElementById('name').value = address;
      document.getElementById('name').style.color = "red";
      return false;
    } else {
      document.getElementById('usr1').innerHTML = "&nbsp";
      document.getElementById('fname').style.color = "green";
      // return true;s

    }
  }

  function Validate2() {

    var fname = document.getElementById('lname').value;

    if (fname.length < 3 || fname.length > 12) {
      document.getElementById('usr2').innerHTML = "Invalid Name";
      document.getElementById('lname').value = address;
      document.getElementById('lname').style.color = "red";
      return false;
    } else {
      document.getElementById('usr2').innerHTML = " ";
      document.getElementById('lname').style.color = "green";
      // return true;s&nbsp
    }
  }

  function Validatephone() {

    var phone = document.getElementById('phone').value;
    // document.getElementById('phone').style.color = "red";
    // document.getElementById('phoneer').innerHTML = "Invalid Phone Number";

    var patt = /^[6-9]\d{9}$/;
    if (!phone.match(/^[6-9]\d{9}$/)) {
      document.getElementById('phoneer').innerHTML = "Invalid Phone Number";
      document.getElementById('phone').value = phone;
      document.getElementById('phone').style.color = "red";
      return false;
    } else {
      document.getElementById('phoneer').innerHTML = "&nbsp";
      document.getElementById('phone').style.color = "green";
      // return true;s

    }
  }

  // function Validatepassword() {

  //   var pass = document.getElementById('password').value;
  //   var patt = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
  //   if (pass.length < 8) {
  //     document.getElementById('passworder').innerHTML = "Atleast 8 character ";
  //     document.getElementById('password').value = pass;
  //     document.getElementById('password').style.color = "red";
  //     return false;
  //   } else {
  //     document.getElementById('passworder').innerHTML = " ";
  //     document.getElementById('password').style.color = "green";
  //     // return true;s

  //   }
  // }

  // function Confirmpass() {

  //   var pass1 = document.getElementById('password').value;
  //   var pass2 = document.getElementById('cpassword').value;
  //   if (pass1 != pass2) {
  //     document.getElementById('cpassworder').innerHTML = "Password doesnt match ";
  //     document.getElementById('cpassword').value = pass2;
  //     document.getElementById('cpassword').style.color = "red";
  //     return false;
  //   } else {
  //     document.getElementById('cpassworder').innerHTML = " ";
  //     document.getElementById('cpassword').style.color = "green";
  //     // return true;s

  //   }
  // }

  function Val() {
   
    if (Validatephone() === false || Validate() === false || Validate2() === false) {
      return false;
    }
  }
</script>
<script>
  function Validatepassword(){
    var password=document.getElementById('password').value;
    var oldpass=document.getElementById('oldpass').value;
   

    if(password==oldpass){
      document.getElementById('pass').disabled=false;
      document.getElementById('cpass').disabled=false;
    }
    else{
      document.getElementById('pass').disabled=true;
      document.getElementById('cpass').disabled=true;
    }
  }
  function Validatepass(){
    var pass = document.getElementById('pass').value;
                  var patt = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                  if (pass.length < 8) {
                    document.getElementById('passworder').innerHTML = "Atleast 8 character ";
                    document.getElementById('pass').value = pass;
                    document.getElementById('pass').style.color = "red";
                    return false;
                  } else {
                    document.getElementById('passworder').innerHTML = "&nbsp";
                    document.getElementById('pass').style.color = "green";
                    // return true;s

                  }
  }
  function Validatecpass(){
    var pass1 = document.getElementById('pass').value;
    var pass2 = document.getElementById('cpass').value;
    if (pass1 != pass2) {
      document.getElementById('cpassworder').innerHTML = "Password doesnt match ";
      document.getElementById('cpass').value = pass2;
      document.getElementById('cpass').style.color = "red";
      return false;
    } else {
      document.getElementById('cpassworder').innerHTML = "&nbsp";
      document.getElementById('cpass').style.color = "green";
  }
}
function Validatep() {
   
   if (Validatepassword() === false || Validatecpass() === false || Validatepass() === false) {
     return false;
   }
 }
</script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>