<?php
/** @var \src\model\forms\RegistrationForm $regForm */
?>
<h3>Регистрация</h3>
<form method="post">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" required class="form-control <?= (!empty($regForm->errorList['email'])) ? 'is-invalid' : '' ?>" id="email" placeholder="name@example.com" name="email" value="<?= isset($regForm->formData['email']) ? $regForm->formData['email'] : '' ?>">
        <?php if (!empty($regForm->errorList['email'])): ?>
            <div class="invalid-feedback">
                <?= $regForm->errorList['email'] ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" required class="form-control <?= (!empty($regForm->errorList['login'])) ? 'is-invalid' : '' ?>" id="login"  placeholder="Логин" name="login" value="<?= isset($regForm->formData['login']) ? $regForm->formData['login'] : '' ?>">
        <?php if (!empty($regForm->errorList['login'])): ?>
            <div class="invalid-feedback">
                <?= $regForm->errorList['login'] ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" required class="form-control <?= (!empty($regForm->errorList['password'])) ? 'is-invalid' : '' ?>" id="password" placeholder="Пароль" name="password">
        <?php if (!empty($regForm->errorList['password'])): ?>
            <div class="invalid-feedback">
                <?= $regForm->errorList['password'] ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="repassword">Подтвердите Пароль</label>
        <input type="password" required class="form-control <?= (!empty($regForm->errorList['repassword'])) ? 'is-invalid' : '' ?>" id="repassword" placeholder="Подтвердите Пароль" name="repassword">
        <?php if (!empty($regForm->errorList['repassword'])): ?>
            <div class="invalid-feedback">
                <?= $regForm->errorList['repassword'] ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="fio">ФИО</label>
        <input type="text" required class="form-control <?= (!empty($regForm->errorList['fio'])) ? 'is-invalid' : '' ?>" id="fio"  placeholder="ФИО" name="fio" value="<?= isset($regForm->formData['fio']) ? $regForm->formData['fio'] : '' ?>">
        <?php if (!empty($regForm->errorList['fio'])): ?>
            <div class="invalid-feedback">
                <?= $regForm->errorList['fio'] ?>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>