 <?php
 require('conexion.php');
$entradassql = "SELECT * FROM noticias ORDER BY fecha DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);


 if($tabla == "noticias"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Banda</th>
              <th width="100">Titulo</th>
              <th width="90">Fecha</th>
              <th width="120">Etiquetas</th>
              <th>Descripción</th>
              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php


if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     $identrada = $todas[id];
     
     $contenido = $todas['contenido'];
$descripcion = strip_tags(recortar_texto($contenido, 100), "");
?>

 <form id="form" action="acciones.php" method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="borrar">
    <input type="hidden" id="tabla" name="tabla" value="noticias">
    <input type="hidden" id="id" name="id" value="<?php echo $identrada; ?>">
        <input type="hidden" id="nombre" name="nombre" value="<?php echo $todas['titulo']; ?>">


            <tr>          
              <td><?php echo $identrada; ?></td>
              <td><?php 


$noticiabandas = json_decode($todas['idbanda']);



if($noticiabandas){
reset($noticiabandas);

while (list(, $value) = each($noticiabandas)) {
  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$value;


$ejecuto_query6 = mysql_query($query_a_db6, $conexion) or die(mysql_error());
while($bandas5=mysql_fetch_array($ejecuto_query6)){
$cadena = $cadena."<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$bandas5['urltag']."'>".$bandas5['nombre']."</a>" . ", ";
}

}
  echo substr($cadena,0,-2);  
unset ($cadena);
}else{
echo "Ninguna"; };


 ?></td>
              <td><?php echo $todas['titulo']; ?></td>
              <td><?php echo date('d/m/Y H:i', $todas['fecha']); ?></td>
              <td><?php echo $todas['tags']; ?></td>
              <td><?php echo $descripcion; ?></td>
              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=noticias&accion=editar&id=<?php echo $identrada; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $identrada; ?>", "<?php echo $todas['titulo']; ?>");' />
</td>
                     


            </tr></form>
<?
} 
}
?>          </table>
<?php

}elseif($tabla == "programas"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Banda</th>
              <th width="100">Titulo</th>
              <th width="90">Fecha</th>
              <th width="120">Etiquetas</th>
              <th>Descripción</th>
              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php

$entradassql = "SELECT * FROM programas ORDER BY titulo DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     $identrada = $todas[id];
     
     $contenido = $todas['contenido'];
$descripcion = strip_tags(recortar_texto($contenido, 100), "");
?>
            <tr>          
              <td><?php echo $identrada; ?></td>
              <td><?php 


$noticiabandas = json_decode($todas['idbanda']);



if($noticiabandas){
reset($noticiabandas);

while (list(, $value) = each($noticiabandas)) {
  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$value;


$ejecuto_query6 = mysql_query($query_a_db6, $conexion) or die(mysql_error());
while($bandas5=mysql_fetch_array($ejecuto_query6)){
$cadena = $cadena."<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$bandas5['urltag']."'>".$bandas5['nombre']."</a>" . ", ";
}

}
  echo substr($cadena,0,-2);  
unset ($cadena);
}else{
echo "Ninguna"; };




 ?></td>
              <td><?php echo $todas['titulo']; ?></td>
              <td><?php echo date('d/m/Y H:i', $todas['fecha']); ?></td>
              <td><?php echo $todas['tags']; ?></td>
              <td><?php echo $descripcion; ?></td>
              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=programas&accion=editar&id=<?php echo $identrada; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <a href="entradas.php?borrar=<?php echo $identrada; ?>"><img src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" alt="picture" width="16" height="16" class="tabpimpa" /></a>
</td>
                     


            </tr>
<?
} 
}
?>          </table>
<?php

 }elseif($tabla == "lugares"){
	 
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Nombre</th>
              <th width="100">Direccion</th>
              <th width="90">Descripcion</th>
              <th width="120">Coordenadas</th>
              <th width="120">url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT * FROM lugares ORDER BY nombre DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
	   $identrada = $todas[id];
	   $nombre = utf8_encode($todas['nombre']);
	   $descripcion = utf8_encode($todas['descripcion']);
	   $url_tag = utf8_encode($todas['url_tag']);
	   $direccion = utf8_encode($todas['direccion']);
?>
 <form id="form" action="acciones.php" method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="borrar">
    <input type="hidden" id="tabla" name="tabla" value="lugares">
    <input type="hidden" id="id" name="id" value="<?php echo $identrada; ?>">
        <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>">


            <tr>          
              <td><?php echo $identrada; ?></td>
              <td><?php echo $nombre; ?></td>
              <td><?php echo $direccion; ?></td>
              <td><?php echo $descripcion; ?></td>
              <td><?php echo $todas['coordenadas']; ?></td>
              <td><?php echo $url_tag; ?></td>
              <td width="28"><a href="index.php?tabla=lugares&accion=editar&id=<?php echo $identrada; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $identrada; ?>", "<?php echo $nombre; ?>");' />
</form></td>
                     


            </tr>
<?
} 
}
?>
</table>
<?php
 }elseif($tabla == "fechas"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="300">Afiche</th>
              <th width="100">Banda</th>
              <th width="100">Lugar</th>

              <th width="100">Titulo</th>
              <th width="90">Fecha_Inicio</th>
              <th width="90">Fecha_Fin</th>

              <th width="120">Etiquetas</th>
              <th>Descripción</th>
              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT fechas.id, idbanda,idlugar,fecha_inicio,fecha_fin,titulo,tags,contenido, fechas.urltag, lugares.nombre FROM fechas
JOIN lugares ON fechas.idlugar = lugares.id ORDER BY fecha_inicio DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     
     $idfecha = $todas['id'];
     $contenido = $todas['contenido'];
$descripcion = strip_tags(recortar_texto($contenido, 100), "");
?>
 <form id="form" action="acciones.php" method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="borrar">
    <input type="hidden" id="tabla" name="tabla" value="fechas">
    <input type="hidden" id="id" name="id" value="<?php echo $idfecha; ?>">
        <input type="hidden" id="nombre" name="nombre" value="<?php echo $todas['titulo']; ?>">

            <tr>          
              <td><?php echo $idfecha; ?></td>
              <td>    <div class="thumbnail"><img src="/fechas/<?php echo $todas['urltag']; ?>.jpg" alt="afiche" class="img-rounded"></div></td>
              <td><?php 
        $idbanda = $todas['idbanda'];
      
$noticiabandas = json_decode($todas['idbanda']);


if($noticiabandas){
reset($noticiabandas);

while (list(, $value) = each($noticiabandas)) {
  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$value;


$ejecuto_query6 = mysql_query($query_a_db6, $conexion) or die(mysql_error());
while($bandas5=mysql_fetch_array($ejecuto_query6)){
$cadena = $cadena."<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$bandas5['urltag']."'>".$bandas5['nombre']."</a>" . ", ";
}

}


  echo substr($cadena,0,-2);  
unset ($cadena);
}else{
echo "Ninguna"; };
        ?></td>
              <td><?php echo $todas['nombre']; ?></td>
                            <td><?php echo $todas['titulo']; ?></td>

              <td><?php echo date("d/m/Y H:i", strtotime($todas['fecha_inicio'])); ?></td>
              <td><?php echo date("d/m/Y H:i", strtotime($todas['fecha_fin'])); ?></td>
              <td><?php echo $todas['tags']; ?></td>
              <td><?php echo $descripcion; ?></td>
              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=fechas&accion=editar&id=<?php echo $idfecha; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $idfecha; ?>", "<?php echo $todas['titulo']; ?>");' />
              <a class="boton_facebook" href="facebook.php?tipo=fechas&id=<?php echo $idfecha; ?>"><img src="http://boletoeducativogratuito.cba.gov.ar/Imagenes/icono_facebook.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
</td>

                     


            </tr>
</form>
<?
} 
}
?>          </table>
<?php

 }elseif($tabla == "videos"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Banda</th>
              <th width="100">Titulo</th>

              <th width="100">IDYoutube</th>
              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT * FROM videos ORDER BY id DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     
     $idvideo = $todas['id'];
?>
            <tr>          
              <td><?php echo $idvideo; ?></td>
              <td><?php 
        $idbanda = $todas['idbanda'];
      
$noticiabandas = json_decode($todas['idbanda']);
$idyoutube = $todas['idyoutube'];

if($noticiabandas){
reset($noticiabandas);

while (list(, $value) = each($noticiabandas)) {
  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$value;


$ejecuto_query6 = mysql_query($query_a_db6, $conexion) or die(mysql_error());
while($bandas5=mysql_fetch_array($ejecuto_query6)){
$cadena = $cadena."<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$bandas5['urltag']."'>".$bandas5['nombre']."</a>" . ", ";
}

}
  echo substr($cadena,0,-2);  
unset ($cadena);
}else{
echo "Ninguna"; };

        ?></td>
                            <td><?php echo $todas['titulo']; ?></td>



              <td><?php echo $idyoutube; ?></td>
              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=videos&accion=editar&id=<?php echo $idvideo; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $idvideo; ?>", "<?php echo $titulo; ?>");' />
</form></td>
                     


            </tr>
<?
} 
}
?>          </table>
<?php

 }elseif($tabla == "album"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Banda</th>
              <th width="100">Titulo</th>

              <th width="100">ID Picassa</th>
              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT * FROM album ORDER BY id DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     
     $idalbum = $todas['id'];
?>
            <tr>          
              <td><?php echo $idalbum; ?></td>
              <td><?php 
        $idbanda = $todas['idbanda'];
      
$noticiabandas = json_decode($todas['idbanda']);
$idpicassa = $todas['idpicassa'];

if($noticiabandas){
reset($noticiabandas);

while (list(, $value) = each($noticiabandas)) {
  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$value;


$ejecuto_query6 = mysql_query($query_a_db6, $conexion) or die(mysql_error());
while($bandas5=mysql_fetch_array($ejecuto_query6)){
$cadena = $cadena."<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$bandas5['urltag']."'>".$bandas5['nombre']."</a>" . ", ";
}

}
  echo substr($cadena,0,-2);  
unset ($cadena);
}else{
echo "Ninguna"; };

        ?></td>
                            <td><?php echo $todas['titulo']; ?></td>



              <td><?php echo $idpicassa; ?></td>
              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=album&accion=editar&id=<?php echo $idalbum; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $idalbum; ?>", "<?php echo $titulo; ?>");' />
</form></td>
                     


            </tr>
<?
echo $entradassql;
} 
}
?>          </table>
<?php

 }elseif($tabla == "canciones"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Banda</th>
              <th width="100">Titulo</th>
              <th width="100">Genero</th>


              <th>url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT * FROM canciones ORDER BY id DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     
     $idvideo = $todas['id'];
?>
            <tr>          
              <td><?php echo $idvideo; ?></td>
              <td><?php 
        $idbanda = $todas['idbanda'];
        $idgenero = $todas['idgenero'];
      
$noticiabandas = json_decode($todas['idbanda']);






  $query_a_db6 = "SELECT * FROM bandas WHERE id = ".$idbanda." LIMIT 0,1";

 $bandassql = "SELECT nombre, urltag FROM bandas WHERE id=$idbanda LIMIT 0,1";
        $bandasquery = mysql_query($bandassql, $conexion) or die(mysql_error());
        $bandasrows = mysql_num_rows($bandasquery);
        if($bandasrows> 0){
          while($banda = mysql_fetch_assoc($bandasquery)) {
            echo "<a href='http://brotecolectivo.com/?pagina=bandas&tag=".$banda['urltag']."'>".$banda['nombre']."</a>";
          };
        };¡


        ?></td>
                            <td><?php echo $todas['titulo']; ?></td>

<td>
  <?php






 $bandassql5 = "SELECT nombre FROM generos WHERE id=$idgenero LIMIT 0,1";
        $bandasquery5 = mysql_query($bandassql5, $conexion) or die(mysql_error());
        $bandasrows5 = mysql_num_rows($bandasquery5);
        if($bandasrows5> 0){
          while($genero = mysql_fetch_assoc($bandasquery5)) {
            echo $genero['nombre'];
          };
        };¡

        ?>
</td>

              <td><?php echo $todas['urltag']; ?></td>
              <td width="28"><a href="index.php?tabla=canciones&accion=editar&id=<?php echo $idvideo; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $idvideo; ?>", "<?php echo $titulo; ?>");' />
</form></td>
                     


            </tr>
<?
} 
}
?>          </table>
<?php

 }elseif($tabla == "letras"){
   
   ?><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Cancion</th>
              <th width="100">Banda</th>
              <th width="100">Autor</th>

              <th width="50">Accion</th>
            </tr>
<?php
$entradassql = "SELECT L.id, L.idcancion, C.idbanda, B.nombre, C.titulo, L.autor FROM letras L INNER JOIN canciones C ON L.idcancion = C.id INNER JOIN bandas B ON C.idbanda = B.id   ORDER BY L.id DESC";
$entradasquery = mysql_query($entradassql, $conexion) or die(mysql_error());
$entradasrows = mysql_num_rows($entradasquery);
$entradasrows2 = mysql_num_rows($entradasquery);

if ($entradasrows> 0) {
   while ($todas = mysql_fetch_assoc($entradasquery)) {
     $idvideo = $todas['id'];
?>
            <tr>          
              <td><?php echo $idvideo; ?></td>
              <td><?php 
echo $todas['titulo']

        ?></td>
                            <td><?php echo $todas['nombre']; ?></td>

<td>
  <?php


 echo $todas['autor'];
?>
</td>

              <td width="28"><a href="index.php?tabla=letras&accion=editar&id=<?php echo $idvideo; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $idvideo; ?>", "<?php echo $titulo; ?>");' />
</form></td>
                     


            </tr>
<?
} 
}
?>          </table>
<?php

 }elseif($tabla == "bandas"){
   
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-stripped">
            <tr>
              
              <th width="100">ID</th>
              <th width="100">Nombre</th>
              <th width="100">Bio</th>
              <th width="120">url_tag</th>
              <th width="50">Accion</th>
            </tr>
<?php
$bandasql = "SELECT * FROM bandas ORDER BY nombre DESC";
$bandaquery = mysql_query($bandasql, $conexion) or die(mysql_error());
$bandarows = mysql_num_rows($bandaquery);
$bandarows2 = mysql_num_rows($bandaquery);

if ($bandarows> 0) {
   while ($todas = mysql_fetch_assoc($bandaquery)) {
     $identrada = $todas[id];
     $nombre = utf8_encode($todas['nombre']);
     $url_tag = utf8_encode($todas['urltag']);
     $bio2 = utf8_encode($todas['bio']);
     $bio =strip_tags(recortar_texto($bio2, 100), "");
?>
 <form id="form" action="acciones.php" method="post" name="form">
  <input type="hidden" id="accion" name="accion" value="borrar">
    <input type="hidden" id="tabla" name="tabla" value="bandas">
    <input type="hidden" id="id" name="id" value="<?php echo $identrada; ?>">
        <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>">


            <tr>          
              <td><?php echo $identrada; ?></td>
              <td><?php echo $nombre; ?></td>
              <td><?php echo $bio; ?></td>
             
              <td><?php echo $url_tag; ?></td>
              <td width="28"><a href="index.php?tabla=bandas&accion=editar&id=<?php echo $identrada; ?>"><img src="http://docs.oracle.com/cd/E13159_01/osb/docs10gr3/consolehelp/wwimages/icon_edit_item.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a>
              <input type="image" src="http://www.ecosdeargentina.com/images/interfaz/delete2_16x16.png" onclick='javascript:borrar("<?php echo $identrada; ?>", "<?php echo $nombre; ?>");' />
</form></td>
                     


            </tr>
<?
} 
}
?>
</table>

<?php
};

?>
