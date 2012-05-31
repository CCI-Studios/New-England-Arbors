<? defined('KOOWA') or die('Nooku not installed'); ?>
<? @helper('behavior.mootools') ?>
<style src="media://lib_koowa/css/koowa.css" />
<script src="media://lib_koowa/js/koowa.js" />

<form action="<?= @route('view=dealers') ?>" method="get" class="-koowa-grid">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="10">&nbsp;</th>
				<th><?= @helper('grid.sort', array('column'=>'title')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'address1', 'title'=>'Address 1')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'address2', 'title'=>'Address 2')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'city')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'state')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'country')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'zip')) ?></th>
				<th width="75"><?= @helper('grid.sort', array('column'=>'enabled')) ?></th>
				<th width="10"><?= @helper('grid.sort', array('column'=>'id', 'title'=>'ID')) ?></th>
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
			<? foreach($dealers as $dealer): ?>
				<tr>
					<td><?= @helper('grid.checkbox', array('row', $dealer)) ?></td>
					<td><a href="<?= @route('view=dealer&id='. $dealer->id) ?>">
						<?= $dealer->title; ?>
					</a></td>
					<td align="center"><?= $dealer->address1 ?></td>
					<td align="center"><?= $dealer->address2 ?></td>
					<td align="center"><?= $dealer->city ?></td>
					<td align="center"><?= $dealer->state ?></td>
					<td align="center"><?= $dealer->country ?></td>
					<td align="center"><?= $dealer->zip ?></td>
					<td align="center"><?= @helper('grid.enable', array('row'=>$dealer)) ?></td>
					<td align="center"><?= $dealer->id ?></td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
</form> 