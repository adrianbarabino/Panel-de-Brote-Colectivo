<?php
require('conexion.php');
include('login.php');

function ConvertirAUnix($contenido){

	$a = strptime($contenido, '%Y-%m-%d H:i:s');
$timestamp = mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);

return $timestamp;
};

$tabla = $_GET['tabla'];
$accion = $_GET['accion'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"  /> 
    <meta charset="utf-8">


<title>Brote Colectivo - Administracion</title>

<!-- Load jQuery -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script>
function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Load TinyMCE -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />

<script src="./tinymce/js/tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({
        	selector:'textarea',
		    theme: "modern",
		    width: 670,
		    height: 400,
		    plugins: [
		         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		         "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   content_css: "css/content.css",
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
		        {title: 'Bold text', inline: 'b'},
		        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		        {title: 'Example 1', inline: 'span', classes: 'example1'},
		        {title: 'Example 2', inline: 'span', classes: 'example2'},
		        {title: 'Table styles'},
		        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		    ]
 }); 
</script>

<script>
	$(document).on("ready", function () {
		
		$(".boton_facebook").on("click", function (e) {
			e.preventDefault();
			var id = $(this).attr("href").split("=")[2];
			$.post( "facebook.php", { tipo: "fecha", id: id })
			  .done(function( data ) {
			  	console.log(data);
			    alert( "Resultado: " + data );
			  });
		})
	})
</script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,300italic' rel='stylesheet' type='text/css'>

<style>
.glines{
background: gray;
width: 800px;
text-align: center;
border-radius: 10px;
padding: 5px;
color: white;
text-shadow: 0px 0px 20px #F50;
}
h1{
	color:#fff;
}
#menu{
	width: 500px;
height: 50px;
list-style: none;
list-style-type: none;
}
#menu ul{
    list-style:none; /* Eliminamos los bullets */
    margin:0px; /* Quitamos los margenes */
    padding:0px; /* Quitamos el padding */
}
#menu ul li {
    float:left; /* Hacemos que el menu se muestre horizontal */
    padding-left:10px;
    padding-right:10px;
    border-right:1px solid #FFFFFF;
}
#menu ul li a{
    text-decoration:none;
    color:#CCCCCC;
    font-weight:bold;
}
#menu ul li a:hover{
    color:#FFFFFF;
}
</style>
<?php 
if($tabla == "noticias"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$tags = "Tags";
	$contenido = "Contenido...";
	$urltag = "URL tag";
	$idbanda = "[0]";
	$fecha = "DD/MM/AAAA HH:MM";
	
	}else{
		$idnoticia = $_GET['id'];
		$query_a_db = "SELECT * FROM noticias
   
	
	 WHERE id = '".$idnoticia."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($noticia=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $noticia['titulo'];
	$tags = $noticia['tags'];
	$urltag = $noticia['urltag'];
	$idbanda = $noticia['idbanda'];
	$fecha = $noticia['fecha'];
	$contenido = $noticia['contenido'];
};
	};
};
if($tabla == "programas"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$tags = "Tags";
	$contenido = "Contenido...";
	$urltag = "URL tag";
	$idbanda = "ID Banda";
	$fecha = "DD/MM/AAAA HH:MM";
	
	}else{
		$idprograma = $_GET['id'];
		$query_a_db = "SELECT * FROM programas
   
	
	 WHERE id = '".$idprograma."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($noticia=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $noticia['titulo'];
	$tags = $noticia['tags'];
	$urltag = $noticia['urltag'];
	$idbanda = $noticia['idbanda'];
	$fecha = $noticia['fecha'];
	$contenido = $noticia['contenido'];
};
	};
};
if($tabla == "bandas"){
	
	if($accion == "crear"){
			$nombre = "Nombre";
	$bio = "Bio";
	
	$url_tag = "URL tag";
	$facebook = "Facebook";
 	$vimeo = "Vimeo";
	$grooveshark = "GrooveShark";
	$youtube = "Youtube";

	$twitter = "Twitter";
	$sitioweb = "Sitio Web";
		$soundcloud = "SoundCloud";

	}else{
		$idbandas = $_GET['id'];
		$query_a_db = "SELECT * FROM bandas
   
	
	 WHERE id = '".$idbandas."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
	
	$nombre = $bandas['nombre'];
	$bio = $bandas['bio'];
	$url_tag = $bandas['urltag'];
	$social = $bandas['social'];
	$social2 = json_decode($bandas['social']);
    $facebook = $social2->{'facebook'};
    $twitter = $social2->{'twitter'};
    $youtube = $social2->{'youtube'};
    $vimeo = $social2->{'vimeo'};
    $grooveshark = $social2->{'grooveshark'};
    $sitioweb = $social2->{'sitioweb'};
    $soundcloud = $social2->{'soundcloud'};


};
	};
};
if($tabla == "videos"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$idyoutube = "ID Youtube";
	$idbanda = "ID Banda";
	$url_tag = "URL tag";
	
	}else{
		$idvideo = $_GET['id'];
		$query_a_db = "SELECT * FROM videos
   
	
	 WHERE id = '".$idvideo."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($videos=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $videos['titulo'];
	$idyoutube = $videos['idyoutube'];
	$idbanda = $videos['idbanda'];
	$url_tag = $videos['urltag'];
};
	};
};


if($tabla == "album"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$idpicassa = "ID Picassa";
	$idbanda = "ID Banda";
	$url_tag = "URL tag";
	
	}else{
		$idalbum = $_GET['id'];
		$query_a_db = "SELECT * FROM album
   
	
	 WHERE id = '".$idalbum."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($album=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $album['titulo'];
	$idpicassa = $album['idpicassa'];
	$idbanda = $album['idbanda'];
	$url_tag = $album['urltag'];
};
	};
};

if($tabla == "canciones"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$idbanda = "ID Banda";
	$url_tag = "URL tag";
	$idgenero = "ID Genero";
	
	}else{
		$idvideo = $_GET['id'];
		$query_a_db = "SELECT * FROM canciones
   
	
	 WHERE id = '".$idvideo."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($canciones=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $canciones['titulo'];
	$idbanda = $canciones['idbanda'];
	$url_tag = $canciones['urltag'];
	$idgenero = $canciones['idgenero'];
};
	};
};

if($tabla == "letras"){
	
	if($accion == "crear"){
	$idcancion = "ID Cancion";
	$letra = "Letra";
	$autor = "Autor";
	
	}else{
		$idvideo = $_GET['id'];
		$query_a_db = "SELECT * FROM letras
   
	
	 WHERE id = '".$idvideo."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($letras=mysql_fetch_array($ejecuto_query)){
	
	$autor = $letras['autor'];
	$idcancion = $letras['idcancion'];
	$letra = $letras['letra'];
};
	};
};

if($tabla == "fechas"){
	
	if($accion == "crear"){
			$titulo = "Titulo";
	$tags = "Tags";
	$contenido = "Contenido...";
	$urltag = "URL tag";
	$idlugar = "ID Lugar";
	$idbanda = "[0]";
	$fecha_inicio = "DD/MM/AAAA HH:MM";
	$fecha_fin = "DD/MM/AAAA HH:MM";

	
	}else{
		$idfecha = $_GET['id'];
		$query_a_db = "SELECT * FROM fechas
   
	
	 WHERE id = '".$idfecha."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($fecha=mysql_fetch_array($ejecuto_query)){
	
	$titulo = $fecha['titulo'];
	$tags = $fecha['tags'];
	$urltag = $fecha['urltag'];
	$idlugar = $fecha['idlugar'];
	$idbanda = $fecha['idbanda'];
	$fecha_inicio = date('U', strtotime($fecha['fecha_inicio']));
	$fecha_fin = date('U', strtotime($fecha['fecha_fin']));
	$contenido = $fecha['contenido'];
};
	};
};

	if($tabla == "lugares"){

	
	if($accion == "crear"){
    
	$nombre = "Nombre";
	$direccion = "Dirección";
	$descripcion = "Descripción";
	$latitud = "Latitud";
	$longitud = "Longitud";
	$interior = "Interior";
	$url_tag = "URL tag";
	
	

} else {
	$idlugar = $_GET['id'];
	

	$query_a_db = "SELECT * FROM lugares
   
	
	 WHERE id = '".$idlugar."' LIMIT 0,1";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($lugar=mysql_fetch_array($ejecuto_query)){
	
$coordenadas = $lugar['coordenadas'];
$latitud = substr($coordenadas, 0, 18);
$longitud = substr($coordenadas, 19, 37);
$interior = $lugar['interior'];
$nombre = $lugar['nombre'];
$direccion = $lugar['direccion'];
$descripcion = $lugar['descripcion'];
$url_tag = $lugar['url_tag'];
};
};
 include("mapsjs.php");
};
?>
<script type="text/javascript">
function borrar(id,nombre){
 var answer = confirm ("Estas seguro que queres borrar a "+nombre);
if (answer){
    this.form.accion.value = "borrar";
    this.form.submit();
}else{
alert ("OK, tene cuidado!");
}
}
</script>
</head>

<?php
if($tabla == "lugares"){
	?>
<body  onload="initialize()">
<?php }else{
	?>
    <body>
	<div class="container">
		

<?php
};
function recortar_texto($texto, $longitud = 180) { 
if((strlen($texto) > $longitud)) { 
    $pos_espacios = strpos($texto, ' ', $longitud) - 1; 
    if($pos_espacios > 0) { 
        $caracteres = count_chars(substr($texto, 0, ($pos_espacios + 1)), 1); 
        if ($caracteres[ord('<')] > $caracteres[ord('>')]) { 
            $pos_espacios = strpos($texto, ">", $pos_espacios) - 1; 
        } 
        $texto = substr($texto, 0, ($pos_espacios + 1)).'...'; 
    } 
    if(preg_match_all("|(<([\w]+)[^>]*>)|", $texto, $buffer)) { 
        if(!empty($buffer[1])) { 
            preg_match_all("|</([a-zA-Z]+)>|", $texto, $buffer2); 
            if(count($buffer[2]) != count($buffer2[1])) { 
                $cierrotags = array_diff($buffer[2], $buffer2[1]); 
                $cierrotags = array_reverse($cierrotags); 
                foreach($cierrotags as $tag) { 
                        $texto .= '</'.$tag.'>'; 
                } 
            } 
        } 
    } 
 
} 
return $texto; 
};

$entradassql = "SELECT titulo, idbanda, noticias.id, noticias.urltag, fecha, nombre,contenido, tags FROM noticias JOIN bandas ON noticias.idbanda = bandas.id ORDER BY fecha DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);



if($esAdmin){
?> 
<?php
function active($currect_page){
  $url = $_GET['tabla'];
  if($currect_page == $url){
      echo 'class="active"'; //class name in css 
  } 
}
?>
 <center>
<!-- Static navbar -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Panel Brote Colectivo</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li <?php active("noticias");?>><a href="?tabla=noticias">Noticias</a></li>
              <li <?php active("fechas");?>><a href="?tabla=fechas">Fechas</a></li>
              <li <?php active("bandas");?>><a href="?tabla=bandas">Artistas</a></li>
              <li <?php active("canciones");?>><a href="?tabla=canciones">Canciones</a></li>
              <li <?php active("videos");?>><a href="?tabla=videos">Videos</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Otros <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li <?php active("letras");?>><a href="?tabla=letras">Letras</a></li>
                  <li <?php active("newsletter");?>><a href="?tabla=newsletter">Newsletter</a></li>
                  <li <?php active("programas");?>><a href="?tabla=programas">Programas</a></li>
                  <li <?php active("lugares");?>><a href="?tabla=lugares">Lugares</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./salir.php">Salir</a></li>
              <li><a href="/webmail">WebMail</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

        
<?php 
if($_GET['editado']){
?>
<div class="mensaje_verde">
 <h3>Entrada editada perfectamente</h3>
</div>
<?php }; 

if($_GET['picassa'] == '1'){

	include("picassa.php");


}
if(!$accion){
	if($_GET['tabla']){?>
<h1><a href="?tabla=<?php echo $_GET['tabla']; ?>&accion=crear" class="btn btn-primary btn-lg btn-block">Crear Nuev@</a></h1>
<?php
};
include("todas.php");

	} else {
		if($accion == "editar"){
		?>	
	    <h1><a href="?tabla=<?php echo $_GET['tabla']; ?>&accion=crear" class="btn btn-primary btn-lg btn-block">Crear Nuev@</a></h1>
		<?php
		}
	include("formularios.php");

};
?>
      
         
          

        


          
</center>
</div>
<script>
	$(document).on("ready", function () {
		$("input#urltag").keyup(function () {
    var textValue = $(this).val();
    textValue =textValue.replace(/ /g,"-");
    $(this).val(textValue);
});
	})
</script>
</body>
</html>
<?php
};
?>

