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
echo '<FORM ACTION="ingresar.php" METHOD="post">
      Email : <INPUT TYPE="text" NAME="email" SIZE=20 >
      <BR>
      Password: <INPUT TYPE="password" NAME="password"
      SIZE=28 MAXLENGTH=20>
      <BR>
      <INPUT TYPE="submit" CLASS="boton" VALUE="Ingresar">
      </FORM>';
};

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
