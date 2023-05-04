<header class="site-header sticky-top py-1 bg-light">
	<nav class="container d-flex flex-column flex-md-row justify-content-end">
		<div class="btn-group">
				<? if (!$admin): ?>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/login">Войти</a>
				<? endif; ?>
				<? if ($admin): ?>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/logout">Выйти</a>
				<? endif; ?>
		</div>
	</nav>
</header>

<main>
	<div class="container сol-md-4 my-5 fs-6 task-page">
		<div class="row justify-content-end ">

			<button type="button" id="newTaskBtn" class="btn btn-primary col-4 float-end mb-4" data-bs-toggle="modal"
			        data-bs-target="#taskForm" data-create>
				Новая задача
			</button>


			<div class="row task-head justify-content-between">
				<div class="col-2 text-center" data-sort="name">
					<i class="bi bi-sort-alpha-down px-1"></i>
					<p class="font-weight-bold">имя</p>
				</div>
				<div class="col-2 text-center" data-sort="email">
					<i class="bi bi-sort-alpha-down px-1"></i>
					<p class="font-weight-bold">email</p>
				</div>
				<div class="col-3 text-center">
					<p class="font-weight-bold">текст задачи</p>
				</div>
				<div class="col-2 text-center" data-sort="done">
					<i class="bi bi-sort-alpha-down px-1"></i>
					<p class="font-weight-bold">статус</p>
				</div>
				<div class="col-2 text-center">
					<p class="font-weight-bold">пометка</p>
				</div>
					 <? if ($admin): ?>
				  <div class="col-1 text-center">
					  <p class="font-weight-bold"> редакт.</p>
				  </div>
					 <? endif; ?>
			</div>
			<hr>
			<div class="tasks">
					 <?= $tasks ?>
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


<!-- Modal -->
<div class="modal fade" id="taskForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<label for="name" class="form-label">имя</label>
						<input type="text" id="name" class="form-control name" maxlength="50" autocomplete="on"
						       placeholder="имя" required>
						<div class="invalid-feedback">
							имя не может быть пустым
						</div>
					</div>

					<div class="form-group has-validation mb-3">
						<label for="email" class="form-label">email</label>
						<input type="text" id="email" class="form-control email" maxlength="50" autocomplete="on"
						       placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
						<div class="invalid-feedback">
							email не может быть пустым и должен содержать значок @
						</div>
					</div>

					<div class="form-group has-validation mb-3">
						<label for="task" class="form-label">текст задачи</label>
						<input type="text" id="task" class="form-control task" maxlength="50" autocomplete="on"
						       placeholder="текст задачи" required>
						<div class="invalid-feedback">
							задача не может быть пустой
						</div>
					</div>

					<div class="form-check form-switch my-1">
						<label class="form-check-label" for="done">Выполнена</label>
						<input class="form-check-input done" type="checkbox" id="done" value="0">
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button id="taskSave" type="submit" class="btn btn-success btn-block my-2 float-right">
						Сохранить
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

<div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
	<div class="d-flex">
		<div class="toast-body">
			Создано.
		</div>
		<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Закрыть"></button>
	</div>
</div>
