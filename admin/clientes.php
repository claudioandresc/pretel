<? include("../conexion.php");
   include("../includes/funciones.php"); 

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

if(($Nombre==NULL) or ($Nombre=='NOMBRE') or ($Apellido==NULL) or ($Apellido=='APELLIDO O RUBRO') or ($Email==NULL) or ($Email=='EMAIL') or ($Cedula==NULL) or ($Cedula=='CEDULA') or ($Telefono==NULL) or ($Telefono=='TELEFONO') or ($Ciudad==NULL) or ($Ciudad=='ESTADO / CIUDAD') or ($Direccion==NULL) or ($Direccion=='DIRECCION EXACTA DE ENTREGA') or ($Clave==NULL) or ($Clave=='CLAVE')) { 
	$mensaje='Llene Todos los Campos';
}
else {
$edit=mysql_query("UPDATE clientes SET nombre='$Nombre',apellido='$Apellido',email='$Email',cedula='$Cedula',telefono='$Telefono',ciudad='$Ciudad',direccion='$Direccion',clave='$Clave',empresa='$_POST[empresa]',promos='$_POST[promos]' WHERE idUser='$_GET[id]'");
$mensaje='Datos Actualizados';
  }
}
/*
if($_GET['act']==3){
  if($result=mysql_query("DELETE FROM clientes WHERE idUser='$_GET[id]'")){
  $mensaje='Cliente Eliminado';
  echo "<script language=\"javascript\">setTimeout(\"window.location='clientes.php'\",10)</script>";
  }
}
*/   
if(($_GET['e']==1)){
  $result = mysql_query("SELECT * FROM clientes WHERE idUser='$_GET[id]'");
  $d=mysql_fetch_array($result);
  $action="act=2&id=".$_GET['id'];
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
<h1>Clientes Registrados (<?php echo cuantos_items('clientes'); ?>)</h1>
<?php if ($_GET['e']) { ?>
<form id="adminForm" name="adminForm" method="post" action="?<?=$action?>">
<input name="empresa" type="hidden" id="empresa" value="<?=$d['empresa']?>" />
<label class="txt-error-msg"></label>
<br />
<label class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required noPlaceholder" id="nombre" style="background-image:url(<?php if (($_GET['e']) && ($d['empresa']==1)) { echo '../images/icon-company.png'; } else { echo '../images/icon-avatar.png'; } ?>)" value="<?php if($_GET['e']==1) { echo $d['nombre']; } else { echo 'NOMBRE'; } ?>" onfocus="if (this.value=='NOMBRE') this.value = ''" onblur="if (this.value=='') this.value = 'NOMBRE'" /></label>
<br />
<label class="txt-error-msg"><input name="apellido" type="text" class="fields rounded required noPlaceholder" id="apellido" style="background-image:url(<?php if (($_GET['e']) && ($d['empresa']==1)) { echo '../images/icon-company2.png'; } else { echo '../images/icon-avatar2.png'; } ?>)" value="<?php if($_GET['e']==1) { echo $d['apellido']; } else { echo 'APELLIDO O RUBRO'; } ?>" onfocus="if (this.value=='APELLIDO O RUBRO') this.value = ''" onblur="if (this.value=='') this.value = 'APELLIDO O RUBRO'" /></label>
<br />
<label class="txt-error-msg"><input name="email" type="text" class="fields rounded required email noPlaceholder" id="email" style="background-image:url(../images/icon-email.png)" value="<?php if($_GET['e']==1) { echo $d['email']; } else { echo 'EMAIL'; } ?>" onfocus="if (this.value=='EMAIL') this.value = ''" onblur="if (this.value=='') this.value = 'EMAIL'" /></label>
<br />
<label class="txt-error-msg"><input name="cedula" type="text" class="fields rounded required noPlaceholder" id="cedula" style="background-image:url(../images/icon-rif.png)" value="<?php if($_GET['e']==1) { echo $d['cedula']; } else { echo 'RIF'; } ?>" onfocus="if (this.value=='RIF') this.value = ''" onblur="if (this.value=='') this.value = 'RIF'" /></label>
<br />
<label class="txt-error-msg"><input name="telefono" type="text" class="fields rounded required noPlaceholder" id="telefono" style="background-image:url(../images/icon-phone.png)" value="<?php if($_GET['e']==1) { echo $d['telefono']; } else { echo 'TELEFONO'; } ?>" onfocus="if (this.value=='TELEFONO') this.value = ''" onblur="if (this.value=='') this.value = 'TELEFONO'" /></label>
<br />
<label class="txt-error-msg"><input name="ciudad" type="text" class="fields rounded required noPlaceholder" id="ciudad" style="background-image:url(../images/icon-ciudad.png)" value="<?php if($_GET['e']==1) { echo $d['ciudad']; } else { echo 'ESTADO / CIUDAD'; } ?>" onfocus="if (this.value=='ESTADO / CIUDAD') this.value = ''" onblur="if (this.value=='') this.value = 'ESTADO / CIUDAD'" /></label>
<br />
<label class="txt-error-msg"><textarea name="direccion" class="fields rounded required noPlaceholder" id="direccion" style="background-image:url(../images/icon-direccion.png)" cols="45" rows="5" onfocus="if (this.value=='DIRECCION EXACTA DE ENTREGA') this.value = ''" onblur="if (this.value=='') this.value = 'DIRECCION EXACTA DE ENTREGA'"><?php if($_GET['e']==1) { echo $d['direccion']; } else { echo 'DIRECCION EXACTA DE ENTREGA'; } ?></textarea></label>
<br />
<label class="txt-error-msg"><input name="clave" type="text" class="fields rounded required noPlaceholder" id="clave" style="background-image:url(../images/icon-pass.png)" value="<?php if($_GET['e']==1) { echo $d['clave']; } else { echo 'CLAVE'; } ?>" maxlength="20" onfocus="if (this.value=='CLAVE') this.value = ''" onblur="if (this.value=='') this.value = 'CLAVE'" /></label>
<br />
<div class="promos-check">
<input name="promos" type="checkbox" id="promos" value="1" <?php if ($d['promos']==1) { echo 'checked="checked"'; } ?> />
Deseo recibir promociones por Email</div>
<input name="button" type="button" class="but2 rounded" id="button" value="Cancelar" onClick="window.location='clientes.php'" /> &nbsp; 
<input name="button" type="submit" class="but rounded" id="button" value="Enviar" <? if ($_GET['e']=='') { echo 'disabled="disabled"'; } ?> />
</form>
<?php } else { ?>
<div class="listado" style="margin-top:30px;">
<?php if ($mensaje) { ?>
<center><span class="link"><?php echo $mensaje; ?></span></center>
<?php echo "<script language=\"javascript\">setTimeout(\"window.location='clientes.php'\",15)</script>"; } ?>
<blockquote>
<?php $buscar=mysql_query("SELECT * FROM clientes ORDER BY nombre ASC");
	while($datos=mysql_fetch_array($buscar)){ ?>
<div class="list-items2">
<a href="?e=1&id=<?=$datos['idUser']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a>
<?php if ($datos['empresa']==0) { ?><b><?=$datos['nombre']?> <?=$datos['apellido']?></b><?php } else { ?><b><?=$datos['nombre']?></b> - <?=$datos['apellido']?> <?php } ?> &nbsp; - &nbsp; <?php if ($datos['empresa']==0) { echo 'C.I.'; } else { echo 'Rif'; } ?>: <?=$datos['cedula']?><br />Telf: <?=$datos['telefono']?> &nbsp; - &nbsp; <span class="link3" style="font-size:16px;"><?=$datos['email']?></span><br /><u>Dirección</u>: <?=$datos['ciudad']?>, <?=$datos['direccion']?></div>
<?php } ?>
</blockquote>
</div>
<?php } ?>
</div>

<?php include ('includes/footer.php') ?>
</div>
</body>
</html>