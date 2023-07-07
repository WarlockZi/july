<? include dirname(__DIR__, 1) . '/shared/header.php' ?>

<main class="container col-lg-5">
	<div class="card">

		<div class="card-body">

			<h2 class="card-title"><?= $post[0]['title']; ?></h2>
			<h2 class="d-none" id="postId"><?= $post[0]['id']; ?></h2>

			<p class="card-text"><?= $post[0]['long_text']; ?></p>
			<div class="card-text d-flex justify-content-end"><?= $post[0]['date']; ?></div>

			<div class="container comments">

				<h5 class="card-text">Комментарии</h5>


					 <? foreach ($post as $comment): ?>

				  <div class="row mb-2">
					  <div class="text fs-6 fst-italic"><?= $comment['name']; ?></div>
					  <div class="text fs-6"><?= $comment['comment']; ?></div>
					  <div class="text fs-6 fst-italic"><?= $comment['comment_date']; ?></div>
				  </div>


					 <? endforeach; ?>

					 <? if ($user): ?>
				<div class="float-end mt-2 pt-1">
					<button type="button" data-bs-toggle="modal" data-bs-target="#commentForm"
					        class="btn btn-primary btn-sm">Оставить комментарий
					</button>
				</div>
			</div>
				<? endif; ?>


		</div>
	</div>
</main>


<!-- Modal -->
<div class="modal fade" id="commentForm" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="modal-body card-body needs-validation" novalidate>

				<div class="modal-header">
					<h5 class="modal-title" id="ModalLabel">Комментарий</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">

					<input type="hidden" id="id" class="id" value="0">

					<div class="form-group has-validation mb-3">
						<label for="name" class="form-label">имя</label>
						<input type="text" id="name" class="form-control name" maxlength="50" autocomplete="on"
						       placeholder="имя" required value="<?= $user['name'] ?>">
					</div>

					<div class="form-group has-validation mb-3">
						<label for="comment" class="form-label">Комментарий</label>
						<input type="text" id="comment" class="form-control comment" maxlength="50" autocomplete="on"
						       placeholder="Комментарий" required>
						<div class="invalid-feedback" id="emptyComment">
							Комментарий не может быть пустой
						</div>
					</div>


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button id="saveComment" class="btn btn-success btn-block my-2 float-right">Сохранить</button>
				</div>

			</form>
		</div>
	</div>
</div>


