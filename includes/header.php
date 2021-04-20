<div id="header" class="common">
<div id="bird1"><img src="images/bird-1.png" border="0" /></div>
<div id="bird2"><img src="images/bird-2.png" border="0" /></div>
<div id="top-nav">
<?php if ($_SESSION['bebe']!="") { ?>
<div id="top-reg">
<b>Bienvenid@ <?php echo $_SESSION['bebe']; ?></b> &nbsp; - &nbsp; <a href="<? if($_SESSION['empresa']==1) { echo 'registro-juridica.php?e=1&id='.$_SESSION['idU']; } else { echo 'registro.php?e=1&id='.$_SESSION['idU']; } ?>" class="regframe" style="font-size:14px;">Tus Datos</a> &nbsp; - &nbsp; <a href="index.php?logout=1" style="font-size:14px;">Salir (x)</a>
</div>
<?php } else { ?>
<div id="top-reg">
<a href="registro.php" class="regframe" style="color:#FFFF00;"><img src="images/ico-check.png" border="0" align="absmiddle" /> Regístrate</a> &nbsp; &nbsp; &nbsp; 
<a href="entrar.php" style="color:#fff;" class="enterframe"><img src="images/ico-key.png" border="0" align="absmiddle" /> Tu Cuenta</a>
</div>
<?php } ?>
<a href="https://www.facebook.com/cositas.d.bb" target="_blank"><img src="images/top-but-facebook.png" alt="Facebook - Cositas de bebe - Pretel" border="0" /></a>
<a href="//plus.google.com/u/0/112705391103519526224?prsrc=3" rel="publisher" target="_blank" style="text-decoration:none;"><img src="images/top-g.png" alt="g+" hspace="5" border="0" /></a>
</div>
<a href="/index.php"><img src="images/logo.png" alt="Cositas de Bebe - Pretel" width="265" height="140" border="0" style="margin-left:90px; margin-top:10px;" title="Cositas de Bebe - Pretel" /></a>
<div id="menu" class="common"><a href="quienes-somos.php">Quienes Somos</a> <a href="javascript:;" id="ism1">Productos</a> <a href="como-comprar.php">Cómo Comprar</a> <a href="contactenos.php">Contáctenos</a></div>
<div id="s-menu" class="common">
<div id="sm1">
<?php $buscar=mysql_query("SELECT idCat, nombre FROM categorias WHERE status='A' ORDER BY nombre ASC LIMIT 9"); //  
		   while($datos=mysql_fetch_array($buscar)){?>
<a href="productos.php?idg=<?=$datos['idCat']?>"><?=$datos['nombre']?></a>
<?php } ?>
</div>
</div>
</div>