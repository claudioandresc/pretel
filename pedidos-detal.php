<?php
include("conexion.php");
session_start();
/*
if ($_SESSION['bebe']=="") {
echo '<script language="javascript">window.location="index.php"</script>';
}
*/
if($_GET['act']==1){

if(($_POST['nombre']==NULL) or ($_POST['nombre']=='NOMBRE') or ($_POST['cedula']==NULL) or ($_POST['cedula']=='CEDULA o RIF') or ($_POST['telefono']==NULL) or ($_POST['telefono']=='TELEFONO') or ($_POST['email']==NULL) or ($_POST['email']=='EMAIL') or ($_POST['ciudad']==NULL) or ($_POST['ciudad']=='ESTADO / CIUDAD') or ($_POST['direccion']==NULL) or ($_POST['direccion']=='DIRECCION DE ENTREGA' or ($_POST['granTotal']==NULL) or ($_POST['granTotal']==0.00))) { $mensaje=1; }  //  or ($_POST['granTotal']==NULL) or ($_POST['granTotal']==0.00)

else {

// INICIO CORREO
												
$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $_POST['email'];
$asunto = "PEDIDO de ".$_POST['nombre']." - CositasDeBebe.com";

$msg.= "<html><body>";
$msg.= "<table width='100%' border='0' cellpadding='30' cellspacing='0' align='center' bgcolor='#ffffff'><tr><td align='center'>";
$msg.= "<table width='640' border='0' cellpadding='0' cellspacing='0' align='center' style='font-family:Verdana;font-size:11px;color:#000000;'>";
$msg.= "<tr><td valign='bottom' bgcolor='#ffffff'><a href='http://www.cositasdebebe.com' target='_blank'>";
$msg.= "<img src='http://www.cositasdebebe.com/images/emails/head-email.jpg' border='0' /></a></td></tr>";
$msg.= "<tr><td bgcolor='#ffffff' style='padding-left:20px;padding-top:20px;padding-bottom:15px;line-height:18px;' align='left'>";
$msg.= "<p style='font-size:14px;margin-top:0px;'><b>Nota de Pedido / Solicitud de Cotizaci&oacute;n</b> - ";
$msg.= "<span style='font-size:10px;'>".date('Y-m-d')."</span></p>\n\n";

$msg.= "<b>Nombre: &nbsp;</b>".$_POST['nombre']."<br />\n";
$msg.= "<b>C&eacute;dula / RIF: &nbsp;</b>".$_POST['cedula']."<br />\n";
$msg.= "<b>Tel&eacute;fono: &nbsp;</b>".$_POST['telefono']."<br />\n";
$msg.= "<b>Email: &nbsp;</b>".$_POST['email']."<br />\n";
$msg.= "<b>Estado / Ciudad: &nbsp;</b>".$_POST['ciudad']."<br />\n";
$msg.= "<b>Direcci&oacute;n: &nbsp;</b>".$_POST['direccion']."<br /><br />\n\n";

$msg.= "<table width='600' border='0' cellpadding='3' cellspacing='0' style='font-family:Verdana;font-size:11px;'>";
$msg.= "<tr style='color:#006699;'><td align='left' height='20'><b>Productos</b></td><td align='center'><b>Cant.</b></td>";
$msg.= "<td align='right'><b>Precio (Bs.F)</b></td><td align='right'><b>Total (Bs.F)&nbsp;</b></td></tr>";

$buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY nombre ASC");
while($datos=mysql_fetch_array($buscar)){
if ($_POST[$datos['idProd']]==1){
$msg.= "<tr>";
$msg.= "<td align='left' width=''><span style='color:#666666;'>Ref. ".$datos['ref']."</span>&nbsp; - &nbsp;".$datos['nombre']."</td>";
$msg.= "<td align='center' width=''>".$_POST['cant'.$datos['idProd']]."</td>";
$msg.= "<td align='right' width=''>".$datos['precioD']."</td>";
$msg.= "<td align='right' width=''><b>".$_POST['ptotal'.$datos['idProd']]."</b></td>";
$msg.= "</tr>";
	}
}
$msg.= "<tr bgcolor='#ffffff'><td height='20'></td><td></td><td align='right' style='font-size:11px;'><b>IVA</b></td>";
$msg.= "<td align='right' style='font-size:12px;color:#999999;'><b>".$_POST['iva']."</b></td></tr>";
$msg.= "<tr bgcolor='#ffffff'><td height='20'></td><td></td><td align='right' style='font-size:12px;'><b>TOTAL Bs.F</b></td>";
$msg.= "<td align='right' style='font-size:12px;color:#ef773a;'><b>".$_POST['granTotal']."</b></td></tr>";
$msg.= "</table>";

$msg.= "</td></tr><tr><td valign='top'><img src='http://www.cositasdebebe.com/images/emails/footer-email.jpg' /></td></tr></table>";
$msg.= "</td></tr></table></body></html>";

$encabezado = "From: CositasDeBebe.com\r\n";
$encabezado.= "Bcc: diclaps@gmail.com,claudioandrescastillos@gmail.com\r\n";
$encabezado.= 'MIME-Version: 1.0' . "\r\n";
$encabezado.= 'Content-type:text/html; charset=utf-8';

mail($to, $asunto, $msg, $encabezado);

// FIN CORREO
  
$mensaje=2;

  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pedidos al Detal - Cositas de Bebe - Pretel</title>
<meta name="description" content="En CositasDeBebe.com vendemos Ropa de Bebe al Mayor y al Detal, confeccionamos con los más altos estandaresde calidad y despechamos a toda Venezuela. Desde el 2006, Pretel como marca se ha dedicado a la fabricación y confección de ropa de bebe para niños y niñas, cuidando cada detalle, cada accesorio y todo lo relacionado con su presentación, despacho y distribución a nivel nacional." />
<meta name="keywords" content="bebe, ropa, ropita, cositas, niños, niñas, gorritos, conjuntos, manoplas, almillas, vestidos, confección, pretel" />
<?php include ('includes/header-code.php') ?>
<script type="text/javascript" src="scripts/jquery.calculation.js"></script>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript" src="scripts/pedido.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#pedidoForm").validate();
	
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
  
/*
$.validator.addMethod(
    'noPlaceholder', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
*/
</script>
</head>

<body>
<div id="main" class="common">
<?php include ('includes/header.php') ?>
<a name="pedidos" id="pedidos"></a>
<div id="content">
<h1>Sección de Pedidos &raquo;</h1>
<?php if (($_SESSION['bebe']) &&  ($_GET['act']=='')) { ?>
<div id="pedido-type">
Si deseas comprar al Mayor, haz <a href="pedidos.php#pedidos" class="link">click aquí</a>
</div>
<?php } ?>
<div class="content-box" style="margin-left:500px; padding-right:0; width:380px; position:absolute; <?php //if ($_SESSION['bebe']=="") { echo 'filter: Alpha(Opacity=40); -moz-opacity:.4; opacity:.4;' } ?>">
<p align="center" style="border:dashed 1px #006699; font-size:20px; margin-top:10px; margin-bottom:0;" class="link"><strong>TE RECORDAMOS:</strong></p>
<p align="left" style="line-height:40px; font-size:19px;">&#8226; Espera nuestra confirmaci&oacute;n antes de pagar.<br />
&#8226; Nuestros precios No incluyen IVA.<br />
&#8226; El envío esta a cargo del comprador.<br />
&#8226; Puedes actualizar tus datos de registro <a href="<?php if($_SESSION['empresa']==1) { echo 'registro-juridica.php?e=1&id='.$_SESSION['idU']; } else { echo 'registro.php?e=1&id='.$_SESSION['idU']; } ?>" class="regframe link">aquí</a><br />
&#8226; Recuerda seleccionar la casilla &quot;<em>Comprar</em>&quot;<br />
<span style="line-height:normal;">&#8226; En la columna &quot;<em>Cantidad</em>&quot; introduce el<br />
<span style="padding-left:15px;">número de piezas que deseas comprar.</span></span></p>
</div>

<div class="content-box">
<?php if ($_SESSION['bebe']=="") { ?>
<p align="center" style="margin:50px auto; text-align:center; font-size:24px;"><strong>Para enviar tu Pedido debes<br />
    estar registrado.</strong><br /><br />
<a href="entrar.php" class="regframe" style="color:#006600; font-size:16px;"><strong>[+] Ya estoy registrado, quiero ingresar</strong></a>.<br />
<a href="registro.php" class="regframe" style="color: #CC6633; font-size:16px;"><strong>[x] No estoy registrado, quiero hacerlo</strong></a>.&nbsp;</p>

<?php } elseif (($_GET['act']==1) && ($mensaje==2)) { ?>
<p align="center" style="margin-top:50px; text-align:center; font-size:22px;"><strong>Hemos recibido tu Pedido.</strong><br />
      Una copia ha sido enviada a tu email.<br /><br />
      <strong>Espera nuestra confirmaci&oacute;n para<br />
proceder con el pago.</strong>
      <p align="center" style="font-size:22px;"><em>Muchas Gracias.</em></p>

<?php } elseif (($_GET['act']==1) && ($mensaje==1)) { ?>
<p align="center" style="margin:50px auto; text-align:center;"><strong>(x) Error de Env&iacute;o.</strong><br />
Debes llenar tus datos correctamente y<br />
	Seleccionar los Productos a Comprar.<br /><br />
<a href="pedidos.php" class="link3">Intenta nuevamente</a></p>

<?php } else { ?>
  <form id="pedidoForm" name="pedidoForm" method="post" action="?act=1">
    <table width="390" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td height="5"></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required" id="nombre" style="background-image:url(<?php if($_SESSION['empresa']==1) { echo 'images/icon-company.png'; } else { echo 'images/icon-avatar.png'; } ?>)" value="<?php if($_SESSION) { if($_SESSION['empresa']==1) { echo $_SESSION['nombre']; } else { echo $_SESSION['nombre'].' '; echo $_SESSION['apellido']; } } else { echo 'NOMBRE'; } ?>" onfocus="if (this.value=='NOMBRE') this.value = ''" onblur="if (this.value=='') this.value = 'NOMBRE'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="cedula" type="text" class="fields rounded required" id="cedula" style="background-image:url(images/icon-rif.png)" value="<?php if($_SESSION) { echo $_SESSION['cedula']; } else { echo 'CEDULA o RIF'; } ?>" onfocus="if (this.value=='CEDULA o RIF') this.value = ''" onblur="if (this.value=='') this.value = 'CEDULA o RIF'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="telefono" type="text" class="fields rounded required" id="telefono" style="background-image:url(images/icon-phone.png)" value="<?php if($_SESSION) { echo $_SESSION['telefono']; } else { echo 'TELEFONO'; } ?>" onfocus="if (this.value=='TELEFONO') this.value = ''" onblur="if (this.value=='') this.value = 'TELEFONO'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="email" type="text" class="fields rounded required email" id="email" style="background-image:url(images/icon-email.png)" value="<?php if($_SESSION) { echo $_SESSION['email']; } else { echo 'EMAIL'; } ?>" onfocus="if (this.value=='EMAIL') this.value = ''" onblur="if (this.value=='') this.value = 'EMAIL'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><input name="ciudad" type="text" class="fields rounded required" id="ciudad" style="background-image:url(images/icon-ciudad.png)" value="<?php if($_SESSION) { echo $_SESSION['ciudad']; } else { echo 'ESTADO / CIUDAD'; } ?>" onfocus="if (this.value=='ESTADO / CIUDAD') this.value = ''" onblur="if (this.value=='') this.value = 'ESTADO / CIUDAD'" /></td>
      </tr>
      <tr>
        <td class="txt-error-msg"><textarea name="direccion" cols="45" rows="5" class="fields rounded required" id="direccion" style="background-image:url(images/icon-direccion.png)" onfocus="if (this.value=='DIRECCION DE ENTREGA') this.value = ''" onblur="if (this.value=='') this.value = 'DIRECCION DE ENTREGA'"><?php if($_SESSION) { echo $_SESSION['direccion']; } else { echo 'DIRECCION DE ENTREGA'; } ?></textarea></td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
      </tr>
    </table>
</div>

<div id="pedido-msj" class="rounded">
A continuaci&oacute;n, selecciona los productos que deseas <strong class="link3">comprar</strong> e indica la <strong class="link3">cantidad</strong> o unidades por cada producto.<br />Luego haz click en &quot;<strong class="link3">Enviar Pedido</strong>&quot; al final de esta p&aacute;gina y espera nuestra confirmaci&oacute;n.
</div>

<div id="pedido-list">
<div class="pedido-common">
<div class="cols-tit" style="width:400px;">Productos</div>
<div class="cols-tit" style="width:80px; text-align:center">Comprar</div>
<div class="cols-tit" style="width:100px; text-align:center;">Cantidad</div>
<div class="cols-tit" style="width:135px; text-align:right">Precio (Bs.F)</div>
<div class="cols-tit" style="width:135px; text-align:right;">Total (Bs.F)</div>
</div>
		<? $buscar=mysql_query("SELECT * FROM productos WHERE status='A' ORDER BY categoria DESC");
		   while($datos=mysql_fetch_array($buscar)){ ?>
<div class="pedido-common">
<div class="cols" style="width:400px;"><a href="foto-zoom.php?pic=<?=$datos['fotoG']?>" class="zoom" title="== Ref. <?=$datos['ref']?> - <?=$datos['nombre']?> == &nbsp; <?=$datos['descripcion']?>"><img src="images/icon-foto.png" align="absmiddle" border="0" alt="Ref. <?=$datos['ref']?> - <?=$datos['nombre']?>" title="Ref. <?=$datos['ref']?> - <?=$datos['nombre']?>" /></a> - <span class="link" style="font-size:14px;">Ref. <?=$datos['ref']?></span> - <?=$datos['nombre']?></div>
<div class="cols" style="width:80px; text-align:center"><input type="checkbox" name="<?=$datos['idProd']?>" id="<?=$datos['idProd']?>" value="1" class="comprarChk" onclick="recalc(id);" /></div>
<div class="cols" style="width:100px; text-align:center;"><input id="cant<?=$datos['idProd']?>" name="cant<?=$datos['idProd']?>" type="text" class="fields-pedido rounded" style="width:40px; text-align:center;" value="1" maxlength="4" onblur="recalc(<?=$datos['idProd']?>);" /></div>
<div class="cols" style="width:135px; text-align:right;"><input id="precio<?=$datos['idProd']?>" name="precio<?=$datos['idProd']?>" type="text" class="fields-pedido rounded" style="width:100px;" readonly="readonly" value="<?=$datos['precioD']?>" /></div>
<div class="cols" style="width:135px; text-align:right;"><input id="ptotal<?=$datos['idProd']?>" name="ptotal<?=$datos['idProd']?>" type="text" class="fields-pedido rounded field-pedidos-total" style="width:100px;" readonly="readonly" /></div>
</div>		
		<? } ?>
<div class="pedido-common" style="text-align:right; padding-top:10px; font-weight:bold; font-size:16px;">
IVA&nbsp; <input id="iva" name="iva" type="text" class="field-monto-iva fields-pedido rounded" style="width:110px; font-weight:bold;" readonly="readonly" />
</div>
<div class="pedido-common" style="text-align:right; padding-top:10px; font-weight:bold;">
TOTAL&nbsp; <input id="granTotal" name="granTotal" type="text" class="field-monto-total fields-pedido rounded" style="width:110px; font-weight:bold; color:#ef773a" readonly="readonly" />
</div>
<p align="center">
<input name="button" type="submit" class="but rounded" id="button" value="Enviar Pedido" />
</p>
</form>

<p align="center" style="font-size:24px;" class="link"><!-- span style="color:#006699">Nuestros precios No incluyen IVA.</span><br /--><br />
&#8212; &nbsp;El flete o  env&iacute;o de la mercanc&iacute;a esta a cargo del comprador &nbsp;&#8212;</p>
</div>
<?php } ?>

</div>

<?php include ('includes/footer.php') ?>
</body>
</html>
