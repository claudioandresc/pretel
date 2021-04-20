<?php $foto = $_GET['pic']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cositas de Bebe - Pretel - Foto Zoom</title>
<link href="img-zoom/styles.css" rel="stylesheet" type="text/css" />
<script src="scripts/jquery.js"></script>
<script src="img-zoom/jquery.zoom.js"></script>
<script>
	$(document).ready(function(){
		//$('#ex1').zoom();
		$('#ex2').zoom({ on:'grab' });
		//$('#ex3').zoom({ on:'click' });			 
		//$('#ex4').zoom({ on:'toggle' });
	});
</script>
</head>

<body>
<span class="zoom" id="ex2">
<img src="images/productos/<?php echo $foto; ?>" width="450" height="600" alt="" title="" />
<p>+ Zoom (click y arrastra)</p>
</span>
</body>
</html>
