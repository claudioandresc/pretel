<? include("../conexion.php");
   include("../includes/funciones.php"); 

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO categorias (nombre,descripcion,status) VALUES ('$_POST[nombre]','$_POST[descripcion]','$_POST[status]')");
  $mensaje='Categoria Creada';
  }

if($_GET['act']==2){
  $edit=mysql_query("UPDATE categorias SET nombre='$_POST[nombre]',descripcion='$_POST[descripcion]',status='$_POST[status]' WHERE idCat='$_GET[id]'");
  $mensaje='Categoria Actualizada';
  }

if($_GET['act']==3){
  if($result=mysql_query("DELETE FROM categorias WHERE idCat='$_GET[id]'")) {
    $mensaje='Categoria Eliminada';
	}
  else $mensaje='Error, Intente de Nuevo';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM categorias WHERE idCat='$_GET[id]'");
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
<h1>Categorías</h1>
<?php if ($mensaje) { ?>
<center><span class="link"><?php echo $mensaje; ?></span></center>
<?php echo "<script language=\"javascript\">setTimeout(\"window.location='categorias.php'\",15)</script>"; } else { ?>
<form id="adminForm" name="adminForm" method="post" action="?<?=$action?>">
<label class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required noPlaceholder" id="nombre" value="<?php if($_GET['e']==1) { echo $d['nombre']; } else { echo 'CATEGORIA'; } ?>" style="background-image:url(../images/icon-categoria.png)" onfocus="if (this.value=='CATEGORIA') this.value = ''" onblur="if (this.value=='') this.value = 'CATEGORIA'" /></label>
<br />
<label class="txt-error-msg"><textarea name="descripcion" cols="45" rows="5" class="fields rounded required noPlaceholder" id="descripcion" style="background-image:url(../images/icon-descripcion.png)" onfocus="if (this.value=='DESCRIPCION') this.value = ''" onblur="if (this.value=='') this.value = 'DESCRIPCION'"><?php if($_GET['e']==1) { echo $d['descripcion']; } else { echo 'DESCRIPCION'; } ?></textarea></label>
<br />
<input type="radio" name="status" id="status" value="A" checked="checked" <? if($d['status']==A) echo "checked";?> />Activado &nbsp; &nbsp; 
<input type="radio" name="status" id="status" value="D" <? if($d['status']==D) echo "checked";?> />Desactivado<br />
<input name="button" type="submit" class="but rounded" id="button" value="Enviar" />
</form>
<?php } ?>
<div class="listado">
<h2>Listado de Categorías (<?php echo cuantos_items('categorias'); ?>)</h2>
<blockquote>
<?php $buscar=mysql_query("SELECT * FROM categorias ORDER BY nombre ASC");
	while($datos=mysql_fetch_array($buscar)){?>
<p class="list-items" style="<?php if ($datos['status']==D) { echo 'filter:Alpha(Opacity=45);-moz-opacity:.45;opacity:.45;'; } ?>">
<a href="?act=3&id=<?=$datos['idCat']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idCat']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="link3" style="font-size:12px;">[<?=$datos['status']?>]</span>&nbsp; - &nbsp;<?=$datos['nombre']?></p>
<?php } ?>
</blockquote>
</div>
</div>

<?php include ('includes/footer.php') ?>
</div>
</body>
</html>