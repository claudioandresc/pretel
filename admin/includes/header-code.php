<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<link href="css-admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript"  src="../scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#adminForm").validate();
  });

<?php if($_GET['e']!=1) { ?>
$.validator.addMethod(
    'noPlaceholder', function (value, element) {
        return value !== element.defaultValue;
    }, 'Introduzca un valor'
);
<?php } ?>
</script>