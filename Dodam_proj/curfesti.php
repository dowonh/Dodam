<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog - DoDam DoDam</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

	<link href="http://fonts.googleapis.com/earlyaccess/jejugothic.css" rel="stylesheet">

</head>

<style>
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  /* Close button on hover */
  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
  }

  @keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
  }

  .box {
		font-family: 'Jeju Gothic', sans-serif;
    font-size: 0.90em;
    width: 2000px;
    margin: 50px;
    padding: 50px;
    /* border: 2.5px solid #ccc; */
		color : #696969;
    float: left;
}
  .box strong {
		font-family: 'Jeju Gothic';
    color: #696969;
  }
  .box .info {
    color: #999;
  }

  .myfont{
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }
</style>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

  <body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">DoDam DoDam</a>
      <button class="navbar-toggler navbar-toggler-right ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <a href="login.html">Login</a>
          </li>
          <li class="nav-item">
            <a href="register.html">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="login.html">Community</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<style type="text/css">

</style>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/bg-masthead.jpg')">
    <form action="./list/list.php" method="get">
    <div class="overlay"></div>
    <div class="container text-center">
      <div class="row">
        <div class="col-xl-9  mx-auto">
          <div class="post-heading" >
            <h2>aa</h2>

              <!-- <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                  <div class="form-row">
                  </div>
              </div> -->
          </div>
          </div>
      </div>
    </div>
  </form>
  </header>

  <!-- Icons Grid -->
  <!-- <section class="feature bg-light text-center"> -->
    <div class="container">
      <div class="row">
				<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
?>
			<?php
			$sql = 'select * from festival where MONTH((select start from period where period.month_id=festival.month_id))=MONTH(curdate()) limit 0, 10';
			$result = $db->query($sql);
			?>
			<div class = "box">
			<?php
			while($row = $result->fetch_assoc())
			{
			echo '<img src="'.$row['thumbnail'].'" width="400" height="200"></img>  ';
			echo '<a href="./show.php?id='.$row['festival_id'].'">'.$row['festival_name'].'</a><p>';
			}
			?>
			</div>

      </div>
    </div>
  <!-- </section> -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
