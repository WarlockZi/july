<? include dirname(__DIR__, 1) . '/shared/header.php' ?>

<main class="container col-lg-5">
	<div class="card">

		<div class="card-body">

			<h2 class="card-title"><?= $post['title']; ?></h2>

			<p class="card-text"><?= $post['long_text']; ?></p>
			<p class="card-text"><?= $post['date']; ?></p>

			<h5 class="card-text">Комментарии</h5>


				<? foreach ($comments as $comment): ?>

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
					  <button type="button" class="btn btn-primary btn-sm">Post comment</button>
				  </div>
			  </div>
				<? endif; ?>


		</div>
	</div>
</main>


