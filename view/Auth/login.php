<?include dirname(__DIR__,1).'/shared/header.php'?>

<main>
	<form class="container сol-md-3 col-lg-3 my-4 needs-validation" id="login" novalidate >
		<div class="card" >
			<div class="card-body">
				<h1>Вход</h1>
				<div class="alert d-none">Неверные email или пароль</div>
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
