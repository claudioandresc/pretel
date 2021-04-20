<? include("../conexion.php");
   include("../includes/funciones.php");

$folder="images/productos";

if($_GET['act']==1){
  $insertQuery=mysql_query("INSERT INTO productos (ref,nombre,sumario,descripcion,precioM,precioD,cant,categoria,status) VALUES ('$_POST[ref]','$_POST[nombre]','$_POST[sumario]','$_POST[descripcion]','$_POST[precioM]','$_POST[precioD]','$_POST[cant]','$_POST[categoria]','$_POST[status]')");
  $idn=mysql_insert_id();
  if($_FILES['pic1']['tmp_name']!="") $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"imgP_".$idn);
  if($_FILES['pic2']['tmp_name']!="") $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"imgG_".$idn);
   $imagenes=mysql_query("UPDATE productos SET fotoP='$foto1',fotoG='$foto2' WHERE idProd='$idn'");
   $mensaje='Producto Cargado';
  }

if($_GET['act']==2){
if($_FILES['pic1']['tmp_name']!=""){
     @borrar_imagen($_POST['fot1'],$folder);
	 $foto1=subir_imagen($_FILES['pic1']['tmp_name'],$folder,"imgP_".$_GET['id']);}
  else $foto1=$_POST['fot1'];  
  if($_FILES['pic2']['tmp_name']!=""){
     @borrar_imagen($_POST['fot2'],$folder);
	 $foto2=subir_imagen($_FILES['pic2']['tmp_name'],$folder,"imgG_".$_GET['id']);}
  else $foto2=$_POST['fot2'];
  $edit = mysql_query("UPDATE productos SET ref='$_POST[ref]',nombre='$_POST[nombre]',sumario='$_POST[sumario]',fotoP='$foto1',fotoG='$foto2',descripcion='$_POST[descripcion]',precioM='$_POST[precioM]',precioD='$_POST[precioD]',cant='$_POST[cant]',categoria='$_POST[categoria]',status='$_POST[status]' WHERE idProd='$_GET[id]'");
  $mensaje='Producto Actualizado';
  }

if($_GET['act']==3){
  $result = mysql_query("SELECT * FROM productos WHERE idProd='$_GET[id]'");
  $d=mysql_fetch_array($result); 
  @borrar_imagen($d['fotoP'],$folder);
  @borrar_imagen($d['fotoG'],$folder);
  if($result=mysql_query("DELETE FROM productos WHERE idProd='$_GET[id]'")){
    $mensaje='Producto Eliminado';
	}
  else $mensaje='<center>Error, Intente de Nuevo</center>';
}
    
if($_GET['e']==1){
  $result = mysql_query("SELECT * FROM productos WHERE idProd='$_GET[id]'");
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
<script type="text/javascript" src="../scripts/autoNumeric.js"></script>
<script type="text/javascript">
jQuery(function($) {
	$('input.auto').autoNumeric();
	// please see the following pages:
	// (http://www.decorplanit.com/plugin/autoLoaderFunction.htm) information on the starting autoNumeric() and loading values
	// (http://www.decorplanit.com/plugin/specialCharacters.htm) information id's with special characters
});
</script>
</head>

<body>
<div id="main" class="common" style="height:780px;">
<?php include ('includes/header.php') ?>

<div id="content">
<h1>Productos</h1>
<?php if ($mensaje) { ?>
<center><span class="link"><?php echo $mensaje; ?></span></center>
<?php echo "<script language=\"javascript\">setTimeout(\"window.location='productos.php'\",15)</script>"; } else { ?>
<form action="?<?=$action?>" method="post" enctype="multipart/form-data" name="adminForm" id="adminForm">
<input type="hidden" name="fot1" value="<?=$d['fotoP']?>">
<input type="hidden" name="fot2" value="<?=$d['fotoG']?>">
<label class="txt-error-msg"><input name="ref" type="text" class="fields2 rounded required noPlaceholder" id="ref" value="<?php if($_GET['e']==1) {  echo $d['ref']; } else { echo 'REF.'; } ?>" style="background-image:url(../images/icon-ref.png)" onfocus="if (this.value=='REF.') this.value = ''" onblur="if (this.value=='') this.value = 'REF.'" /></label>
<br />
<label class="txt-error-msg"><input name="nombre" type="text" class="fields rounded required noPlaceholder" id="nombre" value="<?php if($_GET['e']==1) {  echo $d['nombre']; } else { echo 'NOMBRE DEL PRODUCTO'; } ?>" style="background-image:url(../images/icon-producto.png)" onfocus="if (this.value=='NOMBRE DEL PRODUCTO') this.value = ''" onblur="if (this.value=='') this.value = 'NOMBRE DEL PRODUCTO'" /></label>
<br />
<label class="txt-error-msg">
<select name="categoria" id="categoria" class="fields rounded required" style="background-image:url(../images/icon-categoria.png); width:430px;">
<option value="">SELECCIONE UNA CATEGORIA &raquo;</option>
  <? $buscar=mysql_query("SELECT idCat, nombre FROM categorias WHERE status='A' ORDER BY nombre ASC");
     while($datos=mysql_fetch_array($buscar)){?>
	<option value="<?=$datos['idCat']?>"  <? if($datos['idCat']==$d['categoria']) echo "selected";?>><?=$datos['nombre']?></option> 	
   <? } ?>
</select>
</label>
<br />
<label class="txt-error-msg"><textarea name="sumario" cols="45" rows="3" class="fields rounded required noPlaceholder" id="sumario" style="background-image:url(../images/icon-sumario.png)" onfocus="if (this.value=='SUMARIO') this.value = ''" onblur="if (this.value=='') this.value = 'SUMARIO'"><?php if($_GET['e']==1) {  echo $d['sumario']; } else { echo 'SUMARIO'; } ?></textarea></label>
<br />
<label class="txt-error-msg"><textarea name="descripcion" cols="45" rows="5" class="fields rounded required noPlaceholder" id="descripcion" style="background-image:url(../images/icon-descripcion.png)" onfocus="if (this.value=='DESCRIPCION') this.value = ''" onblur="if (this.value=='') this.value = 'DESCRIPCION'"><?php if($_GET['e']==1) {  echo $d['descripcion']; } else { echo 'DESCRIPCION'; } ?></textarea></label>
<br />
<label class="txt-error-msg"><input name="precioM" type="text" class="fields2 rounded required auto noPlaceholder" id="precioM" value="<?php if($_GET['e']==1) {  echo $d['precioM']; } else { echo 'P. AL MAYOR'; } ?>" style="background-image:url(../images/icon-mayor.png)" onfocus="if (this.value=='P. AL MAYOR') this.value = ''" onblur="if (this.value=='') this.value = 'P. AL MAYOR'" /></label>
<br />
<label class="txt-error-msg"><input name="precioD" type="text" class="fields2 rounded required auto noPlaceholder" id="precioD" value="<?php if($_GET['e']==1) {  echo $d['precioD']; } else { echo 'P. AL DETAL'; } ?>" style="background-image:url(../images/icon-detal.png)" onfocus="if (this.value=='P. AL DETAL') this.value = ''" onblur="if (this.value=='') this.value = 'P. AL DETAL'" /></label>
<br />
<label class="txt-error-msg"><input name="cant" type="text" class="fields2 rounded required noPlaceholder" id="cant" value="<?php if($_GET['e']==1) {  echo $d['cant']; } else { echo 'CANT. MIN.'; } ?>" style="background-image:url(../images/icon-cant.png)" onfocus="if (this.value=='CANT. MIN.') this.value = ''" onblur="if (this.value=='') this.value = 'CANT. MIN.'" /></label>
<br />
<input type="file" name="pic1" id="pic1" class="fields3 rounded" value="FOTO PEQUEÑA" title="FOTO PEQUEÑA" /><br />
<input type="file" name="pic2" id="pic2" class="fields3 rounded" value="FOTO GRANDE" title="FOTO GRANDE" /><br />
<input type="radio" name="status" id="status" value="A" checked="checked" <? if($d['status']==A) echo "checked";?> />Activado &nbsp; &nbsp; 
<input type="radio" name="status" id="status" value="D" <? if($d['status']==D) echo "checked";?> />Desactivado<br />
<input name="button" type="submit" class="but rounded" id="button" value="Enviar" />
</form>
<?php } ?>
<div class="listado">
<h2>Listado de Productos (<?php echo cuantos_items('productos'); ?>)</h2>

<?php $buscar=mysql_query("SELECT * FROM productos ORDER BY ref ASC");
	while($datos=mysql_fetch_array($buscar)){?>
<p class="list-items" style="<?php if ($datos['status']==D) { echo 'filter:Alpha(Opacity=45);-moz-opacity:.45;opacity:.45;'; } ?>">
<a href="?act=3&id=<?=$datos['idProd']?>" onClick="return confirm('Seguro desea eliminar?')"><img src="img/b_drop.png" alt="Eliminar" title="Eliminar" hspace="10" border="0" align="right" /></a><a href="?e=1&id=<?=$datos['idProd']?>"><img src="img/edit.gif" alt="Editar" title="Editar" border="0" align="right" /></a><span class="link3" style="font-size:12px;">[<?=$datos['status']?>]</span> &nbsp;-&nbsp; Ref. <?=$datos['ref']?> - <?=$datos['nombre']?> &nbsp; - &nbsp; <span class="txt-blue">Bs. <?=$datos['precioM']?> &nbsp;/&nbsp; Bs. <?=$datos['precioD']?></span></p>
<?php } ?>

</div>
</div>

<?php include ('includes/footer.php') ?>
</div>
</body>
</html>