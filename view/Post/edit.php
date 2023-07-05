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
			  <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
				  <div class="d-flex flex-start w-100">
					  <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
						  <label class="form-label" for="textAreaExample">Комментарий</label>
					  </div>
				  </div>
				  <div class="float-end mt-2 pt-1">
					  <button type="button" class="btn btn-primary btn-sm">Оставить комментарий</button>
				  </div>
			  </div>
				<? endif; ?>


		</div>
	</div>
</main>


