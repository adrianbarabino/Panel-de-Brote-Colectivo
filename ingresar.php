<?php 

require('conexion.php');

function quitar($mensaje)
{
$mensaje = str_replace("<","<",$mensaje);
$mensaje = str_replace(">",">",$mensaje);
$mensaje = str_replace("\'","'",$mensaje);
return $mensaje;
}

if(trim($_POST["email"]) != "" && trim($_POST["password"]) != "")
{
$emailN = quitar($_POST["email"]);
$passN = md5($_POST["password"]);

$result = mysql_query("SELECT password FROM usuarios WHERE email='$emailN'");
if($row = mysql_fetch_array($result))
{
if($row["password"] == $passN)
{
//90 dias dura la cookie
setcookie("email",$emailN,time()+7776000);
setcookie("pwd",$passN,time()+7776000);
?>
Ingreso exitoso, ahora sera dirigido a la pagina principal.
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>
<?
}
else
{
echo "Password incorrecto";
}
}
else
{
echo "Usuario no existente en la base de datos";
}
mysql_free_result($result);
}
else
{

}
mysql_close();

if(isset($_COOKIE["email"]) && isset($_COOKIE["pwd"]))
{
echo 'Ya estás logeado!, para salir de tu usuario haz click <a href="salir.php">aqui</a>.';
}else{
?>

<SCRIPT LANGUAGE="javascript">
setTimeout(function () {
	location.href = "ingreso.php";
}, 1500)
</SCRIPT>
<?
};

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
