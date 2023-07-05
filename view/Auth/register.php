<header class="site-header sticky-top py-1 bg-light">
	<nav class="container d-flex flex-column flex-md-row justify-content-end">
		<div class="btn-group">
			<a class="py-2 d-md-inline-block btn btn-outline-primary" href="/post/index">На главную</a>
			<a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/login">Войти</a>
		</div>
	</nav>
</header>

<main>
	<form class="container сol-md-4 col-lg-4 my-4 needs-validation" id="register" novalidate>
		<div class="card"
		     oninput='confirmPassword.setCustomValidity(confirmPassword.value != password.value ? "Passwords do not match." : "")'
		>
			<div class="card-body">
			<h1>Регистрация</h1>
				<div class="alert  d-none"></div>
				<div class="d-flex flex-column">

					<div class="form-group has-validation mb-3">
						<label for="email" class="form-label">email</label>
						<input type="text" id="email" class="form-control" maxlength="50" autocomplete="on"
						       placeholder="email" required>
						<div class="invalid-feedback">
							email не может быть пустым
						</div>
					</div>


					<div class="form-group has-validation mb-3">
						<label for="password" class="form-label">пароль</label>
						<input type="text" id="password" class="form-control" maxlength="50" autocomplete="on"
						       placeholder="пароль" pattern="[a-zA-Z0-9]{3,15}"
						       name="password"
						       required
						>
						<div class="invalid-feedback">
							пароль не может быть пустым и должен содержать латинские буквы и цифры
						</div>
					</div>

					<div class="form-group has-validation mb-3">
						<label for="password" class="form-label">повторите пароль</label>
						<input type="text" id="confirmPassword" class="form-control" maxlength="50"
						       autocomplete="on"
						       placeholder="подтвердите пароль"
						       name="confirmPassword"
						       required
						>
						<div class="invalid-feedback">
							пароли не совпадают
						</div>
					</div>

					<button type="submit" id='loginBtn' class="btn btn-success btn-block my-2 float-right">Войти</button>
				</div>
			</div>

		</div>
	</form>


</main>
