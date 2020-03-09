<?php
	require_once('custom.inc');
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
	error_reporting(E_ALL);
?>
<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
		
		<!--// jQuery //-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
			google.load("jquery", "1.7.1");
			google.load("jqueryui", "1.8.16");
		</script>

		<!--// TypeKit //-->
		<!--<script src="http://use.typekit.com/rno1wmo.js" type="text/javascript"></script>-->
		<script type="text/javascript" src="http://use.typekit.com/vod4glj.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<!--// Scripts //-->
		<script type="text/javascript">
			function setSizes() {
				var bodyHeight = $("body").height();
				// alert(bodyHeight);
				var wrapperHeight = $("#wrapper").height();
				// alert(wrapperHeight);
				if (wrapperHeight <= bodyHeight) {
					$("#wrapper").css("min-height", bodyHeight - 23);
				} else {
					$("body").css("height", bodyHeight - 23);
					$("#footer").css("margin-bottom", -23);
				}
			}

			$(window).resize(function() { setSizes(); });
			
			//Function to convert hex format to a rgb color
			/*
			function rgb2hex(rgb) {
				
				rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
				return "#" +
				("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
				("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
				("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
			}
			*/

			$(document).ready(function(){

				// var rolloverColor = rgb2hex($('a.active').css('color'));
				// var staticColor = rgb2hex($('ul.primary-links li a').css('color'));

				// Primary link fade hover effect
				$('ul.primary-links a').not('.active').hover(function() {
					// $(this).stop(true, true).animate({ color: rolloverColor}, 1200);
					$(this).stop(true, true).animate({ color: '#226a9d'}, 1200);
				}, function() {
					// $(this).stop(true, true).animate({ color: staticColor}, 400);
					$(this).stop(true, true).animate({ color: '#808181'}, 400);
				});
				
				$('ul.primary-links li').not(':last').append('<div class="primary-link-divider"></div>');

				// Social link fade hover effect
				$('div.social-icon a').hover(function() {
					$(this).children('img').stop(true, true).fadeIn();
				}, function() {
					$(this).children('img').stop(true, true).fadeOut();
				});

				// Reset sizes, since css doesn't like our layout
				setSizes();

			});
		</script>
  </head>
<body<?php print phptemplate_body_attributes($is_front, $layout); ?>>

<!-- Layout -->
	<div id="header-region" class="clear-block"><?php print $header; ?></div>

	<div id="wrapper">
    <div id="container" class="clear-block">

    	<div id="container-top"></div>
    	<div id="container-right"></div>
    	<div id="container-left"></div>
		
			<div id="header">
				<div id="logo-floater">
				<?php
					// Prepare header
					$site_fields = array();
					if ($site_name) {
						$site_fields[] = check_plain($site_name);
					}
					if ($site_slogan) {
						$site_fields[] = check_plain($site_slogan);
					}
					$site_title = implode(' ', $site_fields);
					if ($site_fields) {
						$site_fields[0] = '<span>'. $site_fields[0] .'</span>';
					}
					$site_html = implode(' ', $site_fields);

					if ($logo) {
						print '<a href="'. check_url($front_page) .'" title="'. $site_title .'">';
						// print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />';
						print '<img src="/sites/asappublicaffairs.com/themes/asap/images/asap_static_18.png" alt="'. $site_title .'" id="logo" />';
						print '</a>';
					}
/*
					if ($logo || $site_title) {
						print '<h1><a href="'. check_url($front_page) .'" title="'. $site_title .'">';
						if ($logo) {
							print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />';
						}
						print $site_html .'</a></h1>';
					}
*/
				?>
				</div>
				<div id="header-social-navigation">
					<div class="social-icon" id="social-icon-flickr"><a href="#"><img src="/sites/asappublicaffairs.com/themes/asap/images/asap_rollover_15.png" /></a></div>
					<div class="social-icon" id="social-icon-facebook"><a href="#"><img src="/sites/asappublicaffairs.com/themes/asap/images/asap_rollover_13.png" /></a></div>
					<div class="social-icon" id="social-icon-twitter"><a href="#"><img src="/sites/asappublicaffairs.com/themes/asap/images/asap_rollover_11.png" /></a></div>
					<div class="social-icon" id="social-icon-youtube"><a href="#"><img src="/sites/asappublicaffairs.com/themes/asap/images/asap_rollover_09.png" /></a></div>
					<div class="social-icon" id="social-icon-email"><a href="#"><img src="/sites/asappublicaffairs.com/themes/asap/images/asap_rollover_07.png" /></a></div>
				</div> <!-- /header-social-navigation -->
				<h2 id="header-phone">1-888-123-1234</h2>
				<?php //	if ($site_slogan) { ?>
				<div id="header-slogan"><?php print($site_slogan); ?></div>
				<?php	// } ?>
				<div id="header-secondary-navigation">
					<?php if (isset($secondary_links)) : ?>
						<?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
					<?php endif; ?>
				</div> <!-- /header-secondary-navigation -->
				<div id="header-primary-navigation">
					<?php if (isset($primary_links)) : ?>
						<?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
					<?php endif; ?>
				</div> <!-- /header-primary-navigation -->
			</div> <!-- /header -->
	
      <div id="main">

				<?php if ($left): ?>
				<div id="sidebar-left" class="sidebar">
					<?php print $left ?>
				</div>
				<?php endif; ?>
	
				<div id="center">
						<?php // print $breadcrumb; ?>
						<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
						<?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
						<?php if ($title && !$is_front): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
						<?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
						<?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
						<?php if ($show_messages && $messages): print $messages; endif; ?>
						<?php print $help; ?>
						<div class="clear-block">
							<?php print $content ?>
						</div>
						<?php print $feed_icons ?>
				</div> <!-- /#center -->
	
				<?php /* if ($right): ?>
				<div id="sidebar-right" class="sidebar">
						<?php if (!$left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
						<?php print $right ?>
				</div>
				<?php endif; */ ?>

				<br class="clear" />
    	</div> <!-- /main -->

      <div id="footer">
				<div id="footer-logo"></div>
				<div id="footer-divider"></div>
				<div id="footer-text"><?php print $footer_message ?><?php // print $footer ?></div>
			</div>

    </div> <!-- /container -->
  </div><!-- /wrapper -->
  <?php // print $closure ?>
  </body>
</html>