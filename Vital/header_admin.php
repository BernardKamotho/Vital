
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
			<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
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
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
                echo "<a class='nav-link text-white' href='admin.php'>Add Users</a>";
             }
          ?>
        
      </li>

      <li class="nav-item">
           <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
                echo "<a class='nav-link text-white' href='adminuserview.php'>View Users</a>";
             }
          ?>
       
      </li>

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
        Birth Actions
      </a>
      <div class="dropdown-menu">
         <?php
            if ($_SESSION['role'] =='Chief' or $_SESSION['role'] =='Hospital' or $_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='mybirthapplications.php'>My Applications<span class = 'badge badge-success'>Approved</span></a>";
             }
          ?>

          <?php
            if ($_SESSION['role'] =='Chief' or $_SESSION['role'] =='Hospital' or $_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='mybirthapplications2.php'>My Applications  <span class = 'badge badge-info'>Pending</span></a>";
             }
          ?>


           <?php
            if ($_SESSION['role'] =='Chief' or $_SESSION['role'] =='Hospital' or $_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='rejected.php'>My Applications  <span class = 'badge badge-danger'>Rejected</span></a>";
             }
          ?>


            <?php
            if ($_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link link-info dropdown-item text-dark' href='approve.php'>Approve/Reject</a>";
             }
          ?>
      </div>
    </li>


       

      <li class="nav-item dropdown">
       <?php
            if ($_SESSION['role'] =='Registrar' || $_SESSION['role'] =='Admin'){
               echo " <a class='nav-link dropdown-toggle text-white' href='#'' id='navbardrop' data-toggle='dropdown'>
                Births Reports
              </a>";
             }
          ?>

      <div class="dropdown-menu">
         <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='approvedbirths.php'>Applications  <span class = 'badge badge-success'>Approved</span></a>";
             }
          ?>

          <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='pendingbirths.php'>Applications  <span class = 'badge badge-info'>Pending Approval</span></a>";
             }
          ?>


           <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='rejectedbirths.php'>Applications  <span class = 'badge badge-danger'>Rejected</span></a>";
             }
          ?>

      </div>
    </li>


       

             <li class="nav-item">
           <?php
            if ($role =='Licensed Practioner'){
                echo "<a class='nav-link text-white' href='deathapp/licensed_practioner.php'>Register Death</a>";
               echo "<a class='nav-link text-white' href='deathapp/attendance_practioner.php'>Att. Practioner</a>";
             }
          ?>
        
        </li>


           <li class="nav-item">
           <?php
            if ( 
              $role =='Pathologist'){
                echo "<a class='nav-link text-white' href='deathapp/postmoterm.php'>Register Death</a>";
             }
          ?>
        
        </li>

             <li class="nav-item">
           <?php
            if ($role =='HospitalD'){
                echo "<a class='nav-link text-white' href='deathapp/applydeathpractioner.php'>Register Death</a>";

                echo "<a class='nav-link text-white' href='deathapp/attendance_practioner.php'>Att. Practioner</a>";
             }
          ?>
        
        </li>

        <li class="nav-item dropdown">
       <?php
            if ($_SESSION['role'] =='Registrar' || $_SESSION['role'] =='Admin'){
               echo " <a class='nav-link dropdown-toggle text-white' href='#'' id='navbardrop' data-toggle='dropdown'>
                Other Reports
              </a>";
             }
          ?>

      <div class="dropdown-menu">
         <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
               echo "<a class='nav-link dropdown-item text-dark' href='registered_deaths_req.php'>Applications 
               <span class = 'badge badge-info'>Certificates Requested</span></a>";

               echo "<a class='nav-link dropdown-item text-dark' href='registered_deaths_not_req.php'>Applications  <span class = 'badge badge-info'>Certificates Not Requested</span></a>";

              echo "<a class='nav-link dropdown-item text-dark' href='approved_deaths.php'>Applications <span class = 'badge badge-success'>Requested & Approved</span></a>";

    
             }
          ?>
  
          <?php
            // if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
            //    echo "<a class='nav-link dropdown-item text-dark' href='pendingbirths.php'>Licensed Practioners</a>";
            //  }
          ?>


           <?php
            // if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
            //    echo "<a class='nav-link dropdown-item text-dark' href='rejectedbirths.php'>Medical Practioners</a>";
            //  }
          ?>

            <?php
            // if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar'){
            //    echo "<a class='nav-link dropdown-item text-dark' href='rejectedbirths.php'>Attendance Practioners</a>";
            //  }
          ?>

      </div>
    </li>


     <li class="nav-item">
           <?php
            if ($_SESSION['role'] =='Admin' or $_SESSION['role'] =='Registrar' or $_SESSION['role'] =='User' or $_SESSION['role'] =='Hospital' || $role =='Chief'){
                echo "<a class='nav-link text-white' href='changepassword.php'>Change Password</a>";
             }
          ?>
        </li>
    </ul>
  </div> 
</nav>

</body>
</html>