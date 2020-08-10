<h3>Здравствуйте, <?= $username ?>!</h3>
<form method="post">

    <div class="form-group">
        <label for="old_password">Старый пароль</label>
        <input type="password" required class="form-control <?= (!empty($lkForm->errorList['old_password'])) ? 'is-invalid' : '' ?>" id="old_password" placeholder="Старый пароль" name="old_password">
        <?php if (!empty($lkForm->errorList['old_password'])): ?>
            <div class="invalid-feedback">
                <?= $lkForm->errorList['old_password'] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="new_password">Новый пароль</label>
        <input type="password" required class="form-control <?= (!empty($lkForm->errorList['new_password'])) ? 'is-invalid' : '' ?>" id="new_password" placeholder="Новый пароль" name="new_password">
        <?php if (!empty($lkForm->errorList['new_password'])): ?>
            <div class="invalid-feedback">
                <?= $lkForm->errorList['new_password'] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="fio">ФИО</label>
        <input type="text" required class="form-control <?= (!empty($lkForm->errorList['fio'])) ? 'is-invalid' : '' ?>" id="fio"  placeholder="ФИО" name="fio" value="<?= !empty($lkForm->formData['fio']) ? $lkForm->formData['fio'] : '' ?>">
        <?php if (!empty($lkForm->errorList['fio'])): ?>
            <div class="invalid-feedback">
                <?= $lkForm->errorList['fio'] ?>
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Изменить</button>
</form>