<?php
	$servername = "akhfa.in";
	$username	= "laportaman";
	$password	= "RePark";
	$dbname		= "laportaman";

	/* Inisialisasi koneksi */
	function getConnection()
	{
		global $servername, $username, $password, $dbname;
		
		$conn 	= new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		else
			return $conn;
	}
	
	/* Untuk mengambil data dari database. Untuk aksesnya lihat di fungsi printResult */
	function getResultFromQuery($connection, $input_query)
	{
		$query 	= $input_query;
		$result = $connection -> query($query);
		if($result->num_rows > 0)
		{
			return $result;
		}
		else
		{
			echo "no result";
		}
	}
	
	/* Close connection. Wajib setiap database akan di close */
	function closeConnection($connection)
	{
		$connection -> close();
	}

	/* cara menampilkan hasil dari database */
	function printResult($result)
	{
		while($row = $result->fetch_assoc()) {
			echo $row["Nama"]."<br>";
		}
	}
?>