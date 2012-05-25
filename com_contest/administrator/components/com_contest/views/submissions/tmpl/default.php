<? defined('KOOWA') or die('Nooku not installed'); ?>
<? @helper('behavior.mootools') ?>
<style src="media://lib_koowa/css/koowa.css" />
<script src="media://lib_koowa/js/koowa.js" />

<form action="<?= @route('view=submissions') ?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="10">&nbsp;</th>
				<th width="25"><?= @helper('grid.checkall') ?></th>
				<th><?= @helper('grid.sort', array('column'=>'title')) ?></th>
				<th><?= @text('Preview') ?>
				<th width="150"><?= @helper('grid.sort', array('column'=>'email', 'title'=>'Email Address')) ?></th>
				<th width="100"><?= @helper('grid.sort', array('column'=>'created_on', 'title'=>'Submission Date')) ?></th>
				<th width="75"><?= @text('Reviews') ?>
				<th width="75"><?= @text('Average') ?>
				<th width="50"><?= @helper('grid.sort', array('column'=>'enabled')) ?></th>
				<th width="50"><?= @helper('grid.sort', array('column'=>'id', 'title'=>'ID')) ?></th>
			</tr>
		</thead>
		
		<tfoot>
			<tr>
				<td colspan="10">
					<?= @helper('paginator.pagination', array('total' => $total)) ?>
				</td>
			</tr>
		</tfoot>
		
		<tbody>
			<? foreach($submissions as $submission): ?>
				<tr>
					<td>&nbsp;</td>
					<td align="center"><?= @helper('grid.checkbox', array('row' => $submission)) ?></td>
					<td><a href="<?= @route("view=submission&id={$submission->id}"); ?>">
						<?= $submission->title ?>
					</a></td>
					<td><a href="<?= @route("view=submission&id={$submission->id}"); ?>">
						Preview
					</a></td>
					<td align="center"><?= $submission->email ?></td>
					<td align="center"><?= $submission->created_on ?></td>
					<td align="center"><?= $submission->count ?></td>
					<td align="center"><?= $submission->rating ?></td>
					<td align="center"><?= @helper('grid.enable', array('row'=>$submission)) ?></td>
					<td align="center"><?= $submission->id ?></td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
</form> 