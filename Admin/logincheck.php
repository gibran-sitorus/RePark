<?php 

	$servername = "akhfa.in";
	$username = "laportaman";
	$password = "RePark";
	$dbname = "laportaman";
	$pengguna = $_POST["user-name"];
	$katapass = $_POST["pass-word"];


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM Admin Where Username='".$pengguna."' AND Password='".$katapass."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$cookie_name = "Username";
			$cookie_value = $pengguna;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			header('Location: message.php');
	    }
	} else {
		echo ("<script type='text/javascript'>alert('Username atau password error cuk');</script>");
		header('Location: index.php');
	}
	$conn->close();
 ?>

 <script>
$(function() {
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }
    var value = $("input#").val();;
        console.log("ready!");
    var cookie = $.cookie('name');
    $.cookie('name', value);
});
</script>