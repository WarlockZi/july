<? include dirname(__DIR__, 1) . '/shared/header.php' ?>

<main class="container col-lg-5">
	<div class="card">

		<div class="card-body">

			<h2 class="card-title"><?= $post[0]['title']; ?></h2>

			<p class="card-text"><?= $post[0]['long_text']; ?></p>
			<div class="card-text d-flex justify-content-end"><?= $post[0]['date']; ?></div>

			<h5 class="card-text">Комментарии</h5>


				<? foreach ($post as $comment): ?>

			  <div class="row mb-2">
				  <div class="text fs-6"><?= $comment['name']; ?></div>
				  <div class="text fs-5"><?= $comment['comment']; ?></div>
			  </div>


				<? endforeach; ?>

				<? if ($user): ?>

				  <div class="float-end mt-2 pt-1">
					  <button type="button" data-bs-toggle="modal" data-bs-target="#postForm" class="btn btn-primary btn-sm">Оставить комментарий</button>
				  </div>

				<? endif; ?>


		</div>
	</div>
</main>


<!-- Modal -->
<div class="modal fade" id="postForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="modal-body card-body needs-validation" novalidate>

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Задача</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">

					<input type="hidden" id="id" class="id" value="0">

					<div class="form-group has-validation mb-3">
						<label for="name" class="form-label">Имя</label>
						<input type="text" id="name" class="form-control name" maxlength="50" autocomplete="on"
						       placeholder="имя" value="<?=$user['name']?>" required>
					</div>


					<div class="form-group has-validation mb-3">
						<label for="task" class="form-label">текст задачи</label>
						<input type="text" id="task" class="form-control task" maxlength="50" autocomplete="on"
						       placeholder="текст задачи" required>
						<div class="invalid-feedback">
							задача не может быть пустой
						</div>
					</div>


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button id="postSave" type="submit" class="btn btn-success btn-block my-2 float-right">
						Сохранить
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

