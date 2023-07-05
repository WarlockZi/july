<div class="row justify-content-between" data-id="<?= $post['id']; ?>">
	<div class="col-2 d-flex justify-content-center name"><?= $post['name']; ?></div>
	<div class="col-2 d-flex justify-content-center email"><?= $post['email']; ?></div>
	<div class="col-3 d-flex justify-content-center task"><?= $post['task']; ?></div>
	<div class="col-2 d-flex justify-content-center done"><?= $post['done']; ?></div>
	<div class="col-2 d-flex justify-content-center updated"><?= $post['updated']; ?></div>
	<? if ($admin): ?>
	  <div class="col-1">
		  <div class="edit btn btn-primary" data-bs-target="#postForm" data-bs-toggle="modal">
			  <i class="bi bi-pencil-square"></i>
		  </div>
	  </div>
	<? endif; ?>
</div>
