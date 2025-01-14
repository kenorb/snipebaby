<?php
/**
 * RokNewsFlash Module
 *
 * @package RocketTheme
 * @subpackage roknewsflash.tmpl
 * @version   1.6.5 December 12, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<div id="newsflash" class="roknewsflash <?php echo $params->get('moduleclass_sfx'); ?>">
<div class="dual-bg">
    <div class="dual-bg1">
	<div class="dual-bg2">
	    <div class="dual-bg3">
		    <span class="flashing"><?php echo $params->get('pretext'); ?></span>
			<ul style="margin-left:<?php echo $params->get('news_indent',70); ?>px;">
<?php foreach ($list as $item) :  ?>
		<li>
		    <a href="<?php echo $item->link; ?>">
		    <?php
		    if ($params->get('usetitle')==1) {
		        echo ($item->title);
		    } else {
		        echo ($item->introtext . '...');
		    }
		    ?>
  		    </a>
		</li>
<?php endforeach; ?>
			</ul>
		</div>
	    </div>
	</div>
    </div>
</div>