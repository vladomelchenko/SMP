<html>
<head>
    <meta charset="utf-8" />
    <title>Easy.Notes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
	
    
	<form id="login" action="">
    <h1>Вход</h1>
    <fieldset id="inputs">
        <input id="username" placeholder="Логин" name="log" required autofocus type="text">   
        <input id="password" placeholder="Пароль" name="pass" required autofocus type="password">
    </fieldset>
    <fieldset id="actions">
        <input id="submit" value="Вход" type="submit" name="type">
        <a href="index1.php">Регистрация</a>
    </fieldset>
</form>

      
		
        <?php
    session_start();
    
$log=$_GET['log'];
$pass=$_GET['pass'];
$type=$_GET['type'];
$db=new MongoClient();
$users=$db->notes->users;
$user = array( "username" => $log, "password" => $pass); 
$content=$users->findOne($user);
if ($content==null and $type=="Вход"){
    echo '<script>
    alert("Неправильный логин или пароль!");
    window.location="index.php";
    </script>';
    return false;
    }
if ($content!=null and $type=="Вход"){
    echo '<script>
    alert("Вы успешно зашли!");
    window.location="notes.php";
    </script>'; 
        $_SESSION["log"] = $content["username"];
    return true;
//}
}
?>
</body>
</html>