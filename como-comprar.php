<?php 
include("conexion.php");
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>¿Cómo Comprar? - Cositas de Bebe - Pretel</title>
<meta name="description" content="En CositasDeBebe.com vendemos Ropa de Bebe al Mayor y al Detal, confeccionamos con los más altos estandaresde calidad y despechamos a toda Venezuela. Desde el 2006, Pretel como marca se ha dedicado a la fabricación y confección de ropa de bebe para niños y niñas, cuidando cada detalle, cada accesorio y todo lo relacionado con su presentación, despacho y distribución a nivel nacional." />
<meta name="keywords" content="bebe, ropa, ropita, cositas, niños, niñas, gorritos, conjuntos, manoplas, almillas, vestidos, confección, pretel" />
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

<div id="content">
<?php include ('includes/socials.php') ?>

  <h1>¿Cómo Comprar?</h1>
<div style="display:table; width:100%; clear:both; height:470px; border-bottom:dashed 1px #006699; margin-bottom:30px;">
  <div class="comprar-box rounded">
  <div>Opcion #1</div>  
  Ve a nuestro m&oacute;dulo de &quot;<a href="pedidos.php" class="link">Pedidos</a>&quot;, selecciona los productos que deseas comprar, indica la cantidad o unidades por cada producto y env&iacute;alo. <br />
  <br />
  A la brevedad te enviaremos por email  el estatus y confirmaci&oacute;n de tu pedido.  </div>
  
  <div class="comprar-box rounded">
  <div>Opcion #2</div>
  Envíanos tu pedido directamente
    al email:    <a href="mailto:diclaps@gmail.com" class="link">diclaps@gmail.com</a>. Incluye la lista de productos que desea comprar con: <strong>Nombre del producto</strong>, <strong>Referencia</strong> (Ref.) y <strong>Cantidad</strong>  de cada uno. <strong>
    Recuerda</strong> incluir tus datos personales: <strong>Nombre, C&eacute;dula o RIF, Email, Tel&eacute;fono, Direcci&oacute;n de env&iacute;o</strong> (con punto de referencia).
  </div>
  
  <div class="comprar-box rounded" style="margin-right:0;">
  <div>Opcion #3</div> 
  Ponte en contacto con nuestros <a href="contactenos.php" class="link3">Representantes de Ventas</a> para ser atendido personalmente y tomar tu pedido. <br />
  <br />
  Visita nuestra secci&oacute;n de <a href="contactenos.php" class="link3"><strong>contacto</strong></a> para m&aacute;s informaci&oacute;n.
</div>
	
</div>

<p align="center" style="font-weight:bold"><u>NOTA</u>: Antes de realizar tu pago, espera nuestra confirmaci&oacute;n sobre tu pedido. <!-- br /> Recuerda colocar tu email y tel&eacute;fono en la orden de compra para ponernos en concatcto. --></p>

	<p align="center">Una ves recibida la <strong>confirmaci&oacute;n de tu pedido</strong>, puedes proceder con tu pago. Recuerda enviarnos el N&uacute;mero de Dep&oacute;sito o Transferencia bancaria al email &quot;<a href="mailto:diclaps@gmail.com" class="link3"><strong>diclaps@gmail.com</strong></a>&quot; junto con tu nombre, tel&eacute;fono<br />
    y monto cancelado.</p>
    
<div style="width:100%; clear:both; background-color:#d2e6ff; padding:15px 0px; margin:35px 0; border-bottom:dashed 1px #006699; border-top:dashed 1px #006699; text-align:center">
	Puedes hacer tus pagos con Depósito o Transferencia, a nombre de: <br />
	  <strong>Diclaps Confecciones C.A.</strong><br />
      <strong>RIF: J-002429615</strong><br />
Banco <strong>BANESCO</strong> - Cuenta Corriente <strong>N° 01340339243391074924</strong>
</div>
    
	<p align="center">Trabajamos también por encargo, elaboramos toallas bordadas, camisetas de bebe, combos de gorrito, 
	  manoplas 
    y zapatitos y cualquier  prenda a la medida. 
La condición o forma de pago por encargo es 50% adelantado  
    y 50% al momento de la entrega de la mercancía.</p>
	<br />
    <p align="center" style="font-size:24px;" class="link">Nuestros precios No incluyen IVA.</p>
	<p align="center" style="font-size:24px;"><strong style="text-decoration:underline">El flete o  env&iacute;o de la mercanc&iacute;a esta a cargo del comprador</strong></p>
</div>

<?php include ('includes/footer.php') ?>
</body>
</html>
