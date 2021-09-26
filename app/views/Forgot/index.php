<div class="container">
    <h1>Восстановления пароля</h1>
    <p>Введите пожалуйста свой email.</p>
    <form method="post" action="<?=PATH?>/forgot">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Email address</span>
            <input type="email" name="email" class="form-control" id="description" placeholder="Email address" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <?php if(isset($_SESSION['erremail'])):?>
        <div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-6 shadow">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title">Ошибка</h5>
                        <?php echo $_SESSION['erremail']; unset($_SESSION['erremail'])?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</div>
