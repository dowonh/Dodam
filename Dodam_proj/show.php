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
	$id = $_GET['id'];
	$sql = 'select * from festival where festival_id='.$id;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	$sql = 'select * from locale where local_id='.$id;
	$result = $db->query($sql);
	$row2 = $result->fetch_assoc();
	$sql = 'select * from period where month_id='.$id;
	$result = $db->query($sql);
	$row3 = $result->fetch_assoc();

	// $image = $row['thumbnail'];
	// echo '<img src ="'.$image.'"></image><br>';
	// $name = $row['festival_name'];
	// echo $name.'<br><br>';
	// $content = $row['festival_content'];
	// echo $content.'<br>';
	// $homepage = $row['homepage'];
	// echo '홈페이지 : '.$homepage.'<br><br>';
	// echo '연락처  : '.$row2['phone_number'].'<br><br>';
	// echo '장소   : '.$row2['local_name'].' '.$row2['city'].' '.$row2['detail'].'<br><br>';
	// echo '기간   : '.$row3['start'].' ~ '.$row3['end'].'<br>';
?>
		<div class = "box">
				<div class = "col-sm-12">
				<?php
				$name = $row['festival_name'];
				echo '<strong><h1><center>'.$name.'</center></h1></strong><hr color="#ccc" size="100" width="900"><br>';
				$image = $row['thumbnail'];
				echo '<center><img src ="'.$image.'" width="750"></image></center><br><p><hr color="black">';
				?>
				<div class = "col-sm-12">
					<ul>
				<?php
				$homepage = $row['homepage'];
				echo '<li> <strong>홈페이지</strong> &ensp;'.$homepage.'</li><hr color="#ccc" size="100" >';
				echo '<li> <strong>연락처</strong> &ensp;'.$row2['phone_number'].'</li><hr color="#ccc" size="100" >';
				echo '<li> <strong>주소 </strong>&ensp;'.$row2['local_name'].' '.$row2['city'].' '.$row2['detail'].'</li><hr color="#ccc" size="100">';
				echo '<li> <strong>축제 기간 </strong>&ensp; '.$row3['start'].' ~ '.$row3['end'].'</li><hr color="#ccc" size="100" >';
				$content = $row['festival_content'];
				echo '<li> <strong>자세한 내용 </strong> &ensp; '.$content.'</li><br>';
				 ?>
			 </ul>
				</div>
			</div>
		</div>
      </div>
    </div>
  <!-- </section> -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
