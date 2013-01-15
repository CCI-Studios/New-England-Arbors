<style src="/media/com_contest/css/com_contest.css" />
<? @helper('behavior.modal') ?>
<script src="/media/lib_koowa/js/koowa.js" />

<div class="item-page">
	<h1>
		Photo Contest
		<? echo ($archive) ? $year : ''; ?>
	</h1>

	<? if ($description && !$archive): ?>
		<p><?= $description ?></p>
	<? endif; ?>

	<? if (!$archive): ?>
		<p><a href="<?= @route('view=submission&layout=form') ?>">Submit your own image.</a></p>
	<? endif; ?>

	<div class="submission-list">
		<?php
		$index = 0;
		foreach($submissions as $submission): ?>

		<? if ($index % 3 == 0): ?>
			<div class="clear"></div>
		<? endif; ?>

		<div class="item">
			<div class="imageblock"><div><div>
				<a class="modal" href="/media/com_contest/uploads/<?= $submission->file ?>" rel="">
					<img src="/media/com_contest/uploads/<?= $submission->file ?>" />
				</a>
			</div></div></div>
			<p>
				<strong><?= $submission->title ?></strong><br/>
				Average Rating: <?= number_format($submission->rating, 1) ?>
			</p>

			<? if(!$submission->hasRated() && !$archive): ?>
			<div class="rating">
				<form action="<?= @route('view=rating') ?>" class="-koowa-form" method="post">
					<input type="hidden" name="ip" value="<?= KRequest::get('server.REMOTE_ADDR', 'raw') ?>" />
					<input type="hidden" name="contest_submission_id" value="<?= $submission->id ?>" />
					<input type="hidden" name="action" value="save" />


					<select name="rating">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>

					<p><input type="submit" class="button" value="Rate Me" /></p>
				</form>
			</div>
			<? endif; ?>

		</div>
		<?php
		$index++;
		endforeach; ?>
		<div class="clear"></div>

		<? if (!$submissions->count()): ?>
			<p>There are no submissions for <?= $year ?>. View our <a href="<?= JRoute::_("index.php?Itemid=$archive_itemid") ?>">archive</a> to see previous years.</p>
		<?php endif; ?>
	</div>

	<? if ($total > 10): ?>
		<?= @helper('paginator.pagination', array(
			'total' => $total,
			'show_count' => false,
			'show_limit' => false,
		)) ?>
	<? endif; ?>
</p>