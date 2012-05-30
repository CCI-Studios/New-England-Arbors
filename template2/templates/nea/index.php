<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive())
    $menu = $menu->getActive()->alias;
else
	$menu = "";

if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

if ($this->countModules('sidebar1')) {
	$contentWidth = 9;
} else {
	$contentWidth = 12;
}

if ($this->countModules('sidebar2')) {
	$componentWidth = 8;
} else {
	$componentWidth = 12;
}

$analytics = "UA-31248154-1"; // FIXME Update to client ID
?>

<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/bootstrap.responsive.css">
	<?php else: ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/bootstrap.responsive.css">
	<?php endif; ?>

	<!-- load modernizer, all other at bottom -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/javascript/libs/modernizr-1.7.js"></script>
	<?php else: ?>
		<script src="/templates/<?= $this->template ?>/javascript/libs/modernizr-1.7.min.js"></script>
	<?php endif; ?>
		
</head>

<body class="<?= $menu ?>">

	<div id="mobile-menu" class="visible-phone">
		<jdoc:include type="modules" name="mobile-menu" style="rounded" />
	</div>

	<div id="wrapper">
		<div id="top" class="container-fluid"><div><div>
			<jdoc:include type="modules" name="top" style="rounded" />
			<div class="clear"></div>
		</div></div></div>

		<div id="header">
			<div class="container-fluid"><div class="row-fluid">
				<jdoc:include type="modules" name="header" style="rounded" />
			</div></div>
		</div>

		<?php if ($this->countModules('header')): ?>
		<div id="masthead"><div><div><div>
			<div class="container-fluid">
				<jdoc:include type="modules" name="masthead" style="rounded" />
			</div>
		</div></div></div></div>
		<?php endif; ?>

		<div id="body">
			<div class="container-fluid"><div class="row-fluid">

				<? if ($this->countModules('sidebar1')): ?>
					<div id="sidebar1" class="span3">
						<jdoc:include type="modules" name="sidebar1" style="rounded" />
					</div>
				<? endif; ?>

				<div class="span<?= $contentWidth ?>">

					<div class="row-fluid">
						<div id="component" class="span<?= $componentWidth ?>">
							<jdoc:include type="component" />
						</div>

						<? if ($this->countModules('sidebar2')): ?>
							<div id="sidebar2" class="span4">
								<jdoc:include type="modules" name="sidebar2" style="rounded" />
							</div>
						<? endif; ?>
					</div>

					<?php if ($this->countModules('bottom')): ?>
					<div id="bottom" class="row-fluid">
						<jdoc:include type="modules" name="bottom" style="rounded" />
					</div>
					<?php endif; ?>
				</div>
			</div></div>
		</div>

		<div id="footer"><div class="container-fluid">
			<jdoc:include type="modules" name="footer" style="rounded" />
		</div></div>
		
		<div id="copyright"><div>
			<p>
				&copy; <?= date('Y'); ?> New England Arbors. All Rights Reserved.<br/>
				Site by <a href="http://ccistudios.com" target="_blank">CCI Studios</a>
			</p>
		</div></div>
	</div>



	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//cdn.zopim.com/?ZOL7j2NYo2S65T3yeXZpRcalpTesJuIk';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/javascript/columns.js"></script>
		<script src="/templates/<?= $this->template ?>/javascript/dropmenu.js"></script>
		<script src="/templates/<?= $this->template ?>/javascript/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/javascript/menu.js"></script>
		<script src="/templates/<?= $this->template ?>/javascript/location.js"></script>
	<?php else: ?>
		<script>
			var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
				g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
				s.parentNode.insertBefore(g,s)}(document,"script"));
	  	</script>
		<script src="/templates/<?= $this->template ?>/javascript/scripts.min.js"></script>
	<?php endif; ?>
</body>
</html>
