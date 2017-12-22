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

	if($do = '전국')
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
		<td class = "no"><img src="<?php echo $row['thumbnail']?>" width="500" height="200"></img></td> <br>
		<td class = "no"><a href="./show.php?id=<?php echo $row['festival_id']?>"><?php echo $row['festival_name']?></a></td> <br>
		시작 날짜 : <td class = "no"><?php echo $start?></td> <br>
		종료 날짜 : <td class = "no"><?php echo $end?></td>
		<br></br>
<?php
	}
?>
	<div class = "paging">
		<?php echo $paging?>
	</div>
	<?php
?>
