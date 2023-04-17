
<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'publishe_selfserve', 'hc@admin' , 'publishe_selfserve');

	$sql = $conn->prepare("SELECT table_name
FROM information_schema.tables
WHERE table_schema = 'publishe_selfserve'
AND table_name like ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["table_name"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>
