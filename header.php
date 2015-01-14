<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="myapp">
	<head>
		<title>Krezel Theme</title>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/icon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/touch.png" rel="apple-touch-icon-precomposed">
		<?php wp_head(); ?>
	</head>
	<body>
		<header>
            <div class="wrapper container">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 id="logo"><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Krężel</a></strong></h1>
                    </div>
                    <div class="col-xs-6">
                        <div id="phone"><a href="tel:+48915645105">+48 (91) 564 51 05</a></div>
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('lang-ph'))  ?>
						<nav id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger">menu</button>
							<?php jwa_nav(); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>