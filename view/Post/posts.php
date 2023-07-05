<? foreach ($posts as $post): ?>

	<div class="row justify-content-between" data-id="<?= $post['id']; ?>">
		<a href="/post/edit/<?= $post['id']; ?>" class="col-2 d-flex justify-content-center name"><?= $post['title']; ?></a>
		<div class="col-2 d-flex justify-content-center email"><?= $post['short_text']; ?></div>
		<div class="col-3 d-flex justify-content-center post"><?= $post['date']; ?></div>

	</div>
<? endforeach; ?>