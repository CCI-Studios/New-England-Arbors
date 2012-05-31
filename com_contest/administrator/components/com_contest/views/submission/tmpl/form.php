<? defined("KOOWA") or die('Nooku is not installed or enabled'); ?>
<? @helper('behavior.mootools') ?>
<style src="media://lib_koowa/css/koowa.css" />
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_bars/css/com_bars.css" />

<form action="<?= @route("view=submission&id={$submission->id}") ?>" method="post" class="-koowa-form" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?= @text('Submission Details') ?></legend>
			
			<ul class="adminformlist">
				<li>
					<label for="field_title"><?= @text('Title') ?></label>
					<input type="text" id="field_title" name="title" value="<?= $submission->title ?>" />
				</li>
				<li>
					<label for="field_name"><?= @text('Name') ?></label>
					<input type="text" id="field_name" name="name" value="<?= $submission->name ?>" />
				</li>
				<li>
					<label for="field_email"><?= @text('Email') ?></label>
					<input type="email" id="field_email" name="email" value="<?= $submission->email ?>" />
				</li>
				<li>
					<label for="field_phone"><?= @text('Phone') ?></label>
					<input type="text" id="field_phone" name="phone" value="<?= $submission->phone ?>" />
				</li>
				<li>
					<label for="field_created"><?= @text('Created On') ?></label>
					<?= $submission->created_on ?>
				</li>
				<li>
					<label for="field_modified"><?= @text('Modified On') ?></label>
					<?= $submission->modified_on ?>
				</li>
			</ul>
		</fieldset>
	</div>

	<div class="width-40 fltrt">
		<fieldset class="adminform">
			<legend><?= @text('Submission Image') ?></legend>

			<ul class="adminformlist">
				<? if (!$submission->file): ?>
					<li>
						<label for="field_file"><?= @text('Image') ?></label>
						<input type="file" name="file_upload" />
					</li>
				<? else: ?>
					<li>	
						<img
							src="<?= "/media/com_contest/uploads/{$submission->file}" ?>" 
							style="max-width: 100%" />
					</li>
					<li>
						<label for="field_file_delete"><?= @text('Delete Image')?></label>
						<input type="checkbox" name="file_delete" />
					</li>
				<? endif; ?>
			</ul>
		</fieldset>
	</div>
</form>