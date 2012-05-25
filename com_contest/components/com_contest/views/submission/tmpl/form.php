<? defined("KOOWA") or die('Nooku is not installed or enabled'); ?>
<? @helper('behavior.mootools') ?>
<style src="media://lib_koowa/css/koowa.css" />
<script src="media://lib_koowa/js/koowa.js" />

<h1>Submit a New Photo</h1>

<p>Submit a photo below to be added to the gallery. Photos will only appear after being approved.</p>

<form action="<?= @route("view=submission&id={$submission->id}") ?>" method="post" class="-koowa-form" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
			
	<p>
		<label for="field_title" class="hidden"><?= @text('Title') ?></label>
		<input 
			type="text" 
			id="field_title" 
			name="title" 
			placeholder="Title"
			value="<?= $submission->title ?>" />
	</p>

	<p>
		<label for="field_name" class="hidden"><?= @text('Name') ?></label>
		<input 
			type="text" 
			id="field_name" 
			name="name" 
			placeholder="Name"
			value="<?= $submission->name ?>" />
	</p>

	<p>
		<label for="field_email" class="hidden"><?= @text('Email') ?></label>
		<input 
			type="email" 
			id="field_email" 
			name="email" 
			placeholder="Email Address"
			value="<?= $submission->email ?>" />
	</p>

	<p>
		<label for="field_phone" class="hidden"><?= @text('Phone') ?></label>
		<input 
			type="text" 
			id="field_phone" 
			name="phone" 
			placeholder="Phone"
			value="<?= $submission->phone ?>" />
	</p>

	<p>
		<label for="field_file" class="hidden"><?= @text('Image') ?></label>
		<input type="file" name="file_upload" />
	</p>

	<p><input type="submit" class="button" /></p>
</form>