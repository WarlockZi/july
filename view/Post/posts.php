<? foreach ($posts as $post): ?>

	<div class="row justify-content-between" data-id="<?= $post['id']; ?>">
		<a href="/post/edit/<?= $post['id']; ?>" class="col-2 d-flex justify-content-start title"><?= $post['title']; ?></a>
		<div class="col-8 d-flex justify-content-center"><?= $post['short_text']; ?></div>
		<div class="col-2 d-flex justify-content-center"><?= $post['date']; ?></div>

	</div>
<? endforeach; ?>