<div class="container">
    <h1>Новый пароль</h1>
    <p>Введите пожалуйста свой новый пароль.</p>
    <form method="get" action="<?=PATH?>/forgot/newpass">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Password</span>
            <input type="hidden" name="key" class="form-control" value="<?=$key['key']?>">
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="pass">Отправить</button>
    </form>
</div>
