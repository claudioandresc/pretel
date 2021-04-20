<link type="image/x-icon" href="cdb.ico" rel="shortcut icon" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/fancybox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/fancybox.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$("a.enterframe").fancybox({
	'width'				: 480,
	'height'			: 'auto',
	'autoScale'			: true,
	'closeBtn'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'scrolling'			: 'auto',
	'type'				: 'iframe'
	});
	
	$("a.regframe").fancybox({
	'width'				: 540,
	'height'			: 'auto',
	'autoScale'			: true,
	'closeBtn'			: true,
	'transitionIn'		: 'fade',
	'transitionOut'		: 'fade',
	'scrolling'			: 'auto',
	'type'				: 'iframe'
	});
	
});
</script>