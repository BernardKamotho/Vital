
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
			<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-info navbar-default text-white">
  <!-- Brand -->
  <a class="navbar-brand text-white" href="#">eVital</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
          <?php
            if ($_SESSION['role'] =='Chief' or $_SESSION['role'] =='Hospital'  or 
              $_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link text-white' href='birthappl.php'>Make New Application</a>";
             }
          ?>
        </li>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
        Actions
      </a>
      <div class="dropdown-menu">
         <?php
            if ($_SESSION['role'] =='HospitalD' or $_SESSION['role'] =='Admin'){
               echo "<a class='nav-link dropdown-item text-dark' href='applydeathpractioner.php'>Medical Practioner</a>";
             }
          ?>

          <?php
            if ($_SESSION['role'] =='HospitalD' or $_SESSION['role'] =='Admin'){
               echo "<a class='nav-link dropdown-item text-dark' href='postmoterm.php'>Pathologist</a>";
             }
          ?>


           <?php
            if ($_SESSION['role'] =='HospitalD' or $_SESSION['role'] =='Admin'){
               echo "<a class='nav-link dropdown-item text-dark' href='licensed_practioner.php'>Licensed Practioner</a>";
             }

          ?>
          <?php
            if ($_SESSION['role'] =='HospitalD' or $_SESSION['role'] =='Admin'){
               echo "<a class='nav-link dropdown-item text-dark' href='attendance_practioner.php'>Licensed Practioner  <br/>
               <span class='badge badge-info'>In Attendance</span>  </a>";
             }
          ?>

        
      </div>
    </li>



     
  
         <li class="nav-item">
           <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar' or $_SESSION['role'] =='User' or $_SESSION['role'] =='Hospital' || $role =='Chief' 
              || $role =='Licensed Practioner' || $role =='HospitalD' || $role =='Pathologist'){
                echo "<a class='nav-link text-white' href='../changepassword.php'>Change Password</a>";
             }
          ?>
        
        </li>



    
    
    </ul>
  </div> 
</nav>

</body>
</html>