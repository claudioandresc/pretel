<? include("../conexion.php");
   include("../includes/funciones.php"); 

if($_GET['act']==1){
if(($_POST['fecha']==NULL) or ($_POST['asunto']==NULL) or ($_POST['destinatarios']==NULL) or ($_POST['mensaje']==NULL)) { 
$mensaje='Debe llenar Todos los campos';
 }
else {
  $insertQuery=mysql_query("INSERT INTO mensajes (fecha,asunto,mensaje) VALUES ('$_POST[fecha]','$_POST[asunto]','$_POST[mensaje]')");

// INICIO CORREO

include("phpMailer/class.phpmailer.php");
//include("phpMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
//$mail->PluginDir = ""; // root of the smtp class
//$mail->IsSendmail(); // tell the class to use Sendmail
//$mail->SMTPKeepAlive = true;
//$mail->Mailer = "smtp"; // connect by smtp - Alternative to IsSMTP()

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Timeout    = 30;   // time in sec. default value is 10
/*
  $mail->Host       = "mail.articuloscristianos.com"; // SMTP server  -- mail.articuloscristianos.com   OR   localhost   OR   mail.interlink.net.ve --
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "articuloscristianos@gmail.com";  // GMAIL username
  $mail->Password   = "j3susf1sh";            // GMAIL password
*/  
  //$mail->AddReplyTo("articuloscristianos@gmail.com", "Articulos Cristianos");  // 
  $mail->AddAddress("novedades@cositasdebebe.com", "Cositas de Bebe");
  
  $emailz = explode(",",$_POST['destinatarios']);
  $mailCt = count($emailz);

  for($i=0; $i<$mailCt; $i++) {
  $tu= $emailz[$i];
  $mail->AddBCC($tu);
  }
  
  $mail->SetFrom("novedades@cositasdebebe.com", "Cositas de Bebe");
  $mail->Subject = $_POST['asunto'];
  $mail->AltBody = "Para ver este mensaje correctamente active la compatibilidad HTML en su email"; // optional - MsgHTML will create an alternate

$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#ffffff'><tr><td align='center'>";
$msg.= "<table width='640' border='0' cellpadding='0' cellspacing='0' align='center'>";
$msg.= "<tr><td valign='bottom' bgcolor='#ffffff'><a href='http://www.cositasdebebe.com' target='_blank'>";
$msg.= "<img src='http://www.cositasdebebe.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#ffffff' style='font-family:Verdana;font-size:12px;color:#4d3f10;padding:15px 40px;' align='left'>";
$msg.= $_POST['mensaje'];
$msg.= "<br /><p><em>Recibe un cordial saludo.<br /><strong><a href='http://www.cositasdebebe.com/' target='_blank'>CositasDeBebe.com</a></strong></em></p>";
$msg.= "<p style='font-size:11px'>S&iacute;guenos por <a href='https://www.facebook.com/cositas.d.bb' target='_blank'>";
$msg.= "<img src='http://cositasdebebe.com/images/ico-facebook.png' border='0' align='absmiddle' /></a></p></td></tr>";
$msg.= "<tr><td valign='top'><img src='http://www.cositasdebebe.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table>";
  
  //$mail->MsgHTML(file_get_contents('contents.html'));   OR   $mail->MsgHTML($msg);   OR   $mail->Body = $msg;
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment

  $mail->MsgHTML($msg);
  $mail->IsHTML(true); // send as HTML
  $status = $mail->Send();
  
if($status) { 
$mensaje='Mensaje Enviado';
 } 
else { 
$mensaje='(x) Error de Envio';
 } 

  }
}

if($_GET['act']==3){
  if($result=mysql_query("DELETE FROM mensajes WHERE idMsj='$_GET[id]'")){ 
$mensaje='Mensaje Eliminado';
   }
}

if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM mensajes WHERE idMsj='$_GET[id]'");
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
<title>Administrador de Contenidos - Cositas de Bebe - Pretel</title>
<?php include ('includes/header-code.php') ?>
</head>

<body>
<div id="main" class="common" style="height:780px;">
<?php include ('includes/header.php') ?>

<div id="content">
<h1>Mensajes</h1>
<?php if ($mensaje) { ?>
<center><span class="link"><?php echo $mensaje; ?></span></center>
<?php echo "<script language=\"javascript\">setTimeout(\"window.location='mensajes.php'\",15)</script>"; } else { ?>
<form id="adminForm" name="adminForm" method="post" action="?<?=$action?>">
<label class="txt-error-msg"><div class="link" style="position:absolute; margin-left:450px; margin-top:-7px;">Ej. 2014-01-20</div><input name="fecha" type="text" class="fields2 rounded required date" id="fecha" value="<?php if($_GET['e']==1) { echo $d['fecha']; } else { echo date('Y-m-d'); } ?>" style="background-image:url(../images/icon-fecha.png)" onfocus="if (this.value=='FECHA') this.value = ''" onblur="if (this.value=='') this.value = 'FECHA'" /> </label>
<br />
<label class="txt-error-msg"><input name="asunto" type="text" class="fields rounded required noPlaceholder" id="asunto" value="<?php if($_GET['e']==1) { echo $d['asunto']; } else { echo 'ASUNTO'; } ?>" style="background-image:url(../images/icon-asunto.png)" onfocus="if (this.value=='ASUNTO') this.value = ''" onblur="if (this.value=='') this.value = 'ASUNTO'" /></label>
<br />
<label class="txt-error-msg"><textarea name="destinatarios" cols="45" rows="5" class="fields rounded required" id="destinatarios" style="background-image:url(../images/icon-email.png)"><? $buscar=mysql_query("SELECT email FROM clientes WHERE promos='1'");
while($datos=mysql_fetch_array($buscar)){?><?=$datos['email']?>,<? } ?>diclaps@gmail.com</textarea></label>
<br />
<label class="txt-error-msg"><textarea name="mensaje" cols="45" rows="10" class="fields rounded required noPlaceholder" id="mensaje" style="background-image:url(../images/icon-mensaje.png)" onfocus="if (this.value=='MENSAJE') this.value = ''" onblur="if (this.value=='') this.value = 'MENSAJE'"><?php if($_GET['e']==1) { echo $d['mensaje']; } else { echo 'MENSAJE'; } ?></textarea></label>
<br />
<input name="button" type="submit" class="but rounded" id="button" value="Enviar" <? if($_GET['e']==1){ echo 'disabled'; } ?> />
</form>
<?php } ?>
<div class="listado">
<h2>Mensajes Enviados (<?php echo cuantos_items('mensajes'); ?>)</h2>
<blockquote>
<?php $buscar=mysql_query("SELECT * FROM mensajes ORDER BY fecha ASC");
	while($datos=mysql_fetch_array($buscar)){?>
<p class="list-items">
<a href="?act=3&id=<?=$datos['idMsj']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idMsj']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span style="font-size:14px;">[<?=$datos['fecha']?>]</span>&nbsp; - &nbsp;<?=$datos['asunto']?></p>
<?php } ?>
</blockquote>
</div>
</div>

<?php include ('includes/footer.php') ?>
</div>
</body>
</html>