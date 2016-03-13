<?php 
	function log_in(){
		session_start();
		$uname = "";
		$pword = "";
		$errorMessage = "";
		//==========================================
		//	ESCAPE DANGEROUS SQL CHARACTERS
		//==========================================
		function quote_smart($value, $handle) {
		   if (get_magic_quotes_gpc()) {
		       $value = stripslashes($value);
		   }
		   if (!is_numeric($value)) {
		       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
		   }
		   return $value;
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$uname = $_POST['email'];
			$pword = $_POST['password'];
			$uname = htmlspecialchars($uname);
			$pword = htmlspecialchars($pword);
			//==========================================
			//	CONNECT TO THE LOCAL DATABASE
			//==========================================
			$user_name = "root";
			$pass_word = "";
			$database = "lendme";
			$server = "127.0.0.1";
			$tbl_name = "user";
			$db_handle = mysql_connect($server, $user_name, $pass_word);
			$db_found = mysql_select_db($database, $db_handle);
			if ($db_found) {
				$uname = quote_smart($uname, $db_handle);
				$pword = quote_smart($pword, $db_handle);
				$SQL = "SELECT * FROM $tbl_name WHERE email = $uname 
												AND BINARY password = $pword";
				$result = mysql_query($SQL);
				$num_rows = mysql_num_rows($result);
			//====================================================
			//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
			//====================================================
				if ($result) {
					if ($num_rows > 0) {
						// session_start();
						$_SESSION['email'] = $uname;
						header ("Location: /radiant/home.php");
					} else {
						// session_start();
						$_SESSION['login'] = "";
						header ("Location: /radiant/sign_in.php");
					}	
				} else {
					$errorMessage = "Error logging on";
				}
				mysql_close($db_handle);
			} else {
				$errorMessage = "Error logging on";
			}
		}
	}

	function sign_up() {
		session_start();
		$uname = "";
		$pword = "";
		$errorMessage = "";
		//==========================================
		//	ESCAPE DANGEROUS SQL CHARACTERS
		//==========================================
		function quote_smart($value, $handle) {
		   if (get_magic_quotes_gpc()) {
		       $value = stripslashes($value);
		   }
		   if (!is_numeric($value)) {
		       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
		   }
		   return $value;
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$uname = $_POST['email'];
			$pword = $_POST['password'];
			$uname = htmlspecialchars($uname);
			$pword = htmlspecialchars($pword);
			//==========================================
			//	CONNECT TO THE LOCAL DATABASE
			//==========================================
			$user_name = "root";
			$pass_word = "";
			$database = "lendme";
			$server = "127.0.0.1";
			$tbl_name = "user";
			// Create connection
			$conn = mysqli_connect($server, $user_name, $pass_word, $database);
			if (!$conn) {
				die("Connection failed: ".mysqli_connect_error());
			}
			//Check if username exist
			$sql = "SELECT * FROM $tbl_name WHERE email = '$uname'";
			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);
			echo $num_rows;
			if ($num_rows>0) {
				header("Location: /radiant/sign_up.php?Message='Email alreadly exists. Please choose another email.'");
			} else if ((strpos($uname, ' ') !== false) || (strpos($uname, '&quot;') !== false) || (strpos($uname, '\'') !== false)) {
				header("Location: /radiant/sign_up.php?Message='Username must not contain blank characters, double quotes and single quotes'");
			} else {
				$sql = "INSERT INTO $tbl_name(`email`, `password`) VALUES ('$uname', '$pword')";
				if (mysqli_query($conn, $sql)) {
				    header("Location: /radiant/home.php?Message='Create User Sucessful'");
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			mysqli_close($conn);
		}
	}

	function upload_item() {
		session_start();
		if(isset($_FILES["image"]["name"])) {
		    //Process the image that is uploaded by the user
		    $target_dir = "uploads/";
		    $target_file = $target_dir . basename($_FILES["image"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.".$_POST['image'];
		    }

			$uname = "";
			$pword = "";
			$errorMessage = "";
			//==========================================
			//	ESCAPE DANGEROUS SQL CHARACTERS
			//==========================================
			function quote_smart($value, $handle) {
			   if (get_magic_quotes_gpc()) {
			       $value = stripslashes($value);
			   }
			   if (!is_numeric($value)) {
			       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
			   }
			   return $value;
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $_SESSION['email'];
				$item_name = $_POST['item_name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$payment = $_POST['payment'];
				$start = $_POST['start'];
				$end = $_POST['end'];
				$tag = $_POST['tag'];
				$image = $_FILES["image"]["name"];
				//==========================================
				//	CONNECT TO THE LOCAL DATABASE
				//==========================================
				$user_name = "root";
				$pass_word = "";
				$database = "lendme";
				$server = "127.0.0.1";
				$tbl_name = "items";
				$db_handle = mysql_connect($server, $user_name, $pass_word);
				$db_found = mysql_select_db($database, $db_handle);
				$conn = mysqli_connect($server, $user_name, $pass_word, $database);
				if (!$conn) {
					die("Connection failed: ".mysqli_connect_error());
				}

				$sql = "INSERT INTO $tbl_name(`user`, `name`, `description`, `price`, `payment`, `start`, `end`, `tag`, `image`) VALUES ($user, '$item_name', '$description', $price, '$payment', '$start', '$end', '$tag', '$image')";

				if (mysqli_query($conn, $sql)) {
				    header("Location: /radiant/home.php?Message='Upload Items Successful'");
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		} else {
			echo "Upload Error!";
		}
	}


	$func_name = $_GET['func_name'];
	if ($func_name == "log_in") {
		log_in();
	} else if ($func_name == "sign_up") {
		sign_up();
	} else if ($func_name == "upload_item") {
		upload_item();
	}

?>