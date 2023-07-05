<div class="row justify-content-between" data-id="<?= $post['id']; ?>">
	<div class="col-2 d-flex justify-content-center"><?= $post['name']; ?></div>
	<div class="col-2 d-flex justify-content-center"><?= $post['email']; ?></div>
	<div class="col-3 d-flex justify-content-center"><?= $post['task']; ?></div>
	<div class="col-2 d-flex justify-content-center"><?= $post['done']; ?></div>
	<div class="col-2 d-flex justify-content-center"><?= $post['updated']; ?></div>
	<? if ($admin): ?>
	  <div class="col-1">
		  <div class="edit btn btn-primary" data-bs-target="#postForm" data-bs-toggle="modal">
			  <i class="bi bi-pencil-square"></i>
		  </div>
	  </div>
	<? endif; ?>
</div>
