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
                        <nav>
							<?php jwa_nav(); ?>
                            <button>menu</button>
                        </nav>
                    </div>
                </div>
            </div>
        </header>