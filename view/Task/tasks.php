<? foreach ($tasks as $task): ?>

	<div class="row" data-id="<?= $task['id']; ?>">
		<div class="col-2 d-flex justify-content-center name"><?= $task['name']; ?></div>
		<div class="col-2 d-flex justify-content-center email"><?= $task['email']; ?></div>
		<div class="col-3 d-flex justify-content-center task"><?= $task['task']; ?></div>
		<div class="col-2 d-flex justify-content-center done"><?= $task['done']; ?></div>
		<div class="col-2 d-flex justify-content-center updated"><?= $task['updated']; ?></div>
		<? if ($admin): ?>
			<div class="col-1">
				<div class="edit btn btn-primary" data-bs-target="#taskForm" data-bs-toggle="modal">
					<i class="bi bi-pencil-square"></i>
				</div>
			</div>
		<? endif; ?>
	</div>
<? endforeach; ?>