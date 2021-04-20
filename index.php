<?php
include("conexion.php"); 
session_start(); 

if($_GET['logout']==1) {
  session_unset();
  session_destroy();
  header("location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cositas de Bebe - Pretel - Inicio</title>
<meta name="description" content="En CositasDeBebe.com vendemos Ropa de Bebe al Mayor y al Detal, confeccionamos con los más altos estandaresde calidad y despechamos a toda Venezuela. Desde el 2006, Pretel como marca se ha dedicado a la fabricación y confección de ropa de bebe para niños y niñas, cuidando cada detalle, cada accesorio y todo lo relacionado con su presentación, despacho y distribución a nivel nacional." />
<meta name="keywords" content="bebe, ropa, ropita, cositas, niños, niñas, gorritos, conjuntos, manoplas, almillas, vestidos, confección, pretel" />
<link rel="stylesheet" href="css/nivo/default.css" type="text/css" media="screen" />
<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" />
<?php include ('includes/header-code.php') ?>
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

<div id="h-content"><a href="productos.php?idg=1"><img src="images/spacer.gif" width="900" height="410" border="0" style="margin-left:40px; margin-top:37px;" /></a></div>
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
<img src="images/home-slides/home-slide1.jpg" alt="" title="" border="0" />
<img src="images/home-slides/home-slide2.jpg" alt="" title="" border="0" />
<img src="images/home-slides/home-slide3.jpg" alt="" title="" border="0" />
<img src="images/home-slides/home-slide4.jpg" alt="" title="" border="0" />
<img src="images/home-slides/home-slide5.jpg" alt="" title="" border="0" />
<img src="images/home-slides/home-slide6.jpg" alt="" title="" border="0" />
</div>
</div>

<div id="h-boxes" class="common">
<div class="h-box">
<h2>Siguenos<br />por Facebook</h2>
<a href="https://www.facebook.com/cositas.d.bb" target="_blank"><img src="images/img-facebook.png" alt="Facebook - Cositas de bebe - Pretel" border="0" /></a>
<div style="padding-top:20px; clear:both; margin:0 auto;"><fb:share-button type="button"></fb:share-button></div>
</div>

<div class="h-box">
<h2>Compra en<br />4 sencillos pasos</h2>
<a href="como-comprar.php"><img src="images/img-4pasos.png" border="0" /></a>
</div>

<div class="h-box">
<h2>Pongase en contacto<br />con nosotros</h2>
<a href="contactenos.php"><img src="images/img-contact-bird.png" alt="Contacto" border="0" /></a>
</div>
</div>
<?php include ('includes/footer.php') ?>
<script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
$('#slider').nivoSlider({
effect: 'boxRainGrow', // sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse, random
slices: 15, // For slice animations
boxCols: 8, // For box animations
boxRows: 4, // For box animations
animSpeed: 500, // Slide transition speed
pauseTime: 5000, // How long each slide will show
startSlide: 0, // Set starting Slide (0 index)
directionNav: false, // Next & Prev navigation
directionNavHide: true, // Only show on hover
controlNav: true, // 1,2,3... navigation
controlNavThumbs: false, // Use thumbnails for Control Nav
controlNavThumbsFromRel: false, // Use image rel for thumbs
controlNavThumbsSearch: '.jpg', // Replace this with...
controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
keyboardNav: true, // Use left & right arrows
pauseOnHover: true, // Stop animation while hovering
manualAdvance: false, // Force manual transitions
captionOpacity: 0.8, // Universal caption opacity
prevText: 'Prev', // Prev directionNav text
nextText: 'Next', // Next directionNav text
beforeChange: function(){}, // Triggers before a slide transition
afterChange: function(){}, // Triggers after a slide transition
slideshowEnd: function(){}, // Triggers after all slides have been shown
lastSlide: function(){}, // Triggers when last slide is shown
afterLoad: function(){} // Triggers when slider has loaded
	});
});
</script>

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9708575; 
var sc_invisible=1; 
var sc_security="e0678a0f"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/9708575/0/e0678a0f/1/"
alt="web counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</body>
</html>
