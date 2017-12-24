$sql_check = "SELECT * FROM heart WHERE like_guestID = '$user' AND like_festID = '$id' ";
	$result_check = mysqli_query($conn, $sql_check);

	if(!$result_check) {
	    $sql2 = "INSERT INTO heart (like_guestID, like_festID, like_check) VALUES ('$user', '$id', '1');
	    $sql = "UPDATE festival SET like_count = like_count + 1 WHERE festival_id = '$id' ";
	    }

	else {
	    $sql = "UPDATE festival SET like_count = like_count - 1 WHERE festival_id = '$id' ";
		$sql2 = "UPDATE heart SET like_check = 0";
	}



	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_query($conn, $sql2);
