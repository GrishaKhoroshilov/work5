<?php
/** @var \src\model\forms\LoginForm $loginForm */
?>
<h3>Авторизация</h3>
<form method="post">
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" required class="form-control <?= (!empty($loginForm->errorList['login'])) ? 'is-invalid' : '' ?>" id="login"  placeholder="Логин" name="login" value="<?= !empty($loginForm->formData['login']) ? $loginForm->formData['login'] : '' ?>">
        <?php if (!empty($loginForm->errorList['login'])): ?>
            <div class="invalid-feedback">
                <?= $loginForm->errorList['login'] ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" required class="form-control <?= (!empty($loginForm->errorList['password'])) ? 'is-invalid' : '' ?>" id="password" placeholder="Пароль" name="password">
        <?php if (!empty($loginForm->errorList['password'])): ?>
            <div class="invalid-feedback">
                <?= $loginForm->errorList['password'] ?>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>
<a href="../../register.php">Зарегестрироваться</a>
