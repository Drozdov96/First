<?php
	function validate_user($login, $password){
		
		$hash=sql_call("SELECT password FROM `users` WHERE login='$login'");

		if($hash!=false){
			$pass=$hash->fetch_object();
			if(strcmp(crypt($password), $pass->password)){
				return true;
			}
		}

		/* if($hash!=false){
			if(strcmp(crypt($password), mysql_result($hash,0))){
				mysql_close($connection);
				return true;
			}
		}
		mysql_close($connection); */
		return false;
	}

	function sql_call($query){
		$mysqli = new mysqli("127.0.0.1", "root", "56171209Wr", "mySite");
		if ($mysqli->connect_errno) {
			echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		$tmp= $mysqli->query($query);
		mysqli_close($mysqli);
		return $tmp;	
		//$connection= mysql_connect("localhost", , )
		//	or die("Не удалось установить соединение: ". mysql_error());
		//mysql_select_db();
		//return mysql_query($query);
	}

	function pagination($tempPage, $maxPage){
		echo "<div style=\"width:100%;\">";

		for($i=1; $i<=$maxPage; $i++){
			if($i==$tempPage){
				echo "<span>$i</span>";
				continue;
			}

			echo "<a href=\"../index.php?page=". ($i-1) ."\">$i</a>";
		}

		echo "</div>";
	}
?>