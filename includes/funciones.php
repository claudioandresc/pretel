<?php
function subir_imagen($archivo,$carpeta,$name)
{	$conn_id = ftp_connect("cositasdebebe.com");
	$login_result = ftp_login($conn_id,"cositasd","5yH3e14Sie"); 				
	list(,,$type)=getimagesize($archivo);
       if($type==2) $ext=".jpg";
       if($type==1) $ext=".gif";
	$nombre=$name.$ext;
	$path ="/public_html/".$carpeta."/".$nombre; 	
	$upload = ftp_put($conn_id, $path, $archivo, FTP_BINARY); 
	ftp_quit($conn_id);
	if(!$upload){?><script language="javascript">alert("Intente de nuevo, Error en conexion");
	               window.location=" <? echo $_SERVER[PHP_SELF]; ?>"; </script>  <?php  } 
    return $nombre;
}

function subir_archivo($archivo,$carpeta,$nombre)
{	$conn_id = ftp_connect("cositasdebebe.com");
	$login_result = ftp_login($conn_id,"cositasd","5yH3e14Sie"); 				
	$explode=explode(".",$archivo);
	$c=count($explode);
	$ext=$explode[$c-1];
	$name=$nombre.".".$ext;
	$path ="/public_html/".$carpeta."/".$nombre; 	
	$upload = ftp_put($conn_id, $path, $archivo, FTP_BINARY); 
	ftp_quit($conn_id);
	if(!$upload){?><script language="javascript">alert("Intente de nuevo, Error en conexion");
	               window.location=" <? echo $_SERVER[PHP_SELF]; ?>"; </script>  <?php  } 
    return $nombre;
}


function borrar_imagen($archivo,$carpeta)
{   $conn_id = ftp_connect("cositasdebebe.com");
	$login_result = ftp_login($conn_id,"cositasd","5yH3e14Sie"); 	
	$path ="/public_html/".$carpeta."/".$archivo; 	
	@ftp_delete($conn_id, $path);
	ftp_quit($conn_id);
}

function ordenar_fecha($fecha){
  $f=explode("-",$fecha);
  $fecha_ordenada=$f[2]."-".$f[1]."-".$f[0];
  return $fecha_ordenada;
}

function datos_imagen($id,$campo){
  $select=mysql_query("SELECT * FROM galeria WHERE id_imagen-;$id'");
  $dat=mysql_fetch_array($select); return $dat[$campo];
}

function cuantos_items($n) {
	$registrados=0;
	$ver_registrados=mysql_query("SELECT * FROM $n");
	$registrados=mysql_num_rows($ver_registrados);
	return $registrados;	
}

function existe_email($Email) {
	$buscar_nombre = mysql_query("SELECT * FROM clientes WHERE email='$Email'");
	if(mysql_num_rows($buscar_nombre)>0)
		return 1;
	else
		return 0;
}

function existe_cedula($Cedula) {
	$buscar_nombre = mysql_query("SELECT * FROM clientes WHERE cedula='$Cedula'");
	if(mysql_num_rows($buscar_nombre)>0)
		return 1;
	else
		return 0;
}
?>