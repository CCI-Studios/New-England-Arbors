<style src="/media/com_contest/css/com_contest.css" />
<? @helper('behavior.modal') ?>
<script src="/media/lib_koowa/js/koowa.js" />

<div class="item-page">
	<h1>Photo Contest Archive</h1>

	<p>Please choose your year:</p>
	<ul>
		<?php $year = date('Y') - 1;
		while ($year >= 2012): ?>
			<li><a href="<?= JRoute::_("index.php?year=$year&Itemid=$listing_itemid") ?>"><?= $year ?></a></li>
		<?
		$year--;
		endwhile; ?>
	</ul>


</div>