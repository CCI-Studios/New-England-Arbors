<style src="/media/com_contest/css/com_contest.css" />
<? @helper('behavior.modal') ?>


<div class="item-page">
	<h1>Photo Contest</h1>

	<? if ($description): ?>
		<p><?= $description ?></p>
	<? endif; ?>

	<p><a href="<?= @route('view=submission&layout=form') ?>">Submit your own image.</a>

	<div class="submission-list">
		<?php foreach($submissions as $submission): ?>
		<div class="item">
			<p><a class="modal" href="/media/com_contest/uploads/<?= $submission->file ?>" rel="">
				<img src="/media/com_contest/uploads/<?= $submission->file ?>" />
			</a></p>
			<p>
				<strong><?= $submission->title ?></strong><br/>
				Average Rating: <?= number_format($submission->rating, 1) ?>
			</p>

			<? if(!$submission->hasRated()): ?>
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
		<?php endforeach; ?>
	</div>

	<? if ($total > 10): ?>
		<?= @helper('paginator.pagination', array(
			'total' => $total,
			'show_count' => false,
			'show_limit' => false,
		)) ?>
	<? endif; ?>
</p>