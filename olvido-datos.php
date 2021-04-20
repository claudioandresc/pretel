<?php
include("conexion.php");
include ('includes/funciones.php'); 

if($_GET['act']==1){
$Email = mysql_real_escape_string($_POST['email']);

if($Email=='') { 
echo '<script type="text/javascript">window.location="msjs.php?msj=olvido1"</script>';
}
else {
if(existe_email($Email)==0) {
echo '<script type="text/javascript">window.location="msjs.php?msj=olvido2"</script>';
}
else {
$buscar=mysql_query("SELECT * FROM clientes WHERE email='$Email'");
while($d = mysql_fetch_array($buscar)) {


// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $d['email'];
$asunto = "Recordatorio de Clave - CositasDeBebe.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#ffffff'><tr><td align='center'>";
$msg.= "<table width='640' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#ffffff'><a href='http://www.cositasdebebe.com' target='_blank'>";
$msg.= "<img src='http://www.cositasdebebe.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#ffffff' style='padding:0px 40px; color:#006699;'><b>&iexcl;Hola ".$d['nombre']."!</b><br />";
$msg.= "Has solicitado recordar los datos de acceso a tu cuenta en <b>CositasDeBebe.com</b>:<br /><br />";
$msg.= "<b>- EMAIL:</b>  ".$d['email']."<br />";
$msg.= "<b>- CLAVE:</b>  ".$d['clave']."<br /><br />";
$msg.= "Te recomendamos tenerlos a la mano para cuando nos visites.<br />Un Cordial Saludo.<br /><br />";
$msg.= "<a href='http://www.cositasdebebe.com' target='_blank' style='text-decoration:none;'><b>CositasDeBebe.com</b></a></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.cositasdebebe.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: CositasDeBebe.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO

echo '<script type="text/javascript">window.location="msjs.php?msj=olvido3"</script>';
	  }
	}
  }
}


if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM clientes WHERE idUser='mysql_real_escape_string($_GET[id])'");
  $d=mysql_fetch_array($result);
  $action="act=2&id=".$_GET['id'];
}  
else{
  $action="act=1";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Olvido sus Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#registro").validate();
  });
  
$.validator.addMethod(
    'noPlaceholder', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
</script>
</head>

<body>
<form id="registro" name="registro" method="post" action="?act=1">
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td style="border-bottom:solid 1px #fff;">
        <h1>&iquest;Olvido sus datos?</h1></td>
    </tr>
    <tr>
      <td height="5"><img src="images/bird-1b.png" border="0" style="position:absolute; margin-left:345px; margin-top:-10px;" /></td>
    </tr>
    <tr>
      <td align="center" style="font-size:16px;">Introduce tu email a continuaci&oacute;n y te<br />
      haremos llegar tu información.</td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="email" type="text" style="width:340px; background-image:url(images/icon-email.png);" class="fields rounded required email noPlaceholder" id="email" value="EMAIL" onfocus="if (this.value=='EMAIL') this.value = ''" onblur="if (this.value=='') this.value = 'EMAIL'" /></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:10px;"><input name="button" type="submit" class="but rounded" id="button" value="Enviar" /></td>
    </tr>
  </table>
</form>
</body>
</html>
