<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container-fluid pi-main-header">
	<div class="container">
		<div class="pi-logo">
			<?php if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
			} ?>
		</div>
		<div class="pi-main-menu">
			<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
		</div>
	</div>
</div>



