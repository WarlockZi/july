<?include dirname(__DIR__,1).'/shared/header.php'?>

<main>
	<div class="container сol-md-4 my-5 fs-6 post-page">
		<div class="row justify-content-end ">

			<div class="row post-head justify-content-between">
				<div class="col-2 text-center" data-sort="name">
					<p class="font-weight-bold">заголовок</p>
				</div>
				<div class="col-2 text-center" data-sort="email">
					<p class="font-weight-bold">краткое содержание</p>
				</div>
				<div class="col-3 text-center">
					<p class="font-weight-bold">дата создания</p>
				</div>


			</div>
			<hr>
			<div class="posts">
					 <?= $posts ?>
			</div>
		</div>

		<div class="container col-md-8 d-flex my-5 justify-content-center">
			<div class="btn-group me-2" role="group" id="pagination">
					 <? for ($i = 1; $i <= $pages; $i++): ?>
				  <button type="button" class="btn btn-secondary"><?= $i ?></button>
					 <? endfor; ?>
			</div>
		</div>

	</div>


</main>


