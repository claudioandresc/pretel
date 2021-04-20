<? $texto = $_GET['msj']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Costias de Bebe - Pretel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<style type="text/css">
body { 
	margin:0px;
	background-color:#c5ddff; /* 79B2FF */
	font-family: 'Averia Sans Libre', cursive;
	font-size:16px;
	color: #2f82ac; /* #229ed1 */
}
.txt-color {
	color:#006699;
}
.link-mas {
	color: #ef773a;
	font-size:14px;
	text-decoration:none;
	font-weight:bold;
}
.style1 {
	color: #CC6633;
	font-size: 14px;
	text-decoration: none;
	font-weight: bold;
}
</style>
</head>

<body>
  <table width="480" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="442" height="32" bgcolor="#d2e5ff" style="border-bottom:solid 1px #fff;"><img src="images/bird-1b.png" border="0" style="position:absolute; margin-left:370px; margin-top:5px;" />
      <h1 class="txt-color" style="font-size:24px; text-align:center; margin:0;">CositasDeBebe.com</h1></td>
    </tr>
    <? if ($texto=='olvido1') { ?>
    <tr>
      <td height="160" align="center">  
	  <strong>Debes introducir tu Email.</strong><br />
	  Intenta nuevamente.
	  <p><a href="olvido-datos.php" class="link-mas">[Continuar]</a></p>      </td>
    </tr>
    <? } if ($texto=='olvido2') { ?>
    <tr>
      <td height="160" align="center">  
	  Tu email <strong>No est&aacute; registrado</strong> en nuestro sistema.<br />
	  Intenta nuevamente &oacute; <a href="registro.php" class="link-mas" style="font-weight:bold;">Reg&iacute;strate Aqu&iacute;</a>.
	  <p><a href="olvido-datos.php" class="link-mas">[Continuar]</a></p></td>
    </tr>
    <? } if ($texto=='olvido3') { ?>
    <tr>
      <td height="160" align="center">  
	  <strong>Tus datos se enviaron satisfactoriamente</strong><br />
	  a tu cuenta de correo electr&oacute;nico.
	  <p><a href="index.php" target="_parent" class="link-mas">[Cerrar]</a></p></td>
    </tr>
    <? } if ($texto=='entrar1') { ?>
    <tr>
      <td height="160" align="center">  
	  <strong>(x) Error de Ingreso.</strong><br />
	  Introduce tus datos correctamente.
	  <p><a href="entrar.php" class="link-mas">[Continuar]</a></p>      </td>
    </tr>
    <? } if ($texto=='entrar2') { ?>
    <tr>
      <td height="160" align="center">  
	  <strong>Tus datos de acceso no coinciden.</strong><br />
	  Intenta nuevamente.
	  <p class="link-mas"><a href="entrar.php" class="link-mas">Continuar</a> &nbsp; | &nbsp; <a href="olvido-datos.php" class="link-mas">&iquest;Olvid&oacute; sus datos?</a></p>      </td>
    </tr>
    <? } if ($texto=='proreg') { ?>
    <tr>
      <td height="160" align="center">Para	<strong>ver los precios</strong> de los productos<br />
      debes estar <strong>registrado</strong>.
        <p style="line-height:20px;"><a href="entrar.php" class="link-mas" style="color:#009900"><strong>[+] Ya estoy registrado,</strong> quiero ingresar</a>.<br />
          <a href="registro.php" class="style1">[x] No estoy registrado, quiero hacerlo</a>.&nbsp;</p></td>
    </tr>
    <? } if ($texto=='pedido') { ?>
    <tr>
      <td height="160" align="center">
      <strong>Para enviar tu Pedido debes estar registrado.</strong>
      <p style="line-height:20px;"><a href="entrar.php" class="link-mas" style="color:#009900"><strong>[+] Ya estoy registrado, quiero ingresar</strong></a>.<br />
      <a href="registro.php" class="style1">[x] No estoy registrado, quiero hacerlo</a>.&nbsp;</p></td>
    </tr>
    <? } if ($texto=='pedido1') { ?>
    <tr>
      <td height="160" align="center">
      <strong>(x) Error de Env&iacute;o.</strong><br />
      Debes llenar tus datos correctamente y<br />
	Seleccionar los Productos a Comprar.      </td>
    </tr>
    <? } if ($texto=='pedido2') { ?>
    <tr>
      <td height="160" align="center">
      <strong>Hemos recibido tu Pedido.</strong><br />
      Una copia ha sido enviada a tu email.<br />
      <strong>Espere nuestra confirmaci&oacute;n para proceder con el pago.</strong>
      <p><em>Muchas Gracias.</em></p>      </td>
    </tr>
    <? } ?>
  </table>
</body>
</html>
