<html>
<head>
    <meta charset="windws-1251" />
    <title>Easy.Notes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
	
    
	<form id="login" action="">
    <h1>Регестрация</h1>
    <fieldset id="inputs">
        <input id="username" placeholder="Логин" name="log" required autofocus type="text">   
        <input id="password" placeholder="Пароль" name="pass" required autofocus type="password">
    </fieldset>
    <fieldset id="actions">
        <input id="submit" value="Регистрация" name="type" type="submit" >
        <a href="index.php">Вход</a>
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

if ($content==null and $type=="Регистрация"){
    $users->insert($user);
    echo '<script>
    alert("Вы успешно зарегистрированы");
    </script>';
    return false;
    }
if ($content!=null and $type=="Регистрация"){
    echo '<script>
    alert("Такой логин уже используется!");
    </script>';
    return false;
    }

?>
</body>
</html>