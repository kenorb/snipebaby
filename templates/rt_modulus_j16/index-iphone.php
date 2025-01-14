<?php
/**
 * @package 	Gantry Template Framework - RocketTheme
 * @version 	1.6.5 December 12, 2011
 * @author 		RocketTheme http://www.rockettheme.com
 * @copyright	Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined( 'GANTRY_VERSION' ) or die( 'Restricted index access' );
global $gantry;
$gantry->set('fixedheader', 0);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
    <head>
        <?php
            $gantry->displayHead();
            $gantry->addStyles(array('template.css','joomla.css','iphone-gantry.css'));
			$gantry->addScript('iscroll.js');
			
			if ($gantry->get('loadtransition') && isBrowserCapable()){
				$gantry->addScript('load-transition.js');
				$hidden = ' class="rt-hidden"';
			} else {
				$hidden = '';
			}
        ?>
			<?php
				$scalable = $gantry->get('iphone-scalable', 0) == "0" ? "0" : "1";
			?>
			<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=<?php echo $scalable; ?>;">

			<script type="text/javascript">
				var orient = function() {
					var dir = "rt-normal";
					switch(window.orientation) {
						case 0: dir = "rt-normal";break;
						case -90: dir = "rt-right";break;
						case 90: dir = "rt-left";break;
						case 180: dir = "rt-flipped";break;
					}
					$$(document.body, '#rt-wrapper')
						.removeClass('rt-normal')
						.removeClass('rt-left')
						.removeClass('rt-right')
						.removeClass('rt-flipped')
						.addClass(dir);
				}

				window.addEvent('domready', function() {
					orient();
					window.scrollTo(0, 1);
					new iScroll($$('#rt-menu ul.menu')[0]);
				});

			</script>
    </head>
    <body <?php echo $gantry->displayBodyTag(); ?> onorientationchange="orient()">
		<div id="rt-page-surround">
			<div class="rt-container">
				<?php /** Begin Drawer **/ if ($gantry->countModules('mobile-drawer')) : ?>
				<div id="rt-drawer">
					<?php echo $gantry->displayModules('mobile-drawer','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Drawer **/ endif; ?>
					<?php if ($gantry->countModules('mobile-top')):?>
				<div id="rt-top-surround"><div id="rt-top-surround2"><div id="rt-header"><div id="rt-header2">
				<div id="rt-top">
					<?php echo $gantry->displayModules('mobile-top','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				</div></div></div></div>
				<?php endif; ?>
			<div id="rt-body-bg"<?php echo $hidden; ?>>
				<?php /** Begin Menu **/ if ($gantry->countModules('mobile-navigation')) : ?>
				<div id="rt-menu" <?php echo $gantry->displayClassesByTag('rt-body-surround'); ?>>
					<div id="rt-left-menu"></div>
					<div id="rt-right-menu"></div>
					<?php echo $gantry->displayModules('mobile-navigation','basic','basic'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Menu **/ endif; ?>
				<?php /** Begin Header **/ if ($gantry->countModules('mobile-header')) : ?>
				<div id="rt-header">
					<?php echo $gantry->displayModules('mobile-header','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Header **/ endif; ?>
				<?php /** Begin Showcase **/ if ($gantry->countModules('mobile-showcase')) : ?>
				<div id="rt-showcase">
					<?php echo $gantry->displayModules('mobile-showcase','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Showcase **/ endif; ?>
				<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
				<div id="rt-breadcrumbs">
					<?php echo $gantry->displayModules('breadcrumb','basic','breadcrumbs'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Breadcrumbs **/ endif; ?>
				<div id="rt-body-surround" <?php echo $gantry->displayClassesByTag('rt-body-surround'); ?>>
					<?php /** Begin Feature **/ if ($gantry->countModules('mobile-feature')) : ?>
					<div id="rt-feature">
						<?php echo $gantry->displayModules('mobile-feature','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Feature **/ endif; ?>
					<?php /** Begin Main Body **/ ?>
					<div class="component-content">
				    <?php echo $gantry->displayMainbody('iphonemainbody','sidebar','standard','standard','standard','standard','standard'); ?>
					</div>
					<?php /** End Main Body **/ ?>
					<?php /** Begin Bottom **/ if ($gantry->countModules('mobile-bottom')) : ?>
					<div id="rt-bottom">
						<?php echo $gantry->displayModules('mobile-bottom','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Bottom **/ endif; ?>
				</div>
			</div>
				<?php /** Begin Footer **/ if ($gantry->countModules('mobile-footer')) : ?>
				<div id="rt-footer">
					<?php echo $gantry->displayModules('mobile-footer','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Footer **/ endif; ?>
				<?php /** Begin Copyright **/ if ($gantry->countModules('mobile-copyright')) : ?>
				<div id="rt-copyright">
					<?php echo $gantry->displayModules('mobile-copyright','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Copyright **/ endif; ?>
				
				<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
				<div id="rt-debug">
					<?php echo $gantry->displayModules('debug','standard','standard'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Debug **/ endif; ?>
				
				<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
				<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
				<?php /** End Analytics **/ endif; ?>
			</div>
		</div>
	</body>
</html>