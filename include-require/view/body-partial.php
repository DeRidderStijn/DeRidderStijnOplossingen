<div id="artikels">
<?php foreach ($artikels as $id => $artikel): ?>
	<div class = "artikel">
			<h1><?= $artikel["title"] ?></h1>
			<p><?= $artikel["text"] ?></p>
			<p><a href="">#<?= $artikel["tag"] ?></a></p>

	</div>
<?php endforeach ?>
</div>