<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="myapp">
	<head>
		<title>Krezel Theme</title>
		<?php wp_head(); ?>
	</head>
	<body>
		<header>
            <div class="wrapper container">
                <div class="row">
                    <div class="col-xs-6">
                        <h1><strong>Krężel</strong> theme</h1>
                    </div>
                    <div class="col-xs-6">
                        <nav id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger">menu</button>
							<?php jwa_nav(); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>