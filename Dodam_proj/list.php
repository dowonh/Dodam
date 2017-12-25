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
    font-size: 0.90em;
    width: 500px;
    margin: 10px;
    padding: 10px;
    border: 1.5px solid #ccc;
    float: left;
}
  .box strong {
    color: skyblue;
  }
  .box .info {
    color: #999;
  }
@import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
  .myfont{
    font-family: Jeju Gothic', 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
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
            <h2>원하는 축제 정보!</h2>

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

        	if(isset($_GET['page']))
        	{
        		$page = $_GET['page'];
        	}
        	else
        	{
        		$page=1;
        	}

        	if(isset($_GET['year']))
        	{
        		$year = $_GET['year'];
        	}
        	else
        	{
        		$year = '';
        	}

        	if(isset($_GET['do']))
        	{
        		$do = $_GET['do'];
        	}
        	else
        	{
        		$do = '';
        	}

        	if($do == '전국')
        	{
        		$do = '';
        	}

        	if(isset($_GET['keyword']))
        	{
        		$keyword = $_GET['keyword'];
        	}
        	else
        	{
        		$keyword = '';
        	}

        	$sql = 'select count(*) as cnt from festival order by festival_id desc';
        	$result3 = $db->query($sql);
        	$row3 = $result3->fetch_assoc();

        	$allPost = $row3['cnt'];

        	$onePage = 15;
        	$allPage = ceil($allPost/$onePage);

        	if($page<1||($allPage && $page)>$allPage)
        	{
        		?>
        		<script>
        			alert("존재하지 않는 페이지 입니다");
        			history.back();
        		</script>
        		<?php
        		exit;
        	}
        	$oneSection = 10;
        	$currentSection = ceil($page/$oneSection);
        	$allSection = ceil($allPage/$oneSection);

        	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1);

        	if($currentSection == $allSection)
        	{
        		$lastPage = $allPage;
        	}
        	else
        	{
        		$lastPage = $currentSection * $oneSection;
        	}
        	$prevPage = (($currentSection-1)*$oneSection);
        	$nextPage = (($currentSection+1)*$oneSection) - ($oneSection - 1);

        	$paging = '<ul>';

        	if($page!=1)
        	{
        		$paging .= '<li class = "page page_start"><a href="./list.php?page=1&year='.$year.'&do='.$do.'&keyword='.$keyword.'">처음</a></li>';
        	}
        	if($currentSection != 1)
        	{
        		$paging .= '<li class="page page_prev"><a href="./list.php?page='.$prevPage.'">이전</a></li>';
        	}

        	for($i = $firstPage ; $i<=$lastPage ; $i++)
        	{
        		if($i == $firstPage)
        		{
        			$paging .= '<li class="page current">'.$i.'</li>';

        		}
        		else
        		{
        			$paging .= '<li class = "page"><a href = "./list.php?page='.$i.'&year='.$year.'&do='.$do.'&keyword='.$keyword.'">'
        .$i.'</a></li>';
        		}
        	}

        	if($currentSection != $allSection)
        	{
        		$paging .= '<li class = "page page_next"><a href = "./list.php?page='.$nextPage.'&year='.$year.'&do='.$do.'&keyword='.$keyword.'">다음</a></li>';
        	}

        	$paging .= '</ul>';

        	$currentLimit = ($onePage * $page) - $onePage;
        	$sqlLimit = 'limit '.$currentLimit.', '.$onePage;

        	$sqlWhere = ' ';

        	if($year !='')
        	{
        		$sqlWhere .= '(select start from period where period.month_id=festival.month_id) LIKE "%-'.$year.'-%"';
        	}
        	if($do !='')
        	{
        		if($sqlWhere == ' ')
        			$sqlWhere .= '(select local_name from locale where locale.local_id=festival.local_id) = "'.$do.'"';
        		else
        			$sqlWhere .= ' and (select local_name from locale where locale.local_id=festival.local_id) = "'.$do.'"';
        	}
        	if($keyword !='')
        	{
        		if($sqlWhere == ' ')
        			$sqlWhere .= 'festival_name LIKE "%'.$keyword.'%"';
        		else
        			$sqlWhere .= ' and festival_name LIKE "%'.$keyword.'%"';
        	}

        	if($sqlWhere == ' ')
        	{
        		$sql = 'select * from festival order by festival_id desc '.$sqlLimit;
        	}
        	else
        	{
        		$sql = 'select * from festival where '.$sqlWhere.'order by festival_id desc '.$sqlLimit;
        	}

        	$result = $db->query($sql);

        	while($row = $result->fetch_assoc())
        	{
        		$mid = $row['month_id'];
        		$sql = 'select * from period where month_id = '.$mid;
        		$result2 = $db->query($sql);
        		$row2 = $result2->fetch_assoc();
        		$start = $row2['start'];
        		$end = $row2['end'];
        		$content = $row['festival_content'];
        		$festname = $row['festival_name'];
        ?>
        		<!-- <td class = "no"><?php echo $row['festival_id']?></td> <br> -->
            <div class = "box">
        		<div class = "col-sm-12"> <img class="img-thumbnail" src="<?php echo $row['thumbnail']?>" width="500" height="90"></img> </div> <p>
        		<div class = "col-sm-12">
              <strong><a href="./show_gayeon.html?id=<?php echo $row['festival_id']?>"><?php echo $row['festival_name']?></a></strong> <br><br>
        		<div class = "marking"> 시작 날짜 :  <?php echo $start?></div>
        		<div class = "marking"> 종료 날짜 :  <?php echo $end?></div>
            </div>
          </div>
        <?php
        	}
        ?>
        <p>
        	<div class = "paging">
            <p>
        		<?php echo $paging?>
        	</div>
        	<?php
        ?>


      </div>
    </div>
  <!-- </section> -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
