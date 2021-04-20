<?php 
include("conexion.php");
session_start();

if($_GET['act']==1){

$emailin = mysql_real_escape_string($_POST["email"]);
$clavein = mysql_real_escape_string($_POST["pass"]);

if (($emailin==NULL) or ($clavein==NULL)) {
echo '<script type="text/javascript">window.location="msjs.php?msj=entrar1"</script>';
}
else {
$buscar = mysql_query("SELECT * FROM clientes WHERE email='$emailin' AND clave='$clavein'");
$datos = mysql_fetch_array($buscar);
if(($datos['clave']) != $clavein) {
mysql_free_result($buscar);
echo '<script type="text/javascript">window.location="msjs.php?msj=entrar2"</script>';
} 
else {
$buscar = mysql_query("SELECT * FROM clientes WHERE email='$emailin' AND clave='$clavein'");
$datos = mysql_fetch_array($buscar);
$_SESSION['bebe'] = $datos['nombre'];
$_SESSION['idU'] = $datos['idUser'];
$_SESSION['empresa'] = $datos['empresa'];
$_SESSION['nombre'] = $datos['nombre'];
$_SESSION['apellido'] = $datos['apellido'];
$_SESSION['cedula'] = $datos['cedula'];
$_SESSION['email'] = $datos['email'];
$_SESSION['ciudad'] = $datos['ciudad'];
$_SESSION['telefono'] = $datos['telefono'];
$_SESSION['direccion'] = $datos['direccion'];
echo '<script type="text/javascript">window.parent.location="index.php"</script>';
	}
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ingresa a tu Cuenta</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#registro").validate();
	
	$('#pass').focus(
      function(){
        $(this).css('background-image', 'url(images/icon-pass.png)');
    });

    $('#pass').blur(
      function(){
        if ($(this).prop('type', 'password').val()=='') {
		$(this).css('background-image', 'url(images/input-pass-txt.png)');
		}
    });
	
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
      <td colspan="2" style="border-bottom:dotted 1px #fff;">
        <h1>Entra en tu Cuenta</h1></td>
    </tr>
    <tr>
      <td height="5" colspan="2"><img src="images/bird-1b.png" border="0" style="position:absolute; margin-left:345px; margin-top:-9px;" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="txt-error-msg"><input name="email" type="text" class="fields rounded required email noPlaceholder" id="email" style="background-image:url(images/icon-email.png)" value="EMAIL" onfocus="if (this.value=='EMAIL') this.value = ''" onblur="if (this.value=='') this.value = 'EMAIL'" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="txt-error-msg"><input name="pass" type="password" class="fields rounded required noPlaceholder" id="pass" maxlength="20" style="background-image:url(images/input-pass-txt.png)" /></td>
    </tr>
    <tr>
      <td width="190" align="center" style="padding-top:10px;"><a href="olvido-datos.php" class="link2">¿Olvidó sus datos?</a></td>
      <td width="202" align="center" style="padding-top:10px;"><input name="button" type="submit" class="but rounded" id="button" value="Entrar" /></td>
    </tr>
  </table>
</form>
</body>
</html>
