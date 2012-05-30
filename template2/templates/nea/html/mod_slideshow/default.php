<script src="/templates/nea/javascript/com_slideshow.js" />
<style src="/templates/nea/css/com_slideshow.css" />

<div id="slideshow-<?= $moduleID ?>" class="mod_slideshow loading <?= $style ?>"><div><div>
	
	<div class="slides"><div>
		<? $first = true;
		foreach($slides as $index => $slide): ?>
		<div class="slide <?php if ($first) { echo 'active'; $first = false; } ?>"><div>
			<? if ($slide->description1) { echo "<div class=\"description\"><div>{$slide->description1}</div></div>"; } ?>
			<? if ($slide->image1) { echo "<div class=\"image\"><div><img src=\"{$imagePath}{$slide->image1}\" alt=\"\" /></div></div>"; } ?>
		</div></div>
		<? endforeach; ?>
	</div></div>

	<div class="thumbs"><div><div>
		<? $first = true;
		foreach($slides as $index => $slide): ?>
		<div class="thumb <?php if ($first) { echo 'active'; $first = false; } ?>"><div><div>
			<div class="title"><?= $slide->title ?></div>
			<div class="preview"><img src="<?= "{$imagePath}{$slide->image2}" ?>" /></div>
			<div class="indicator"></div>
		</div></div></div>
		<? endforeach; ?>
	</div></div></div>
</div></div></div>

<script>
window.addEvent('domready', function() {
	var slideshow = new CCI.Slideshow('slideshow-<?= $moduleID ?>', <?= json_encode($options) ?>);
	<? if ($autoplay): ?>
	slideshow.addEvent('ready', function () {
		slideshow.start();
	});
	<? endif; ?>
});
</script>
