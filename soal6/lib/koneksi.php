   <?php  
	$host = "mysql:host=localhost;dbname=arkademy";
	$user = "root";
	$pass = "";
	try {
		$db = new PDO($host, $user, $pass);
	} catch (PDOException $e) {
		echo "Error : " . $e->getMessage();
		die();
	}
?>