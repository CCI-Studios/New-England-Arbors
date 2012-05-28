<?php
/**
 * @version		$Id: blog_item.php 21651 2011-06-23 05:31:49Z chdemko $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::core();

?>

<?php $images = json_decode($this->item->images) ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)): ?>
<div class="media">
	<img src="<?php echo $images->image_intro ?>" width="125" height="125" alt="<?php echo $this->item->title ?>" />
</div>
<?php endif; ?>

<?php if ($params->get('show_title')) : ?>
	<?php list($title, $subtitle) = explode(' - ', $this->escape($this->item->title)); ?>

	<h2><?php echo $title; ?></h2>
	<div class="subtitle"><?php echo $subtitle ?></div>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>
<?php echo $this->item->introtext; ?>
<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent; ?>
