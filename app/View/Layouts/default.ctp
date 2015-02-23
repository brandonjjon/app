<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Coderity">

    <?php
    	echo $this->Html->tag('title', $this->fetch('title'));

    	if (!empty($metaDescription)) {
			echo $this->Html->meta('description', $metaDescription);
		}
		if (!empty($metaKeywords)) {
			echo $this->Html->meta('keywords', $metaKeywords);
		}

		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');

		echo $this->Html->css('demo');

		$js = array('jquery',
					'jquery-ui');

		echo $this->Html->script($js);
	?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php echo __('Toggle navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link(__('Coderity'), '/', array('class' => 'navbar-brand')); ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php echo $this->element('menu', array('ul' => array('class' => 'nav navbar-nav'))); ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
	<div class="container">
	    <?php
	    	echo $this->Session->flash();

			echo $this->fetch('content');
		?>
	</div>

	<div class="container">
        <?php echo $this->element('menu', array('type' => 'bottom', 'ul' => array('class' => 'nav navbar-nav'))); ?>
    </div>
	<?php

		echo $this->Html->script('bootstrap.min');

		$analytics = $this->requestAction(array('plugin' => false, 'controller' => 'settings', 'action' => 'get', 'google_analytics'));
		if ($analytics) {
			echo $analytics;
		}

		echo $this->element('sql_dump');
	?>
</body>

</html>