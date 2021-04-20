<?php
include("conexion.php");
session_start();

if($_GET['act']==1) {

if (($_POST['nombre']==NULL) or ($_POST['nombre']=='*NOMBRE') or ($_POST['email']==NULL) or ($_POST['email']=='*EMAIL') or ($_POST['comentarios']==NULL) or ($_POST['comentarios']=='*COMENTARIOS...')) { $msj=1; }

else {

$msj=2;
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "diclaps@gmail.com";
$asunto = "Consulta ".$_POST['nombre']." desde CositasDeBebe.com";
						
$msg.= "- NOMBRE:  ".$_POST['nombre']."\n";
$msg.= "- E-MAIL:  ".$_POST['email']."\n";
$msg.= "- TELEFONO:  ".$_POST['telefono']."\n";
$msg.= "- CIUDAD:  ".$_POST['ciudad']."\n";
$msg.= "- COMENTARIOS:  ".$_POST['comentarios']."\n";

$encabezado = "From: ".$_POST['email']."\r\n";
$encabezado.= "Bcc: claudioandrescastillos@gmail.com \r\n";

mail($to, $asunto, $msg, $encabezado);

	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contáctenos - Cositas de Bebe - Pretel</title>
<meta name="description" content="En CositasDeBebe.com vendemos Ropa de Bebe al Mayor y al Detal, confeccionamos con los más altos estandaresde calidad y despechamos a toda Venezuela. Desde el 2006, Pretel como marca se ha dedicado a la fabricación y confección de ropa de bebe para niños y niñas, cuidando cada detalle, cada accesorio y todo lo relacionado con su presentación, despacho y distribución a nivel nacional." />
<meta name="keywords" content="bebe, ropa, ropita, cositas, niños, niñas, gorritos, conjuntos, manoplas, almillas, vestidos, confección, pretel" />
<?php include ('includes/header-code.php') ?>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#contactform").validate();
  });
  
<?php if ($_SESSION['bebe']) { ?>
$.validator.addMethod(
    'noPlaceholder2', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
<?php } else { ?>
$.validator.addMethod(
    'noPlaceholder', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
<?php } ?>
</script>
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

<h1>Contáctenos</h1>
<div class="content-box">
<?php if (($_GET['act']==1) && ($msj==2)) { ?>
<p align="center" style="margin:75px auto; text-align:center;"><strong>Gracias por tu tiempo.<br />
A la brevedad te responderemos.</strong></p>

<?php } elseif (($_GET['act']==1) && ($msj==1)) { ?>
<p align="center" style="margin:75px auto; text-align:center;"><strong>(x) Error de Env&iacute;o.</strong><br />
<a href="contactenos.php" class="link3">Intenta nuevamente</a></p>

<?php } else { ?>
  <form id="contactform" name="contactform" method="post" action="?act=1">
    <table width="390" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td height="5"></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required noPlaceholder" id="nombre" style="background-image:url(<?php if($_SESSION['empresa']==1) { echo 'images/icon-company.png'; } else { echo 'images/icon-avatar.png'; } ?>)" value="<?php if($_SESSION) { if($_SESSION['empresa']==1) { echo $_SESSION['nombre']; } else { echo $_SESSION['nombre'].' '; echo $_SESSION['apellido']; } } else { echo '*NOMBRE'; } ?>" onfocus="if (this.value=='*NOMBRE') this.value = ''" onblur="if (this.value=='') this.value = '*NOMBRE'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="email" type="text" class="fields rounded required email noPlaceholder" id="email" style="background-image:url(images/icon-email.png)" value="<?php if($_SESSION) { echo $_SESSION['email']; } else { echo '*EMAIL'; } ?>" onfocus="if (this.value=='*EMAIL') this.value = ''" onblur="if (this.value=='') this.value = '*EMAIL'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="telefono" type="text" class="fields digits rounded noPlaceholder" id="telefono" style="background-image:url(images/icon-phone.png)" value="<?php if($_SESSION) { echo $_SESSION['telefono']; } else { echo 'TELEFONO'; } ?>" onfocus="if (this.value=='TELEFONO') this.value = ''" onblur="if (this.value=='') this.value = 'TELEFONO'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="ciudad" type="text" class="fields rounded noPlaceholder" id="ciudad" style="background-image:url(images/icon-ciudad.png)" value="<?php if($_SESSION) { echo $_SESSION['ciudad']; } else { echo 'ESTADO / CIUDAD'; } ?>" onfocus="if (this.value=='ESTADO / CIUDAD') this.value = ''" onblur="if (this.value=='') this.value = 'ESTADO / CIUDAD'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><textarea name="comentarios" cols="45" rows="5" class="fields rounded required noPlaceholder noPlaceholder2" id="comentarios" style="background-image:url(images/icon-comentarios.png)" onfocus="if (this.value=='*COMENTARIOS...') this.value = ''" onblur="if (this.value=='') this.value = '*COMENTARIOS...'">*COMENTARIOS...</textarea></td>
      </tr>
      <tr>
        <td align="center"><input name="button" type="submit" class="but rounded" id="button" value="Enviar" /></td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
    </table>
  </form>
<?php } ?>
</div>
<div class="content-box" style="padding-left:20px; padding-right:0; width:350px;">
<p><strong>Dirección:</strong> Av. Rómulo Gallegos. Horizonte. Caracas. <em>(Sólo fábrica).</em></p>
<p><strong>Email:</strong> <a href="mailto:diclaps@gmail.com" class="link">diclaps@gmail.com</a><br />
<strong>Teléfono local:</strong> 0212-8145879<br />
<strong>Representante de Ventas:</strong> 0412-9966033</p>
<p><img src="images/ico-facebook.png" width="20" height="20" align="absmiddle" /> &nbsp; <a href="https://www.facebook.com/cositas.d.bb" target="_blank" class="link" style="color:#336699">www.facebook.com/cositas.d.bb</a><br />
<img src="images/ico-g.png" width="20" height="20" align="absmiddle" /> &nbsp; <a href="//plus.google.com/u/0/112705391103519526224?prsrc=3" rel="publisher" target="_blank" class="link" style="color:#dd4d38">g+ &nbsp;(CositasDeBebe.com)</a></p>
<p><img src="images/img-contact-bird.png" width="212" height="161" hspace="70" /></p></div>
</div>

<?php include ('includes/footer.php') ?>
</body>
</html>
