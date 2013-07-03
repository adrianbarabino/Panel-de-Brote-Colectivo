<?php
require("conexion.php");

$tabla = $_POST['tabla'];

if($tabla == "newsletter"){
$titulo =  utf8_decode($_POST['titulo']);
$tags =  utf8_decode($_POST['tags']);
$contenido =  utf8_decode($_POST['contenido']);
$timestamp = date(U);
$contenido = str_ireplace('<!--?php', '<?php', $contenido);
$contenido = str_ireplace('?-->', '?>', $contenido);
$urltag = strtolower($_POST['urltag']);
	$resp = mysql_query ("SELECT * FROM usuarios",$conexion);
while ($row = mysql_fetch_array ($resp)) {
$nombre = $row ["nombre"];
$mail = $row ["email"];
$mensaje = $contenido;
$men1 = "Hola ".$nombre.", que tal? \n  ".$mensaje."";
$men = $men1;
$men2 = $men1."\n Si no ves este newsletter correctamente, hace <a href='http://www.brotecolectivo.com/newsletter/".$urltag."/'>clic aqui</a>.";
$formato          = "html"; 
$nombre_origen    = "Brote Colectivo"; 
$email_origen     = "info@brotecolectivo.com"; 
$email_copia      = "info@brotecolectivo.com"; 
$email_ocultos    = "info@brotecolectivo.com"; 
$email_destino    = $mail; 

//*****************************************************************// 
$headers  = "From: $nombre_origen <$email_origen> \r\n"; 
$headers .= "Return-Path: <$email_origen> \r\n"; 
$headers .= "Repl-To: $email_origen \r\n"; 
$headers .= "Cc: $email_copia \r\n"; 
$headers .= "Bcc: $email_ocultos \r\n"; 
$headers .= "X-Sender: $email_origen \r\n"; 
$headers .= "X-Mailer: [Habla software de noticias v.1.0] \r\n"; 
$headers .= "X-Priority: 3 \r\n"; 
$headers .= "MIME-Version: 1.0 \r\n"; 
$headers .= "Content-Transfer-Encoding: 7bit \r\n"; 
$headers .= "Disposition-Notification-To: \"$nombre_origen\" <$email_origen> \r\n"; 
//*****************************************************************// 

if($formato == "html") 
 { $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";  } 
   else 
    { $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";  } 

if (@mail($email_destino, $titulo, $men, $headers))  
    { echo "";  }  
     else  
    {  echo ""; } 

}

$query_news = "INSERT INTO  `polize_brote`.`newsletter` (
`id` ,
`urltag` ,
`titulo` ,
`contenido` ,
`fecha`
)
VALUES (
NULL ,  '".$urltag."',  '".$titulo."',  '".$contenido."',  '".$timestamp."'
);";

mysql_query($query_news);
}


?>
