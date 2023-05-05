<header class="site-header sticky-top py-1 bg-light">
	<nav class="container d-flex flex-column flex-md-row justify-content-end">
		<div class="btn-group">
			<a class="py-2 d-md-inline-block btn btn-outline-primary" href="/task/index">К делам</a>
		</div>
	</nav>
</header>

<main>
	<form class="container сol-md-4 my-4 needs-validation" id="login" novalidate >
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column">

					<div class="alert alert-danger alert-dismissible fade" role="alert">
						неправильные реквизиты доступа
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>

					<div class="form-group has-validation mb-3">
						<label for="name" class="form-label">имя</label>
						<input type="text" id="name" class="form-control" maxlength="50" autocomplete="on"
						       placeholder="имя" required>
						<div class="invalid-feedback">
							имя не может быть пустым
						</div>
					</div>


					<div class="form-group has-validation mb-3">
						<label for="password" class="form-label">пароль</label>
						<input type="text" id="password" class="form-control" maxlength="50" autocomplete="on"
						       placeholder="пароль" pattern="[a-zA-Z0-9]{3,15}" required>
						<div class="invalid-feedback">
							пароль не может быть пустым и должен содержать латинские буквы и цифры
						</div>
					</div>

					<button type="submit" id='loginBtn' class="btn btn-success btn-block my-2 float-right">Войти</button>
				</div>
			</div>

		</div>
	</form>


</main>
