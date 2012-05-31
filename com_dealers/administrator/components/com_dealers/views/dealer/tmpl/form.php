<? defined("KOOWA") or die('Nooku is not installed or enabled'); ?>
<? @helper('behavior.mootools') ?>
<style src="media://lib_koowa/css/koowa.css" />
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://com_bars/css/com_bars.css" />

<form action="<?= @route("view=dealer&id={$dealer->id}") ?>" method="post" class="-koowa-form">
		
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?= @text('Dealer Details') ?></legend>
			
			<ul class="adminformlist">
				<li>
					<label for="field_title"><?= @text('Title') ?></label>
					<input type="text" id="field_title" name="title" value="<?= $dealer->title ?>" />
				</li>
				<li>
					<label for="field_authorized"><?= @text('Authorized Dealer') ?></label>
					<?= @helper('listbox.optionSelect', array('name'=>'authorized')) ?>
				</li>
				<li>
					<label for="field_address1"><?= @text('Address 1') ?></label>
					<input type="text" id="field_address1" name="address1" value="<?= $dealer->address1 ?>" />
				</li>
				<li>
					<label for="field_address2"><?= @text('Address 2') ?></label>
					<input type="text" id="field_address2" name="address2" value="<?= $dealer->address2 ?>" />
				</li>
				<li>
					<label for="field_city"><?= @text('City') ?></label>
					<input type="text" id="field_city" name="city" value="<?= $dealer->city ?>" />
				</li>
				<li>
					<label for="field_state"><?= @text('State') ?></label>
					<input type="text" id="field_state" name="state" value="<?= $dealer->state ?>" />
				</li>
				<li>
					<label for="field_country"><?= @text('Country') ?></label>
					<input type="text" id="field_country" name="country" value="<?= $dealer->country ?>" />
				</li>
				<li>
					<label for="field_zip"><?= @text('Zip') ?></label>
					<input type="text" id="field_zip" name="zip" value="<?= $dealer->zip ?>" />
				</li>				
			</ul>
		</fieldset>
	</div>
</form>
