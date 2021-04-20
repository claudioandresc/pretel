<?php 
include("conexion.php"); 
include("includes/funciones.php");
session_start();

if ($_GET['id']!=$_SESSION['idU']) {
	echo '<script language="javascript">window.location="index.php"</script>';
}

if($_GET['act']==1){

$Nombre = mysql_real_escape_string($_POST['nombre']);
$Apellido = mysql_real_escape_string($_POST['apellido']);
$Email = mysql_real_escape_string($_POST['email']);
$Cedula = mysql_real_escape_string($_POST['cedula']);
$Telefono = mysql_real_escape_string($_POST['telefono']);
$Ciudad = mysql_real_escape_string($_POST['ciudad']);
$Direccion = mysql_real_escape_string($_POST['direccion']);
$Clave = mysql_real_escape_string($_POST['clave']);

if(($Nombre==NULL) or ($Nombre=='NOMBRE DE LA EMPRESA') or ($Apellido==NULL) or ($Apellido=='AREA O RUBRO DE LA EMPRESA') or ($Email==NULL) or ($Email=='EMAIL') or ($Cedula==NULL) or ($Cedula=='RIF') or ($Telefono==NULL) or ($Telefono=='TELEFONO') or ($Ciudad==NULL) or ($Ciudad=='ESTADO / CIUDAD') or ($Direccion==NULL) or ($Direccion=='DIRECCION EXACTA DE ENTREGA') or ($Clave==NULL)) { $msj=1; }
elseif ((existe_email($Email)==1) || (existe_cedula($Cedula)==1)) { $msj=2; }
else {
$insertQuery=mysql_query("INSERT INTO clientes (nombre,apellido,email,cedula,telefono,ciudad,direccion,clave,empresa,promos) VALUES ('$Nombre','$Apellido','$Email','$Cedula','$Telefono','$Ciudad','$Direccion','$Clave','$_POST[empresa]','$_POST[promos]')");

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $Email;
$asunto = "Su REGISTRO en CositasDeBebe.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#ffffff'><tr><td align='center'>";
$msg.= "<table width='640' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom'><a href='http://www.cositasdebebe.com' target='_blank'>";
$msg.= "<img src='http://www.cositasdebebe.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td style='padding:0px 40px; color:#006699;'><b>&iexcl;Hola ".$Nombre."!</b><br />";
$msg.= "Bienvenid@ a <b>CostiasDeBebe.com</b><br /><br />";
$msg.= "Gracias por registrarte con nosotros.<br />";
$msg.= "Ahora podr&aacute;s disfrutar de todos nuestros beneficios y estar&aacute;s al tanto de todas nuestras ofertas<br />y promociones.";
$msg.= "<p>Te recordamos tus datos de acceso:<br />";
$msg.= "<b>- EMAIL:</b>  ".$Email."<br />";
$msg.= "<b>- CLAVE:</b>  ".$Clave."</p>";
$msg.= "<p>Te recomendamos tenerlos a la mano para cuando nos visites.<br />Un Cordial Saludo.<br /><br />";
$msg.= "<a href='http://www.cositasdebebe.com' target='_blank' style='text-decoration:none;'><b>CositasDeBebe.com</b></a></p></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.cositasdebebe.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: CositasDeBebe.com\r\n";
// $encabezado.= "Bcc: info@articuloscristianos.com,articuloscristianos@gmail.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO
  
$msj=3;

  }
}


// ACTUALIZACION DE DATOS DEL CLIENTE

if($_GET['act']==2){

$Nombre = mysql_real_escape_string($_POST['nombre']);
$Apellido = mysql_real_escape_string($_POST['apellido']);
$Email = mysql_real_escape_string($_POST['email']);
$Cedula = mysql_real_escape_string($_POST['cedula']);
$Telefono = mysql_real_escape_string($_POST['telefono']);
$Ciudad = mysql_real_escape_string($_POST['ciudad']);
$Direccion = mysql_real_escape_string($_POST['direccion']);
$Clave = mysql_real_escape_string($_POST['clave']);

if(($Nombre==NULL) or ($Nombre=='NOMBRE DE LA EMPRESA') or ($Apellido==NULL) or ($Apellido=='AREA O RUBRO DE LA EMPRESA') or ($Email==NULL) or ($Email=='EMAIL') or ($Cedula==NULL) or ($Cedula=='RIF') or ($Telefono==NULL) or ($Telefono=='TELEFONO') or ($Ciudad==NULL) or ($Ciudad=='ESTADO / CIUDAD') or ($Direccion==NULL) or ($Direccion=='DIRECCION EXACTA DE ENTREGA') or ($Clave==NULL)) { $msj=1; }
else {
$edit=mysql_query("UPDATE clientes SET nombre='$Nombre',apellido='$Apellido',email='$Email',cedula='$Cedula',telefono='$Telefono',ciudad='$Ciudad',direccion='$Direccion',clave='$Clave',empresa='$_POST[empresa]',promos='$_POST[promos]' WHERE idUser='$_GET[id]'");

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $Email;
$asunto = "Sus datos actualizados en CositasDeBebe.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#ffffff'><tr><td align='center'>";
$msg.= "<table width='640' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:verdana;font-size:12px;'>";
$msg.= "<tr><td valign='bottom'><a href='http://www.cositasdebebe.com' target='_blank'>";
$msg.= "<img src='http://www.cositasdebebe.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td style='padding:0px 40px; color:#006699;'><b>&iexcl;Hola ".$Nombre."!</b><br /><br />";
$msg.= "Tu informaci&oacute;n de registro en <b>CositasDeBebe.com</b> se actualiz&oacute; exitosamente.<br />";
$msg.= "Para acceder a tu cuenta, recuerda tus datos:<br /><br />";
$msg.= "<b>- EMAIL:</b>  ".$Email."<br />";
$msg.= "<b>- CLAVE:</b>  ".$Clave."<br /><br />";
$msg.= "Te recomendamos tenerlos a la mano para cuando nos visites.<br />Un Cordial Saludo.<br /><br />";
$msg.= "<a href='http://www.cositasdebebe.com' target='_blank' style='text-decoration:none;'><b>CositasDeBebe.com</b></a></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.cositasdebebe.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: CositasDeBebe.com\r\n";
//$encabezado.= "Bcc: info@articuloscristianos.com,articuloscristianos@gmail.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8' . "\r\n";

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO

$msj=4;

  }
}

if(($_GET['e']==1) and ($_SESSION['bebe']!="") and ($_SESSION['idU']==$_GET['id'])){
  $result = mysql_query("SELECT * FROM clientes WHERE idUser='$_GET[id]'");
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro - Persona Jurídica</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#registro").validate({
      rules: {
            clave1: 'required',
            clave: {
                  required: true,
                  equalTo: '#clave1'
            }
      }});
	  
	  $('#clave1').focus(
      function(){
        $(this).css('background-image', 'url(images/icon-pass.png)');
    });

    $('#clave1').blur(
      function(){
        if ($(this).prop('type', 'password').val()=='') {
		$(this).css('background-image', 'url(images/input-pass-txt.png)');
		}
    });
	
	$('#clave').focus(
      function(){
        $(this).css('background-image', 'url(images/icon-pass2.png)');
    });

    $('#clave').blur(
      function(){
        if ($(this).prop('type', 'password').val()=='') {
		$(this).css('background-image', 'url(images/input-pass-txt2.png)');
		}
    });
	  
});
  
<?php if ($_SESSION['bebe']=="") { ?>
$.validator.addMethod(
    'noPlaceholder', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
<? } ?>
</script>
</head>

<body>
<form id="registro" name="registro" method="post" action="?<?=$action?>">
<input name="empresa" type="hidden" id="empresa" value="1" />
  <table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
      <td><img src="images/bird-1b.png" border="0" style="position:absolute; margin-left:345px; margin-top:5px;" />
      <h1>Datos de Registro</h1></td>
    </tr>
    <?php if ((($_GET['act']==1) || ($_GET['act']==2)) && ($msj==1)) { ?>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="200" align="center" valign="middle" class="txt" bgcolor="#d2e5ff">
      <b>(x) Registro Fallido.</b><br />
	  Debes llenar correctamente <u>todos</u> los campos.
	  <p><a href="<?php if ($_SESSION['bebe']) { echo 'registro-juridica.php?e=1&id='.$_SESSION['idU']; } else { echo 'registro-juridica.php'; } ?>" class="link">Intenta nuevamente</a></p>
      </td>
    </tr>
    <?php } elseif (($_GET['act']==1) && ($msj==2)) { ?>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="200" align="center" valign="middle" class="txt" bgcolor="#d2e5ff">
      <b>(x) Registro Fallido.</b><br />
      <br />
      Tu <u>email ó RIF ya esta registrado<br />
      </u>en nuestro sistema.
      <p><a href="olvido-datos.php" class="link">&iquest;Olvid&oacute; sus datos?</a> &nbsp; | &nbsp; 
      <a href="registro-juridica.php" class="link3">Intenta nuevamente</a></p> 
      </td>
    </tr>
    <?php } elseif (($_GET['act']==1) && ($msj==3)) { ?>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="200" align="center" valign="middle" class="txt" bgcolor="#d2e5ff">
      <b>&iexcl;Registro Exitoso!</b><br />
	  Ahora podr&aacute;s disfrutar de todos nuestros beneficios<br />
      y estar al tanto de nuestras ofertas.<br /><p><strong>&iexcl;Muchas Gracias!</strong>
	  <p><a href="entrar.php" class="link"><strong>Entrar ahora</strong></a> &nbsp; | &nbsp; <a href="index.php" target="_parent" class="link">Salir(x)</a></p>
      </td>
    </tr>
    <?php } elseif (($_GET['act']==2) && ($msj==4)) { ?>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="200" align="center" valign="middle" class="txt" bgcolor="#d2e5ff">
      <b>Datos Actualizados.</b><br />
	  Tus datos se han actualizado exitosamente.<br />
	  <p><a href="index.php" target="_parent" class="link">[Continuar]</a></p>
      </td>
    </tr>
    <?php } else { 
    if ($_SESSION['bebe']=="") { ?>
    <tr>
      <td align="center" class="box">Para registrarse como Persona Natural,<br />
        <a href="registro.php" class="link">haga click aquí</a></td>
    </tr>
    <? } ?>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required noPlaceholder" id="nombre" style="background-image:url(images/icon-company.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['nombre']; } else { echo 'NOMBRE DE LA EMPRESA'; } ?>" onfocus="if (this.value=='NOMBRE DE LA EMPRESA') this.value = ''" onblur="if (this.value=='') this.value = 'NOMBRE DE LA EMPRESA'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="apellido" type="text" class="fields rounded required noPlaceholder" id="apellido" style="background-image:url(images/icon-company2.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['apellido']; } else { echo 'AREA O RUBRO DE LA EMPRESA'; } ?>" onfocus="if (this.value=='AREA O RUBRO DE LA EMPRESA') this.value = ''" onblur="if (this.value=='') this.value = 'AREA O RUBRO DE LA EMPRESA'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="email" type="text" class="fields rounded required email noPlaceholder" id="email" style="background-image:url(images/icon-email.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['email']; } else { echo 'EMAIL'; } ?>" onfocus="if (this.value=='EMAIL') this.value = ''" onblur="if (this.value=='') this.value = 'EMAIL'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="cedula" type="text" class="fields rounded required noPlaceholder" id="cedula" style="background-image:url(images/icon-rif.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['cedula']; } else { echo 'RIF'; } ?>" onfocus="if (this.value=='RIF') this.value = ''" onblur="if (this.value=='') this.value = 'RIF'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="telefono" type="text" class="fields rounded required noPlaceholder" id="telefono" style="background-image:url(images/icon-phone.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['telefono']; } else { echo 'TELEFONO'; } ?>" onfocus="if (this.value=='TELEFONO') this.value = ''" onblur="if (this.value=='') this.value = 'TELEFONO'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="ciudad" type="text" class="fields rounded required noPlaceholder" id="ciudad" style="background-image:url(images/icon-ciudad.png)" value="<?php if ($_SESSION['bebe']!="") { echo $d['ciudad']; } else { echo 'ESTADO / CIUDAD'; } ?>" onfocus="if (this.value=='ESTADO / CIUDAD') this.value = ''" onblur="if (this.value=='') this.value = 'ESTADO / CIUDAD'" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><textarea name="direccion" class="fields rounded required noPlaceholder" id="direccion" style="background-image:url(images/icon-direccion.png)" cols="45" rows="5" onfocus="if (this.value=='DIRECCION EXACTA DE ENTREGA') this.value = ''" onblur="if (this.value=='') this.value = 'DIRECCION EXACTA DE ENTREGA'"><?php if ($_SESSION['bebe']!="") { echo $d['direccion']; } else { echo 'DIRECCION EXACTA DE ENTREGA'; } ?></textarea></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="clave1" type="password" class="fields rounded required noPlaceholder" id="clave1" style="background-image:<?php if ($_SESSION['bebe']!="") { echo 'url(images/icon-pass.png)'; } else { echo 'url(images/input-pass-txt.png)'; } ?>" value="<?php if ($_SESSION['bebe']!="") { echo $d['clave']; } ?>" maxlength="20" /></td>
    </tr>
    <tr>
      <td align="center" class="txt-error-msg"><input name="clave" type="password" class="fields rounded required noPlaceholder" id="clave" style="background-image:<?php if ($_SESSION['bebe']!="") { echo 'url(images/icon-pass2.png)'; } else { echo 'url(images/input-pass-txt2.png)'; } ?>" value="<?php if ($_SESSION['bebe']!="") { echo $d['clave']; } ?>" maxlength="20" /></td>
    </tr>
    <tr>
    	<td align="center" style="color:#006699; padding-top:7px; padding-bottom:15px; font-size:16px;">
<input name="promos" type="checkbox" id="promos" value="1" <?php if (($_SESSION['bebe']!="") && ($d['promos']==0)) { echo ''; } else { echo 'checked="checked"'; } ?> /> Deseo recibir promociones por Email
        </td>
    </tr>
    <tr>
      <td align="center"><input name="button" type="submit" class="but rounded" id="button" value="Enviar" <? if ($_SESSION['idU']!=$_GET['id']) { echo 'disabled="disabled"'; } ?> /></td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>