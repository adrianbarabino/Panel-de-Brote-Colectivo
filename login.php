<?php
      $loginCorrecto = false;
      $esAdmin = false;
      $idUsuarioL;
      $emailUsuarioL;
      $idbandaUsuarioL;
      $nombreUsuarioL; 

if(isset($_COOKIE["email"]) && isset($_COOKIE["pwd"]))
{
$result = mysql_query("SELECT * FROM usuarios WHERE email='".$_COOKIE["email"]."' AND password='".$_COOKIE["pwd"]."'");

if($row = mysql_fetch_array($result))
{
setcookie("email",$_COOKIE["email"],time()+7776000);
setcookie("pwd",$_COOKIE["pwd"],time()+7776000);
$loginCorrecto = true;
$rango = $row["rango"];
$confirmado = $row['confirmado'];
$esConfirmado = ($confirmado==1) ? true : false;
$admin = 1;
$esAdmin = ($rango==$admin) ? true : false;
$idUsuarioL = $row["id"];
$idbandaUsuarioL = $row["idbanda"];
$facebookauth = $row["auth"];
$emailUsuarioL = $row["email"];
$nombreUsuarioL = $row["nombre"];
}
else
{
//Destruimos las cookies.
setcookie("email","x",time()-3600);
setcookie("pwd","x",time()-3600);
}
mysql_free_result($result);
}

if(!$loginCorrecto){
      echo'<SCRIPT LANGUAGE="javascript">
      alert("No estas logeado");
      location.href = "ingreso.php";
      </SCRIPT>';
};
if(!$esAdmin){
      echo'<SCRIPT LANGUAGE="javascript">
      alert("No eres administrador");
      location.href = "ingreso.php";
      </SCRIPT>';
};
if(!$esConfirmado){
      echo'<SCRIPT LANGUAGE="javascript">
      alert("No confirmaste tu email !");
      location.href = "ingreso.php";
      </SCRIPT>';
};
?>