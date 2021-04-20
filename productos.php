<?php
include("conexion.php"); 
session_start();

if($_GET['idg']=='') {
echo '<script language="javascript">window.location="index.php"</script>';
} else {
$cat = $_GET['idg'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Productos - Cositas de Bebe - Pretel</title>
<meta name="description" content="En CositasDeBebe.com vendemos Ropa de Bebe al Mayor y al Detal, confeccionamos con los más altos estandaresde calidad y despechamos a toda Venezuela. Desde el 2006, Pretel como marca se ha dedicado a la fabricación y confección de ropa de bebe para niños y niñas, cuidando cada detalle, cada accesorio y todo lo relacionado con su presentación, despacho y distribución a nivel nacional." />
<meta name="keywords" content="bebe, ropa, ropita, cositas, niños, niñas, gorritos, conjuntos, manoplas, almillas, vestidos, confección, pretel" />
<?php include ('includes/header-code.php') ?>
<script type="text/javascript">
$(document).ready(function() {

	$("a.zoom").fancybox({
		'width'				: 450,
		'height'			: 600, // auto
		'autoScale'			: true,
		'closeBtn'			: true,
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'scrolling'			: 'auto',
		'type'				: 'iframe',
    	//openEffect	: 'elastic',
    	//closeEffect	: 'elastic',
		
    	helpers : {
    		title : {
    			type : 'outside' // inside
    		},
			overlay: {
				locked: false
			}
    	}
    });
	
});
</script>

<? if ($_SESSION['bebe']=="") { ?> 
<script type='text/javascript'>
$(document).ready(function() {
$.fancybox({
	'width'				: 480,
	'height'			: 'auto',
	'autoScale'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'type'				: 'iframe',
	'href'				: 'msjs.php?msj=proreg'
	}).trigger('click');
});
</script>
<? } ?>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=309437425817038"; // appId must be valid
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="main" class="common">
<?php include ('includes/header.php') ?>

<div id="content">
<?php include ('includes/socials.php') ?>

  <h1><? if ($cat) {
  $buscar=mysql_query("SELECT nombre FROM categorias WHERE idCat='$cat' AND status='A'");
  while($datos=mysql_fetch_array($buscar)) {
  echo 'Catalogo de '.$datos['nombre'];
  } } else {
  echo 'Catalogo de Productos'; } ?></h1>

<?	if ($cat) {
	$buscar=mysql_query("SELECT * FROM productos WHERE categoria='$cat' AND status='A' ORDER BY ref ASC");
	while($datos=mysql_fetch_array($buscar)) { ?>
  <div class="productos">
    <a href="foto-zoom.php?pic=<?=$datos['fotoG']?>" class="zoom" title="== Ref. <?=$datos['ref']?> - <?=$datos['nombre']?> == &nbsp; <?=$datos['descripcion']?>"><img src="images/productos/<?=$datos['fotoP']?>" border="0" alt="Ref. <?=$datos['ref']?> - <?=$datos['nombre']?>" title="Ref. <?=$datos['ref']?> - <?=$datos['nombre']?>" /></a>
  <div class="tit-producto">Ref. <?=$datos['ref']?> - <?=$datos['nombre']?></div>
  <?=$datos['sumario']?><br />
  <span class="txt-blue" style="line-height:30px;">Compra mínima: <strong><?=$datos['cant']?> unidades</strong>.</span><br />
  <?php if ($_SESSION['bebe']!="") { ?><!-- div class="precio">Bs.F <? //=$datos['precioM']?></div --><?php } ?>
  <a href="foto-zoom.php?pic=<?=$datos['fotoG']?>" class="zoom link3" title="== Ref. <?=$datos['ref']?> - <?=$datos['nombre']?> == &nbsp; <?=$datos['descripcion']?>">Ver más...</a><?php if ($_SESSION['bebe']!="") { ?> &nbsp; | &nbsp; <a href="pedidos.php#pedidos" class="link">Comprar</a><?php } ?>
  </div>
<?php } } ?>

</div>

<?php include ('includes/footer.php') ?>
</body>
</html>