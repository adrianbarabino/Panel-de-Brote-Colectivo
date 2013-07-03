
<?php

if($tabla == "lugares"){

	?>
<center>
<h1>Lugares</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="lugares">
    <input type="hidden" id="id" name="id" value="<?php echo $idlugar; ?>">
        Imagen: <input name="file" id="file" type="file"  onChange="ver(form.file.value)"> 


  <input type="text" id="nombre" value="<?php echo $nombre; ?>" onclick="if(this.value=='Nombre') this.value=''" onblur="if(this.value=='') this.value='Nombre'" name="nombre" /> <br>
  <input type="text" id="direccion" value="<?php echo $direccion; ?>" onclick="if(this.value=='Dirección') this.value=''" onblur="if(this.value=='') this.value='Dirección'" name="direccion" /> <br>
    <input type="text" id="descripcion" value="<?php echo $descripcion; ?>" onclick="if(this.value=='Descripción') this.value=''" onblur="if(this.value=='') this.value='Descripción'" name="descripcion" /> <br>

      <input type="text" id="url_tag" value="<?php echo $url_tag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="url_tag" /> <br>

  <select id="interior"  name="interior">
    <?php if($interior == "1"){
      ?>
        <option selected=selected value=1>Interior / Exterior</option>
        <option value=0>Rio Gallegos</option>

<?php
    }else{
      ?>
        <option selected=selected value=0>Rio Gallegos</option>
                <option value=1>Interior / Exterior</option>


      <?php
    }
    ?>
  </select>


<div id="ubicacion">
  <div style="height:150px !important;width:150px !important;" id="map_canvas" class="smallmap"></div>
  <input type="text" id="lat" value="<?php echo $latitud; ?>" onclick="if(this.value=='Latitud') this.value=''" onblur="if(this.value=='') this.value='Latitud'" name="lat" /> 
   <input type="text" id="lng" value="<?php echo $longitud; ?>" onclick="if(this.value=='Longitud') this.value=''" onblur="if(this.value=='') this.value='Longitud'"
 name="lng" />
 <button type="submit" value="enviar" >enviar</button>
 <?php if($idlugar){
	 ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};
?>
<?php if($tabla == "noticias"){
  ?>
<center>
<h1>Noticias</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="noticias">
    <input type="hidden" id="id" name="id" value="<?php echo $idnoticia; ?>">
    Imagen: <input name="file" id="file" type="file"  onChange="ver(form.file.value)"> 

  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
  <input type="text" id="tags" value="<?php echo $tags; ?>" onclick="if(this.value=='Tags') this.value=''" onblur="if(this.value=='') this.value='Tags'" name="tags" /> <br>
  <input type="text" id="fecha" value="<?php 
  
  
  if($fecha == "DD/MM/AAAA HH:MM"){
    echo $fecha;
  }else{
    echo date("d/m/Y H:i",$fecha); 
  };
  ?>" onclick="if(this.value=='DD/MM/AAAA HH:MM') this.value=''" onblur="if(this.value=='') this.value='DD/MM/AAAA HH:MM'" name="fecha" /> <br>
  <select id="idbanda"  multiple name="idbanda[]">
  <?php
    error_reporting(0);
  $query_a_db = "SELECT * FROM bandas";
   $bandaid = json_decode($idbanda);
  if(in_array(0, $bandaid)){
    echo '  <option selected=selected value=0>ID Banda</option>';
  }else{
    echo "  <option value=0>ID Banda</option>";
   };

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
 
  ?>
    <option <?php if(in_array($bandas['id'], $bandaid)){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />
        <input type="text" id="urltag" value="<?php echo $urltag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="urltag" /> <br>


   <textarea name="contenido" class="tinymce" id="contenido"><?php echo $contenido; ?></textarea>






 <button type="submit" value="enviar" >enviar</button>
 <?php if($idnoticia){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
  
   </form>
  
</center>
<?php
};
?>


<?php if($tabla == "programas"){
  ?>
<center>
<h1>Noticias</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="programas">
    <input type="hidden" id="id" name="id" value="<?php echo $idprograma; ?>">
    Audio: <input name="file" id="file" type="file"  onChange="ver(form.file.value)"> 

  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
  <input type="text" id="tags" value="<?php echo $tags; ?>" onclick="if(this.value=='Tags') this.value=''" onblur="if(this.value=='') this.value='Tags'" name="tags" /> <br>
  <input type="text" id="fecha" value="<?php 
  
  
  if($fecha == "DD/MM/AAAA HH:MM"){
    echo $fecha;
  }else{
    echo date("d/m/Y H:i",$fecha); 
  };
  ?>" onclick="if(this.value=='DD/MM/AAAA HH:MM') this.value=''" onblur="if(this.value=='') this.value='DD/MM/AAAA HH:MM'" name="fecha" /> <br>
  <select id="idbanda"  multiple name="idbanda[]">
  <?php
    error_reporting(0);
  $query_a_db = "SELECT * FROM bandas";
   $bandaid = json_decode($idbanda);
  if(in_array(0, $bandaid)){
    echo '  <option selected=selected value=0>ID Banda</option>';
  }else{
    echo "  <option value=0>ID Banda</option>";
   };

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
 
  ?>
    <option <?php if(in_array($bandas['id'], $bandaid)){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />
        <input type="text" id="urltag" value="<?php echo $urltag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="urltag" /> <br>


   <textarea name="contenido" class="tinymce" id="contenido"><?php echo $contenido; ?></textarea>






 <button type="submit" value="enviar" >enviar</button>
 <?php if($idprograma){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
  
   </form>
  
</center>
<?php
};
?>

<?php if($tabla == "newsletter"){
  ?>
<center>
<h1>Newsletter</h1>
  <form id="form" action="enviarnewsletter.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="crear">
    <input type="hidden" id="tabla" name="tabla" value="newsletter">

  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
    <input type="text" id="tags" value="<?php echo $tags; ?>" onclick="if(this.value=='Tags') this.value=''" onblur="if(this.value=='') this.value='Tags'" name="tags" /> <br>

        <input type="text" id="urltag" value="<?php echo $urltag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="urltag" /> <br>


   <textarea name="contenido" class="tinymce" id="contenido"><?php echo $contenido; ?></textarea>






 <button type="submit" value="enviar" >enviar</button>
 
  
   </form>
  
</center>
<?php
};
?>

<?php if($tabla == "fechas"){
	?>
<center>
<h1>Eventos</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="fechas">
    <input type="hidden" id="id" name="id" value="<?php echo $idfecha; ?>">
    Imagen: <input name="file" id="file" type="file"  onChange="ver(form.file.value)"> 

  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
  <input type="text" id="tags" value="<?php echo $tags; ?>" onclick="if(this.value=='Tags') this.value=''" onblur="if(this.value=='') this.value='Tags'" name="tags" /> <br>
  <input type="text" id="fecha_inicio" value="<?php 
  
  
  if($fecha_inicio == "DD/MM/AAAA HH:MM"){
	  echo $fecha_inicio;
  }else{
	  echo date("d/m/Y H:i",$fecha_inicio); 
  };
  ?>" onclick="if(this.value=='DD/MM/AAAA HH:MM') this.value=''" onblur="if(this.value=='') this.value='DD/MM/AAAA HH:MM'" name="fecha_inicio" /> <br>
    <input type="text" id="fecha_fin" value="<?php 
  
  
  if($fecha_fin == "DD/MM/AAAA HH:MM"){
	  echo $fecha_fin;
  }else{
	  echo date("d/m/Y H:i",$fecha_fin); 
  };
  ?>" onclick="if(this.value=='DD/MM/AAAA HH:MM') this.value=''" onblur="if(this.value=='') this.value='DD/MM/AAAA HH:MM'" name="fecha_fin" /> <br>
   <select id="idbanda"  multiple name="idbanda[]">
  <?php
error_reporting(0);
  $query_a_db = "SELECT * FROM bandas";

   $bandaid = json_decode($idbanda);

  if(in_array(0, $bandaid)){
    echo '  <option selected=selected value=0>ID Banda</option>';
  }else{
    echo "  <option value=0>ID Banda</option>";
   };

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
 
  ?>
    <option <?php if(in_array($bandas['id'], $bandaid)){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />
<select id="idlugar" name="idlugar">
  <option value="0">ID Lugar</option>
  <?php
  $query_a_db = "SELECT * FROM lugares";
	 

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($lugares=mysql_fetch_array($ejecuto_query)){
	?>
    <option <?php if($idlugar == $lugares['id']){?> selected="selected" <?php }; ?> value="<?php echo $lugares['id'];?>"><?php echo $lugares['nombre'];?></option>
    <?php
};
?>
</select><br />
	      <input type="text" id="urltag" value="<?php echo $urltag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="urltag" /> <br>


   <textarea name="contenido" class="tinymce" id="contenido"><?php echo $contenido; ?></textarea>

<div style="width:100%;background:#fff;padding: 1em; margin:0.5eM">

 <label for="facebook">Publicar a Facebook</label>
    <input type="checkbox" id="facebook" name="facebook" value="si">
  </div>
    




 <button type="submit" value="enviar" >enviar</button>
 <?php if($idfecha){
	 ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
  
   </form>
  
</center>
<?php
};

if($tabla == "bandas"){
  ?>
<center>
<h1>Bandas</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="bandas">
    <input type="hidden" id="id" name="id" value="<?php echo $idbandas; ?>">
        Imagen: <input name="file" id="file" type="file"  onChange="ver(form.file.value)"> 


  <input type="text" id="nombre" value="<?php echo $nombre; ?>" onclick="if(this.value=='Nombre') this.value=''" onblur="if(this.value=='') this.value='Nombre'" name="nombre" /> <br>
<textarea  class="tinymce" id="bio" name="bio"><?php echo $bio; ?></textarea>
      <input type="text" id="url_tag" value="<?php echo $url_tag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="url_tag" /> <br>


<h1>Redes Sociales</h1>
<br>

  <input type="text" id="facebook" value="<?php echo $facebook; ?>" onclick="if(this.value=='Facebook') this.value=''" onblur="if(this.value=='') this.value='Facebook'" name="facebook" /> <br>
<br>
  <input type="text" id="twitter" value="<?php echo $twitter; ?>" onclick="if(this.value=='Twitter') this.value=''" onblur="if(this.value=='') this.value='Twitter'" name="twitter" /> <br>
<br>
  <input type="text" id="sitioweb" value="<?php echo $sitioweb; ?>" onclick="if(this.value=='Sitio Web') this.value=''" onblur="if(this.value=='') this.value='Sitio Web'" name="sitioweb" /> <br>
<br>
  <input type="text" id="soundcloud" value="<?php echo $soundcloud; ?>" onclick="if(this.value=='SoundCloud') this.value=''" onblur="if(this.value=='') this.value='SoundCloud'" name="soundcloud" /> <br>
<br>
  <input type="text" id="youtube" value="<?php echo $youtube; ?>" onclick="if(this.value=='Youtube') this.value=''" onblur="if(this.value=='') this.value='Youtube'" name="youtube" /> <br>
<br>
  <input type="text" id="grooveshark" value="<?php echo $grooveshark; ?>" onclick="if(this.value=='GrooveShark') this.value=''" onblur="if(this.value=='') this.value='GrooveShark'" name="grooveshark" /> <br>
<br>
  <input type="text" id="vimeo" value="<?php echo $vimeo; ?>" onclick="if(this.value=='Vimeo') this.value=''" onblur="if(this.value=='') this.value='Vimeo'" name="vimeo" /> <br>
<br>
<?php

?>

 <button type="submit" value="enviar" >enviar</button>
 <?php if($idbandas){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};

if($tabla == "videos"){
  ?>
<center>
<h1>Videos</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="videos">
    <input type="hidden" id="id" name="id" value="<?php echo $idvideo; ?>">
        Video: <input name="file" id="file" type="file"> 


  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
  <input type="text" id="idyoutube" value="<?php echo $idyoutube; ?>" onclick="if(this.value=='ID Youtube') this.value=''" onblur="if(this.value=='') this.value='ID Youtube'" name="idyoutube" /> <br>

  <input type="text" id="url_tag" value="<?php echo $url_tag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="url_tag" /> <br>

 <select id="idbanda"  multiple name="idbanda[]">
  <?php
  error_reporting(0);
  $query_a_db = "SELECT * FROM bandas";
   $bandaid = json_decode($idbanda);
  if(in_array(0, $bandaid)){
    echo '  <option selected=selected value=0>ID Banda</option>';
  }else{
    echo "  <option value=0>ID Banda</option>";
   };

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
 
  ?>
    <option <?php if(in_array($bandas['id'], $bandaid)){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />



 <button type="submit" value="enviar" >enviar</button>
 <?php if($idvideo){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};

if($tabla == "album"){
  ?>
<center>
<h1>Albumes</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="album">
    <input type="hidden" id="id" name="id" value="<?php echo $idalbum; ?>">


  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>
  <input type="text" id="idpicassa" value="<?php echo $idpicassa; ?>" onclick="if(this.value=='ID Picassa') this.value=''" onblur="if(this.value=='') this.value='ID Picassa'" name="idpicassa" /> <br>

  <input type="text" id="url_tag" value="<?php echo $url_tag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="url_tag" /> <br>

 <select id="idbanda"  multiple name="idbanda[]">
  <?php
  error_reporting(0);
  $query_a_db = "SELECT * FROM bandas";
   $bandaid = json_decode($idbanda);
  if(in_array(0, $bandaid)){
    echo '  <option selected=selected value=0>ID Banda</option>';
  }else{
    echo "  <option value=0>ID Banda</option>";
   };

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
 
  ?>
    <option <?php if(in_array($bandas['id'], $bandaid)){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />



 <button type="submit" value="enviar" >enviar</button>
 <?php if($idalbum){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};

if($tabla == "canciones"){
  ?>
<center>
<h1>Canciones</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="canciones">
    <input type="hidden" id="id" name="id" value="<?php echo $idvideo; ?>">
        Cancion: <input name="file" id="file" type="file"> 
<br>

  <input type="text" id="titulo" value="<?php echo $titulo; ?>" onclick="if(this.value=='Titulo') this.value=''" onblur="if(this.value=='') this.value='Titulo'" name="titulo" /> <br>

  <input type="text" id="url_tag" value="<?php echo $url_tag; ?>" onclick="if(this.value=='URL tag') this.value=''" onblur="if(this.value=='') this.value='URL tag'" name="url_tag" /> <br>

 <select id="idbanda" name="idbanda">
  <option value="0">ID Banda</option>
  <?php
  $query_a_db = "SELECT * FROM bandas";
   

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
  ?>
    <option <?php if($idbanda == $bandas['id']){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['nombre'];?></option>
    <?php
};
?>
</select><br />


 <select id="idgenero" name="idgenero">
  <option value="0">ID Genero</option>
  <?php
  $query_a_db2 = "SELECT * FROM generos";
   

$ejecuto2_query = mysql_query($query_a_db2, $conexion) or die(mysql_error());
while($bandas2=mysql_fetch_array($ejecuto2_query)){
  ?>
    <option <?php if($idgenero == $bandas2['id']){?> selected="selected" <?php }; ?> value="<?php echo $bandas2['id'];?>"><?php echo $bandas2['nombre'];?></option>
    <?php
};
?>
</select><br />

 <button type="submit" value="enviar" >enviar</button>
 <?php if($idvideo){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};

if($tabla == "letras"){
  ?>
<center>
<h1>Letras</h1>
  <form id="form" action="acciones.php" ENCTYPE="multipart/form-data"  method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="tabla" name="tabla" value="letras">
    <input type="hidden" id="id" name="id" value="<?php echo $idvideo; ?>">
<br>

  <input type="text" id="autor" value="<?php echo $autor; ?>" onclick="if(this.value=='Autor') this.value=''" onblur="if(this.value=='') this.value='Autor'" name="autor" /> <br>


 <select id="idcancion" name="idcancion">
  <option value="0">ID Cancion</option>
  <?php
  $query_a_db = "SELECT * FROM canciones";
   

$ejecuto_query = mysql_query($query_a_db, $conexion) or die(mysql_error());
while($bandas=mysql_fetch_array($ejecuto_query)){
  ?>
    <option <?php if($idcancion == $bandas['id']){?> selected="selected" <?php }; ?> value="<?php echo $bandas['id'];?>"><?php echo $bandas['titulo'];?></option>
    <?php
};
?>
</select><br />

<textarea  class="tinymce" id="letra" name="letra"><?php echo $letra; ?></textarea>

 <button type="submit" value="enviar" >enviar</button>
 <?php if($idvideo){
   ?>
 <button type="button" value="borrar" onclick='javascript:borrar();'>borrar</button>
    <?php
 };
 ?>
   </div>
   </form>
  
</center>
<?php
};
?>