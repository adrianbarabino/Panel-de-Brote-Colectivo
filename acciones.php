<?php
error_reporting(E_ALL);

require("conexion.php");

echo ini_get('display_errors');
ini_set('display_errors', 1);


function obtenerExtensionFichero($str)
{
				return end(explode(".", $str));
}
;

function borrar_tabla($tabla, $id, $nombre)
{
				global $conexion;
				
				$query_borrar = "delete from $tabla where id='$id'";
				
				mysql_query($query_borrar, $conexion);
				print_r($query_borrar);
				echo $nombre . " ha sido borrado exitosamente de la base de datos, seras redireccionado en unos segundos";
}
;

function crear_tabla($tabla, $campos)
{
				global $conexion;
				$campos = unserialize($campos);
				
				if ($tabla == 'lugares') {
								$nombre      = $campos['nombre'];
								$descripcion = $campos['descripcion'];
								$direccion   = $campos['direccion'];
								$url_tag     = $campos['url_tag'];
								$interior    = $campos['interior'];
								$coordenadas = $campos['coordenadas'];
								
								
								
								$create_query = "insert into $tabla (nombre,interior,direccion,descripcion,url_tag,coordenadas) VALUES ('$nombre','$interior','$direccion','$descripcion','$url_tag','$coordenadas')";
								print_r($create_query);
								
				} //$tabla == 'lugares'
				if ($tabla == 'bandas') {
								$nombre  = $campos['nombre'];
								$bio     = $campos['bio'];
								$url_tag = $campos['url_tag'];
								$social  = $campos['social'];
								
								
								$create_query = "insert into $tabla (nombre,bio,urltag,social) VALUES ('$nombre','$bio','$url_tag','$social')";
								print_r($create_query);
								
				} //$tabla == 'bandas'
				
				if ($tabla == 'programas') {
								$titulo       = $campos['titulo'];
								$contenido    = $campos['contenido'];
								$urltag       = $campos['urltag'];
								$tags         = $campos['tags'];
								$fecha        = $campos['fecha'];
								$idbanda      = json_encode($campos['idbanda']);
								$create_query = "insert into $tabla (titulo,contenido,urltag,tags,fecha, idbanda) VALUES ('$titulo','$contenido','$urltag','$tags','$fecha','$idbanda')";
								print_r($create_query);
								
				} //$tabla == 'programas'
				
				if ($tabla == 'videos') {
								$titulo    = $campos['titulo'];
								$idyoutube = $campos['idyoutube'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								$url_tag   = $campos['url_tag'];
								
								
								
								$create_query = "insert into $tabla (titulo,idyoutube,idbanda,urltag) VALUES ('$titulo','$idyoutube','$idbanda','$url_tag')";
								print_r($create_query);
								
				} //$tabla == 'videos'
				
				
				if ($tabla == 'album') {
								$titulo    = $campos['titulo'];
								$idpicassa = $campos['idpicassa'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								$url_tag   = $campos['url_tag'];
								
								
								
								$create_query = "insert into $tabla (titulo,idpicassa,idbanda,urltag) VALUES ('$titulo','$idpicassa','$idbanda','$url_tag')";
								print_r($create_query);
								
				} //$tabla == 'album'
				
				if ($tabla == 'canciones') {
								$titulo = $campos['titulo'];
								
								$idbanda = $campos['idbanda'];
								
								$url_tag  = $campos['url_tag'];
								$idgenero = $campos['idgenero'];
								
								
								
								$create_query = "insert into $tabla (titulo,idbanda,urltag,idgenero) VALUES ('$titulo','$idbanda','$url_tag', '$idgenero')";
								print_r($create_query);
								
				} //$tabla == 'canciones'

				if ($tabla == 'letras') {
								$autor = $campos['autor'];
								
								$idcancion = $campos['idcancion'];
								
								$letra  = $campos['letra'];
								
								
								
								$create_query = "insert into $tabla (autor,idcancion,letra) VALUES ('$autor','$idcancion','$letra')";
								print_r($create_query);
								
				} //$tabla == 'letras'

				if ($tabla == 'noticias') {
								$titulo    = $campos['titulo'];
								$urltag    = $campos['urltag'];
								$contenido = $campos['contenido'];
								$fecha     = $campos['fecha'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								$tags      = $campos['tags'];
								
								
								
								$create_query = "insert into $tabla (titulo,urltag,contenido,fecha,idbanda,tags) VALUES ('$titulo','$urltag','$contenido','$fecha','$idbanda','$tags')";
								print_r($create_query);
								
				} //$tabla == 'noticias'
				
				if ($tabla == 'fechas') {
								$titulo       = $campos['titulo'];
								$urltag       = $campos['urltag'];
								$contenido    = $campos['contenido'];
								$fecha_inicio = $campos['fecha_inicio'];
								$fecha_fin    = $campos['fecha_fin'];
								
								$idbanda2 = $campos['idbanda'];
								$idbanda  = json_encode($idbanda2);
								$idlugar  = $campos['idlugar'];
								
								
								$tags = $campos['tags'];
								
								
								
								$create_query = "insert into $tabla (titulo,urltag,contenido,fecha_inicio,fecha_fin,idbanda,idlugar,tags) VALUES ('$titulo','$urltag','$contenido','$fecha_inicio','$fecha_fin','$idbanda','$idlugar','$tags')";
								print_r($create_query);
								
				} //$tabla == 'fechas'
				mysql_query($create_query, $conexion);
				
				
}
;


function editar_tabla($tabla, $id, $campos)
{
				global $conexion;
				$campos = unserialize($campos);
				
				
				if ($tabla == 'noticias') {
								$titulo    = $campos['titulo'];
								$urltag    = $campos['urltag'];
								$contenido = $campos['contenido'];
								$fecha     = $campos['fecha'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								
								echo $idbanda;
								
								$tags = $campos['tags'];
								
								$update_query = "update $tabla set titulo='$titulo',urltag='$urltag',contenido='$contenido',fecha='$fecha',idbanda='$idbanda',tags='$tags' WHERE id = '$id'";
								print_r($update_query);
				} //$tabla == 'noticias'
				
				if ($tabla == 'programas') {
								$titulo    = $campos['titulo'];
								$contenido = $campos['contenido'];
								$urltag    = $campos['urltag'];
								$fecha     = $campos['fecha'];
								$tags      = $campos['tags'];
								$idbanda   = json_encode($campos['idbanda']);
								
								$update_query = "update $tabla set titulo='$titulo',urltag='$urltag',contenido='$contenido',tags='$tags',fecha='$fecha', idbanda='$idbanda' WHERE id = '$id'";
								
				} //$tabla == 'programas'
				
				
				if ($tabla == 'fechas') {
								$titulo       = $campos['titulo'];
								$urltag       = $campos['urltag'];
								$contenido    = $campos['contenido'];
								$fecha_inicio = $campos['fecha_inicio'];
								$fecha_fin    = $campos['fecha_fin'];
								
								$idbanda2 = $campos['idbanda'];
								$idbanda  = json_encode($idbanda2);
								$idlugar  = $campos['idlugar'];
								
								$tags = $campos['tags'];
								
								$update_query = "update $tabla set titulo='$titulo',urltag='$urltag',contenido='$contenido',fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin',idbanda='$idbanda',idlugar='$idlugar',tags='$tags' WHERE id = '$id'";
								
				} //$tabla == 'fechas'
				
				if ($tabla == 'lugares') {
								$nombre      = $campos['nombre'];
								$descripcion = $campos['descripcion'];
								$direccion   = $campos['direccion'];
								$url_tag     = $campos['url_tag'];
								$coordenadas = $campos['coordenadas'];
								$interior    = $campos['interior'];
								
								$update_query = "update $tabla set nombre='$nombre',interior='$interior', direccion='$direccion',descripcion='$descripcion',url_tag='$url_tag',coordenadas='$coordenadas' WHERE id = '$id'";
								
				} //$tabla == 'lugares'
				
				if ($tabla == 'bandas') {
								$nombre  = $campos['nombre'];
								$bio     = $campos['bio'];
								$url_tag = $campos['url_tag'];
								$social  = $campos['social'];
								
								$update_query = "update $tabla set nombre='$nombre',bio='$bio',urltag='$url_tag',social='$social' WHERE id = '$id'";
								
				} //$tabla == 'bandas'
				
				
				if ($tabla == 'videos') {
								$titulo    = $campos['titulo'];
								$idyoutube = $campos['idyoutube'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								$url_tag   = $campos['url_tag'];
								
								$update_query = "update $tabla set titulo='$titulo',idyoutube='$idyoutube',idbanda='$idbanda',urltag='$url_tag' WHERE id = '$id'";
								print_r($update_query);
				} //$tabla == 'videos'
				
				if ($tabla == 'album') {
								$titulo    = $campos['titulo'];
								$idpicassa = $campos['idpicassa'];
								$idbanda2  = $campos['idbanda'];
								$idbanda   = json_encode($idbanda2);
								$url_tag   = $campos['url_tag'];
								
								$update_query = "update $tabla set titulo='$titulo',idpicassa='$idpicassa',idbanda='$idbanda',urltag='$url_tag' WHERE id = '$id'";
								print_r($update_query);
				} //$tabla == 'album'
				
				
				if ($tabla == 'canciones') {
								$titulo   = $campos['titulo'];
								$idbanda  = $campos['idbanda'];
								$url_tag  = $campos['url_tag'];
								$idgenero = $campos['idgenero'];
								
								$update_query = "update $tabla set titulo='$titulo',idbanda='$idbanda',urltag='$url_tag',idgenero='$idgenero' WHERE id = '$id'";
								
				} //$tabla == 'canciones'

				if ($tabla == 'letras') {
								$autor   = $campos['autor'];
								$idcancion  = $campos['idcancion'];
								$letra  = $campos['letra'];
								
								$update_query = "update $tabla set autor='$autor',idcancion='$idcancion',letra='$letra' WHERE id = '$id'";
								
				} //$tabla == 'letras'
				mysql_query($update_query, $conexion);
				
				
				
				
}

if ($_POST['accion'] == 'borrar') {
				$id = $_POST['id'];
				if ($_POST['titulo']) {
								$nombre = $_POST['titulo'];
				} //$_POST['titulo']
				elseif ($_POST['nombre']) {
								$nombre = utf8_decode($_POST['nombre']);
				} //$_POST['nombre']
				;
				$tabla = $_POST['tabla'];
				borrar_tabla($tabla, $id, $nombre);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<meta http-equiv="Refresh" content="1;url=index.php?tabla=<?php
				echo $tabla;
?>">
</head>
<?php
} //$_POST['accion'] == 'borrar'
;
echo "no lo tomo";
$accion = $_POST['accion'];
echo $accion;


if ($_POST['accion'] == 'editar') {
				$tabla = $_POST['tabla'];
				if ($tabla == "noticias") {
								$id        = $_POST['id'];
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$contenido = str_ireplace('<!--?php', '<?php', $contenido);
								$contenido = str_ireplace('?-->', '?>', $contenido);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$fecha     = $_POST['fecha'];
								$a         = strptime($fecha, '%d/%m/%Y %H:%M');
								$fecha     = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								
								print_r($fecha);
								
								if ($_FILES["file"]["name"]) {
												$cad      = $urltag;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/entradas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												include("resize-class.php");
												
												// *** 1) Initialise / load image
												$resizeObj = new resize($archivo);
												print_r($archivo);
												print_r($resizeObj);
												
												// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
												
												// *** 3) Save image
												$resizeObj->saveImage($archivo, 100);
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								;
								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"fecha" => $fecha
								);
				} //$tabla == "noticias"
				;
				if ($tabla == "programas") {
								$id        = $_POST['id'];
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$contenido = str_ireplace('<!--?php', '<?php', $contenido);
								$contenido = str_ireplace('?-->', '?>', $contenido);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$fecha     = $_POST['fecha'];
								$a         = strptime($fecha, '%d/%m/%Y %H:%M');
								$fecha     = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								
								print_r($fecha);
								
								if ($_FILES["file"]["name"]) {
												$cad      = $urltag;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/programasaudios'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "mp3";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.mp3';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								;
								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"fecha" => $fecha
								);
				} //$tabla == "programas"
				;
				
				
				if ($tabla == "fechas") {
								$id        = $_POST['id'];
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$idlugar   = $_POST['idlugar'];
								
								$fecha_inicio = $_POST['fecha_inicio'];
								$a            = strptime($fecha_inicio, '%d/%m/%Y %H:%M');
								$fecha_inicio = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								
								$fecha_inicio = date('Y-m-d H:i:s', $fecha_inicio);
								
								$fecha_fin = $_POST['fecha_fin'];
								$b         = strptime($fecha_fin, '%d/%m/%Y %H:%M');
								$fecha_fin = mktime($b['tm_hour'], $b['tm_min'], 0, $b['tm_mon'] + 1, $b['tm_mday'], $b['tm_year'] + 1900);
								$fecha_fin = date('Y-m-d H:i:s', $fecha_fin);
								
								
								if ($_FILES["file"]["name"]) {
												$cad      = $urltag;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/fechas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;

												include('WideImage/WideImage.php');
												$image = WideImage::load($archivo);
												$marca = WideImage::load('marca.jpg');
												$imagen_editada = $image->resize('600');
												$negro = $imagen_editada->allocateColor(0,0,0);
												$imagen_editada = $imagen_editada->resizeCanvas('100%', '100%+60', '0', '0', $negro);
												$resultado = $imagen_editada->merge($marca, '0', 'bottom', '100');
												$resultado->saveToFile($archivo, 80);

												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								else {
												$query_a_db = "SELECT * FROM fechas WHERE id=$id";
												
												
												$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
												while ($lugares = mysql_fetch_array($ejecuto_query)) {
																echo $lugares['urltag'];
																if ($urltag == $lugares['urltag']) {
																} //$urltag == $lugares['urltag']
																else {
																				echo "<br> <h1>cambiando URL de la imagen por el URLTAG</h1>";
																				
																				$direccion = "/home/brotecol/public_html/fechas";
																				$viejo     = $direccion . '/' . $lugares["urltag"] . '.jpg';
																				$nuevo     = $direccion . '/' . $urltag . '.jpg';
																				rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
																				
																				
																}
																;
												} //$lugares = mysql_fetch_array($ejecuto_query)
												;
								}
								;

/*

$access_token = 'AAAFhjULtqrwBAHQvK0jzV0CQJ0Dk9skxmwfdLR7BL2HKxiuFMG4w8wwjom6r1KKJeWCHWey63qYXrmmD9E1UxBIETrZBu5uZCflvdKuEMQZA7CXroWS';

$params = array(
        'access_token' => $access_token
);
 

$fanpage = '409971599018812';
 

$accounts = $facebook->api('/adrianbarabino/accounts', 'GET', $params);
$data = $accounts['data'];
foreach($data as $account) {
        if( $account['id'] == $fanpage || $account['name'] == $fanpage )
                $fanpage_token = $account['access_token'];
}

$fanpage_albums = $facebook->api($fanpage . '/albums', 'GET', $params);
$albums = $fanpage_albums['data'];
$sorted = array();
foreach($albums as $album) {
       
               
        $sorted[] = $album;
        }
        
        

$album_id = $sorted[0]['id']; // Get the first one. Shouldn't be empty!
 $rutaimagen = "/home/brotecol/public_html/fechas/".$urltag.".jpg";

$args = array(
        'message' => utf8_encode($contenido),
        'image' => $rutaimagen,
        'aid' => $album_id,
        'no_story' => 1,
        'access_token' => $fanpage_token 
);
 
$photo = $facebook->api($album_id . '/photos', 'post', $args);
if( is_array( $photo ) && ! empty( $photo['id'] ) )
        echo 'Photo uploaded. Check it on Graph API Explorer. ID: ' . $photo['id'];





$facebook->setFileUploadSupport(true);
  */


								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"idlugar" => $idlugar,
												"fecha_inicio" => $fecha_inicio,
												"fecha_fin" => $fecha_fin
												
								);
				} //$tabla == "fechas"
				;
				if ($tabla == "lugares") {
								$id          = $_POST['id'];
								$latitud     = $_POST['lat'];
								$longitud    = $_POST['lng'];
								$coordenadas = $latitud . "," . $longitud;
								$nombre      = utf8_decode($_POST['nombre']);
								$direccion   = utf8_decode($_POST['direccion']);
								$descripcion = utf8_decode($_POST['descripcion']);
								$url_tag     = strtolower($_POST['url_tag']);
								$interior    = $_POST['interior'];
								$campos      = array(
												"nombre" => $nombre,
												"coordenadas" => $coordenadas,
												"direccion" => $direccion,
												"descripcion" => $descripcion,
												"url_tag" => $url_tag,
												"interior" => $interior
								);
				} //$tabla == "lugares"
				;
				
				
				if ($tabla == "bandas") {
								$id      = $_POST['id'];
								$nombre  = utf8_decode($_POST['nombre']);
								$bio     = utf8_decode($_POST['bio']);
								$url_tag = strtolower($_POST['url_tag']);
								
								if ($_FILES["file"]["name"]) {
												$cad      = $url_tag;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/contenido/imagenes/bandas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												include("resize-class.php");
												
												// *** 1) Initialise / load image
												$resizeObj = new resize($archivo);
												print_r($archivo);
												print_r($resizeObj);
												
												// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
												
												// *** 3) Save image
												$resizeObj->saveImage($archivo, 100);
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								else {
												$query_a_db = "SELECT * FROM bandas WHERE id=$id";
												
												
												$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
												while ($lugares = mysql_fetch_array($ejecuto_query)) {
																echo $lugares['urltag'];
																if ($url_tag == $lugares['urltag']) {
																} //$url_tag == $lugares['urltag']
																else {
																				echo "<br> <h1>cambiando URL de la imagen por el URLTAG</h1>";
																				
																				$direccion = "/home/brotecol/public_html/contenido/imagenes/bandas";
																				$viejo     = $direccion . '/' . $lugares["urltag"] . '.jpg';
																				$nuevo     = $direccion . '/' . $url_tag . '.jpg';
																				rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
																				
																				
																}
																
												} //$lugares = mysql_fetch_array($ejecuto_query)
								}
								$facebook    = $_POST['facebook'];
								$twitter     = $_POST['twitter'];
								$sitioweb    = $_POST['sitioweb'];
								$youtube     = $_POST['youtube'];
								$vimeo       = $_POST['vimeo'];
								$grooveshark = $_POST['grooveshark'];
								$soundcloud  = $_POST['soundcloud'];
								$campos3     = array(
												"facebook" => $facebook,
												"twitter" => $twitter,
												"sitioweb" => $sitioweb,
												"soundcloud" => $soundcloud,
												"youtube" => $youtube,
												"grooveshark" => $grooveshark,
												"vimeo" => $vimeo
								);
								
								
								
								$social = json_encode($campos3);
								echo $campos2;
								$campos = array(
												"nombre" => $nombre,
												"bio" => $bio,
												"url_tag" => $url_tag,
												"social" => $social
								);
								
				} //$tabla == "bandas"
				;
				
				if ($tabla == "videos") {
								$id        = $_POST['id'];
								$titulo    = $_POST['titulo'];
								$idyoutube = $_POST['idyoutube'];
								$idbanda   = $_POST['idbanda'];
								
								$url_tag = strtolower($_POST['url_tag']);
								
								$query_a_db = "SELECT * FROM videos WHERE id=$id";
								
								
								$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
								while ($lugares = mysql_fetch_array($ejecuto_query)) {
												echo $lugares['urltag'];
												if ($idyoutube == $lugares['idyoutube']) {
												} //$idyoutube == $lugares['idyoutube']
												else {
																echo "<br> <h1>cambiando VIDEO/h1>";
																
																$orden = system("/usr/bin/lynx 'http://www.brotecolectivo.com/cp/videos.php?idyoutube=" . $idyoutube . "&idbanda=" . $idbanda . "&id=" . $id . "'");
																
																echo $orden;
																
																print_r($orden);
																
																
																
												}
												
								} //$lugares = mysql_fetch_array($ejecuto_query)
								$campos = array(
												"titulo" => $titulo,
												"idyoutube" => $idyoutube,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag
								);
								
				} //$tabla == "videos"
				;
				
				if ($tabla == "album") {
								$id        = $_POST['id'];
								$titulo    = $_POST['titulo'];
								$idpicassa = $_POST['idpicassa'];
								$idbanda   = $_POST['idbanda'];
								
								$url_tag = strtolower($_POST['url_tag']);
								
								
								
								$campos = array(
												"titulo" => $titulo,
												"idpicassa" => $idpicassa,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag
								);
								
				} //$tabla == "album"
				;
				
				if ($tabla == "canciones") {
								$id       = $_POST['id'];
								$titulo   = $_POST['titulo'];
								$idbanda  = $_POST['idbanda'];
								$idgenero = $_POST['idgenero'];
								$url_tag  = strtolower($_POST['url_tag']);
								print_r("La banda ID es: " . $idbanda);
								if ($_FILES["file"]["name"]) {
												$cad      = $id . "-" . $idbanda;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/canciones'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "mp3";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.mp3';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								
								
								$campos = array(
												"titulo" => $titulo,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag,
												"idgenero" => $idgenero
								);
								
				} //$tabla == "canciones"
				;
				if ($tabla == "letras") {
								$id       = $_POST['id'];
								$autor   = utf8_decode($_POST['autor']);
								$idcancion  = $_POST['idcancion'];
								$letra = utf8_decode($_POST['letra']);
								
								
								
								$campos = array(
												"autor" => $autor,
												"idcancion" => $idcancion,
												"letra" => $letra,
								);
								
				} //$tabla == "letras"
				;
				$campos = serialize($campos);
				editar_tabla($tabla, $id, $campos);
				
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<meta http-equiv="Refresh" content="1;url=index.php?tabla=<?php
				echo $tabla;
?>&accion=editar&id=<?php
				echo $id;
?>">
</head>
<?php
} //$_POST['accion'] == 'editar'


if ($_POST['accion'] == 'crear') {
				$tabla = $_POST['tabla'];
				
				
				if ($tabla == "programas") {
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$contenido = str_ireplace('<!--?php', '<?php', $contenido);
								$contenido = str_ireplace('?-->', '?>', $contenido);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$fecha     = $_POST['fecha'];
								$a         = strptime($fecha, '%d/%m/%Y %H:%M');
								$fecha     = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								
								
								
								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"fecha" => $fecha
								);
				} //$tabla == "programas"
				;
				
				
				if ($tabla == "noticias") {
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$contenido = str_ireplace('<!--?php', '<?php', $contenido);
								$contenido = str_ireplace('?-->', '?>', $contenido);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$fecha     = $_POST['fecha'];
								$a         = strptime($fecha, '%d/%m/%Y %H:%M');
								$fecha     = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								
								if ($_FILES["file"]["name"]) {
												$cad      = $urltag;
												// Fin de la creacion de la cadena aletoria 
												$tamano   = $_FILES['file']['size']; // Leemos el tamaño del fichero 
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/entradas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												include("resize-class.php");
												
												// *** 1) Initialise / load image
												$resizeObj = new resize($archivo);
												print_r($archivo);
												print_r($resizeObj);
												
												// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
												
												// *** 3) Save image
												$resizeObj->saveImage($archivo, 100);
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
												
												$carpeta  = $destino . '/' . $cad . '.' . $tipo;
												$carpeta2 = '/entradas/' . $cad . '.' . $tipo;
												
												print_r($carpeta);
												print_r($_FILES['file']['tmp_name']);
								} //$_FILES["file"]["name"]
								;
								
								
								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"fecha" => $fecha
								);
				} //$tabla == "noticias"
				;
				
				if ($tabla == "fechas") {
								echo "hola";
								$titulo    = $_POST['titulo'];
								$tags      = $_POST['tags'];
								$contenido = utf8_decode($_POST['contenido']);
								$urltag    = strtolower($_POST['urltag']);
								$idbanda   = $_POST['idbanda'];
								$idlugar   = $_POST['idlugar'];
								
								$fecha_inicio = $_POST['fecha_inicio'];
								$a            = strptime($fecha_inicio, '%d/%m/%Y %H:%M');
								$fecha_inicio = mktime($a['tm_hour'], $a['tm_min'], 0, $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
								$fecha_inicio = date('Y-m-d H:i:s', $fecha_inicio);
								
								$fecha_fin = $_POST['fecha_fin'];
								$b         = strptime($fecha_fin, '%d/%m/%Y %H:%M');
								$fecha_fin = mktime($b['tm_hour'], $b['tm_min'], 0, $b['tm_mon'] + 1, $b['tm_mday'], $b['tm_year'] + 1900);
								$fecha_fin = date('Y-m-d H:i:s', $fecha_fin);
								
								if ($_FILES["file"]["name"]) {
												echo $_FILES["file"]["name"];
												$cad      = $urltag;
												// Fin de la creacion de la cadena aletoria 
												$tamano   = $_FILES['file']['size']; // Leemos el tamaño del fichero 
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/fechas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												include('WideImage/WideImage.php');
												$image = WideImage::load($archivo);
												$marca = WideImage::load('marca.jpg');
												$imagen_editada = $image->resize('600');
												$negro = $imagen_editada->allocateColor(0,0,0);
												$imagen_editada = $imagen_editada->resizeCanvas('100%', '100%+60', '0', '0', $negro);
												$resultado = $imagen_editada->merge($marca, '0', 'bottom', '100');
												$resultado->saveToFile($archivo, 80);
												echo $archivo;
												
												// *** 1) Initialise / load image
												print_r($archivo);
												
												// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
												
												
												// *** 3) Save image
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
												
												$carpeta  = $destino . '/' . $cad . '.' . $tipo;
												$carpeta2 = '/fechas/' . $cad . '.' . $tipo;
												
												print_r($carpeta);
												echo $carpeta;
												echo $carpeta2;
												echo $_FILES['file']['tmp_name'];
												print_r($_FILES['file']['tmp_name']);
								} //$_FILES["file"]["name"]
								;


								
								
								$campos = array(
												"titulo" => $titulo,
												"tags" => $tags,
												"contenido" => $contenido,
												"urltag" => $urltag,
												"idbanda" => $idbanda,
												"idlugar" => $idlugar,
												"fecha_inicio" => $fecha_inicio,
												"fecha_fin" => $fecha_fin
								);
				} //$tabla == "fechas"
				;
				
				if ($tabla == "lugares") {
								$latitud     = $_POST['lat'];
								$longitud    = $_POST['lng'];
								$coordenadas = $latitud . "," . $longitud;
								$nombre      = utf8_decode($_POST['nombre']);
								$direccion   = utf8_decode($_POST['direccion']);
								$descripcion = utf8_decode($_POST['descripcion']);
								$url_tag     = strtolower($_POST['url_tag']);
								$interior    = $_POST['interior'];
								$campos      = array(
												"nombre" => $nombre,
												"coordenadas" => $coordenadas,
												"direccion" => $direccion,
												"descripcion" => $descripcion,
												"url_tag" => $url_tag,
												"interior" => $interior
								);
				} //$tabla == "lugares"
				;
				
				
				if ($tabla == "bandas") {
								$nombre  = utf8_decode($_POST['nombre']);
								$bio     = utf8_decode($_POST['bio']);
								$url_tag = strtolower($_POST['url_tag']);
								
								
								$facebook    = $_POST['facebook'];
								$twitter     = $_POST['twitter'];
								$sitioweb    = $_POST['sitioweb'];
								$youtube     = $_POST['youtube'];
								$vimeo       = $_POST['vimeo'];
								$grooveshark = $_POST['grooveshark'];
								$soundcloud  = $_POST['soundcloud'];
								$campos3     = array(
												"facebook" => $facebook,
												"twitter" => $twitter,
												"sitioweb" => $sitioweb,
												"soundcloud" => $soundcloud,
												"youtube" => $youtube,
												"grooveshark" => $grooveshark,
												"vimeo" => $vimeo
								);
								
								
								$social = json_encode($campos3);
								if ($_FILES["file"]["name"]) {
												$cad      = $url_tag;
												$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
												$destino2 = '/home/brotecol/public_html/contenido/imagenes/bandas'; // Carpeta donde se guardata 
												
												$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
												$tipo = "jpg";
												move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
												$archivo = $cad . '.' . $tipo;
												include("resize-class.php");
												
												// *** 1) Initialise / load image
												$resizeObj = new resize($archivo);
												print_r($archivo);
												print_r($resizeObj);
												
												// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
												
												
												// *** 3) Save image
												$resizeObj->saveImage($archivo, 100);
												$viejo = $destino . '/' . $cad . '.' . $tipo;
												$nuevo = $destino2 . '/' . $cad . '.jpg';
												rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
								} //$_FILES["file"]["name"]
								;
								
								$campos = array(
												"nombre" => $nombre,
												"bio" => $bio,
												"url_tag" => $url_tag,
												"social" => $social
								);
				} //$tabla == "bandas"
				;
				
				if ($tabla == "canciones") {
								$titulo  = $_POST['titulo'];
								$idbanda = $_POST['idbanda'];
								
								$url_tag  = strtolower($_POST['url_tag']);
								$idgenero = $_POST['idgenero'];
								
								
								$campos = array(
												"titulo" => $titulo,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag,
												"idgenero" => $idgenero
								);
				} //$tabla == "canciones"
				;

				if ($tabla == "letras") {
								$autor   = utf8_decode($_POST['autor']);
								$idcancion  = $_POST['idcancion'];
								$letra = utf8_decode($_POST['letra']);
								
								
								
								$campos = array(
												"autor" => $autor,
												"idcancion" => $idcancion,
												"letra" => $letra,
								);
				} //$tabla == "letras"
				;
				

								
								
				
				if ($tabla == "videos") {
								$titulo    = $_POST['titulo'];
								$idyoutube = $_POST['idyoutube'];
								$idbanda   = $_POST['idbanda'];
								
								$url_tag = strtolower($_POST['url_tag']);
								
								
								$campos = array(
												"titulo" => $titulo,
												"idyoutube" => $idyoutube,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag
								);
				} //$tabla == "videos"
				;
				
				
				if ($tabla == "album") {
								$titulo    = $_POST['titulo'];
								$idpicassa = $_POST['idpicassa'];
								$idbanda   = $_POST['idbanda'];
								
								$url_tag = strtolower($_POST['url_tag']);
								
								
								$campos = array(
												"titulo" => $titulo,
												"idpicassa" => $idpicassa,
												"idbanda" => $idbanda,
												"url_tag" => $url_tag
								);
				} //$tabla == "album"
				;
				
				
				if ($campos) {
								$campos = serialize($campos);
								crear_tabla($tabla, $campos);
								$id = mysql_insert_id();
								
								
								if ($tabla == "canciones") {
												$fichero_actual = "" . $id . "-" . $idbanda . ".mp3";
												$fichero_wav    = "" . $id . "-" . $idbanda . ".wav";
												$fichero_ogg    = "" . $id . "-" . $idbanda . ".ogg";
												
												$orden = system("cd /home/brotecol/public_html/canciones/; ffmpeg -i " . $fichero_actual . " -ab 6400 " . $fichero_ogg);
												echo $orden;
												print_r($orden);
								} //$tabla == "canciones"
								if ($tabla == "programas") {
												$fichero_actual = "" . $urltag . ".mp3";
												$fichero_wav    = "" . $urltag . ".wav";
												$fichero_ogg    = "" . $urltag . ".ogg";
												
												$orden = system("cd /home/brotecol/public_html/programasaudios/; ffmpeg -i " . $fichero_actual . " -ab 6400 " . $fichero_ogg);
												echo $orden;
												print_r($orden);
								} //$tabla == "programas"
								if ($tabla == "videos") {
												$orden = system("/usr/bin/lynx 'http://www.brotecolectivo.com/cp/videos.php?idyoutube=" . $idyoutube . "&idbanda=" . $idbanda . "&id=" . $id . "'");
												
												echo $orden;
												
												print_r($orden);
								} //$tabla == "videos"
								;
								
								if ($tabla == "canciones") {
												if ($_FILES["file"]["name"]) {
																$id       = mysql_insert_id();
																$cad      = $id . "-" . $idbanda;
																$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
																$destino2 = '/home/brotecol/public_html/canciones'; // Carpeta donde se guardata 
																
																$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
																$tipo = "mp3";
																move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
																$archivo = $cad . '.' . $tipo;
																
																$viejo = $destino . '/' . $cad . '.' . $tipo;
																$nuevo = $destino2 . '/' . $cad . '.mp3';
																rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
																print_r($viejo);
																print_r($nuevo);
												} //$_FILES["file"]["name"]
								} //$tabla == "canciones"
								if ($tabla == "programas") {
												if ($_FILES["file"]["name"]) {
																$id       = mysql_insert_id();
																$cad      = $urltag;
																$destino  = '/home/brotecol/public_html/cp'; // Carpeta donde se guardata 
																$destino2 = '/home/brotecol/public_html/programasaudios'; // Carpeta donde se guardata 
																
																$sep  = obtenerExtensionFichero($_FILES["file"]["name"]); // Separamos image/ 
																$tipo = "mp3";
																move_uploaded_file($_FILES['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo); // Subimos el archivo 
																chmod($destino . '/' . $cad . '.' . $tipo, 0777);
																$archivo = $cad . '.' . $tipo;
																
																$viejo = $destino . '/' . $cad . '.' . $tipo;
																$nuevo = $destino2 . '/' . $cad . '.mp3';
																rename($viejo, $nuevo) or die("No se puede renombrar $viejo a $nuevo");
																print_r($viejo);
																print_r($nuevo);
												} //$_FILES["file"]["name"]
								} //$tabla == "programas"
								echo $id;
								
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<meta http-equiv="Refresh" content="1;url=index.php?tabla=<?php
								echo $tabla;
?>&accion=editar&id=<?php
								echo $id;
?>">
</head>
<?php
				} //$campos
} //$_POST['accion'] == 'crear'
?>