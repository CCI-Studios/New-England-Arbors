<style src="/media/com_dealers/css/com_dealers.css" />
<? @helper('behavior.modal') ?>
<? @helper('behavior.mootools') ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" />
<script src="/media/com_dealers/js/com_dealers.js" />


<div class="item-page">
	<h1>Dealers</h1>

	<div id="map-canvas" style="width: 500px; height: 350px;"></div>

	<p>Search for a dealer <?= @helper('listbox.states', array('attribs'=>array('id'=>'location-select'))) ?></p>

	<div class="com_dealers">
		<? foreach($dealers as $dealer): ?>
		<div class="dealer" data-state="<?= $dealer->state ?>">
			<h3>
				<?= $dealer->title ?>
				(<?= $dealer->authorized? 'Authorized Dealer' : 'Authorized Drop Shipper' ?>)
			</h3>
			<p>
				<?= $dealer->address1? $dealer->address1.'</br>':'' ?>
				<?= $dealer->address2? $dealer->address2.'</br>':'' ?>
				<?= $dealer->city? $dealer->city.'</br>':'' ?>
				<?= $dealer->state? $dealer->state.', ':'' ?>
				<?= $dealer->country? $dealer->country.'</br>':'' ?>
				<?= $dealer->zip? $dealer->zip:'' ?>
			</p>
		</div>
		<? endforeach; ?>
	</div>
</div>