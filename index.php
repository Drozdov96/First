<?php
	spl_autoload_register();
	//require_once("ListOfItems.php");
	require_once("functions.php");
	if(isset($_POST['submit_btn'])){
		if(validate_user($_POST['login'], $_POST['password'])){
			setcookie(login_state, 1, time()+60);
			header("Location: /index.php");
			exit;
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Autorization form</title>
</head>
<body style="min-width: 1000px;">
	<section>
	<section style="margin:0 auto; display:block; width:700px;">
	<div style="display:block;">
		<nav>
			<!-- i need to create conflict -->
			 <ul style="list-style-type: none; display:table;"> 
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">Main</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">Info</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">Why</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">You</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">Are</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">Reading</a></li>
				<li style="display:table-cell; padding:0 15 0 17; letter-spacing: 0px;"><a href="">This</a></li>
			 </ul> 
		</nav>
	</div>
	<h2>LICNIY CABINET</h2>
	<br/>
	<br/>
<?php
	if(isset($_COOKIE['login_state'])){
		$list= new ListOfItems();
		//for($i=0; $i<$list->length();$i++){
			$i=(!isset($_GET['page'])? 0: intval($_GET['page']));
			$obj=$list->$i;
			echo "<div>
				<h4>$obj->name</h4>
				<img src=\"../img/$obj->img\" style=\"width:300px;\" />
				<p>$obj->desc</p>
			</div> ";

			pagination($i+1,$list->length());
		//}
		/* echo "<div>
				<p>Cart: $num items.</p>
			</div> "; */
			
	}else{
		echo "
	<form name=\"sign-in_form\" action=\"\" method=\"post\">
		<p>Login: </p>
		<input type=\"text\" name=\"login\" placeholder=\"Example\" required>
		<br/>
		<p>Password: </p>
		<input type=\"password\" name=\"password\" required>
		<br/>
		<input type=\"submit\" name=\"submit_btn\" value=\"Input\">
		<br>
		<br>
		<table>
		<tbody>
		    <tr>
		    <th>None of your business!</th>
            </tr>
        </tbody>
		</table> ";
	}
?>
</section>
</section>
</body>
</html>