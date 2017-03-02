<!DOCTYPE html>
<html>
<head>
	<title>Belajar MVC</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL ?>css/mobile.css">
</head>
<body>

<?php echo $this->loadView('menu'); ?>

<div class="container">
	<?php echo $content; ?>
</div>

<script type="text/javascript" src="<?php echo ASSETS_URL ?>js/mobilemenu.js"></script>

</body>
</html>