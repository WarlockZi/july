<header class="site-header sticky-top py-1 bg-light">
	<nav class="container d-flex flex-column flex-md-row justify-content-end">

		<div class="mx-5 d-flex align-items-center"><?= $user['email'] ?></div>
		<div id="userName" class="d-none"><?= $user['name'] ?></div>
		<div id="userId" class="d-none"><?= $user['id'] ?></div>

		<div class="btn-group">

				<? if (!$user): ?>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/login">Войти</a>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/register">Регистрация</a>
				<? endif; ?>
				<? if ($user): ?>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/post/index">На главную</a>
			  <a class="py-2 d-md-inline-block btn btn-outline-primary" href="/auth/logout">Выйти</a>
				<? endif; ?>
		</div>
	</nav>
</header>
