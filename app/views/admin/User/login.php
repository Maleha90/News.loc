<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/public/css/my.css">
    <title>Login</title>
</head>
<body style="background-image: url('https://images.unsplash.com/photo-1629993470881-09a7578cf96e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1402&q=80')">
<div class="box">
    <h2 class="header">Login</h2>
    <form class="main_contact" action="<?=ADMIN;?>/user/login" method="post">
        <div class="inputBox">
            <input type="text" name="login" required="">
            <label for="">Login</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required="">
            <label for="">Password</label>
        </div>
        <input class="btn" type="submit" value="Login">
    </form>
    <a class="login_btn" href="<?= PATH;?>">HOME</a>
    <a style="color: #fff; text-decoration: none;" href="<?=PATH;?>/forgot">Забыл пароль?</a>
    <?php if(isset($_SESSION['error'])):?>
    <div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-6 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Ошибка</h5>
                    <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>
</body>
</html>