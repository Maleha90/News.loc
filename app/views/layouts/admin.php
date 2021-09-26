<!doctype html>
<html lang="en">
<head>
    <base href="<?=ADMIN?>">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/public/image/news.png" type="image/png" />
    <link rel="stylesheet" href="/public/css/jquery-ui.css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/public/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/fullcalendar/main.css">
    <link rel="stylesheet" href="/public/css/my.css">
    <?php echo $this->getMeta()?>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= PATH;?>" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="<?= ADMIN;?>" class="nav-link px-2 text-white">Admin</a></li>
            </ul>
            <div class="text-end">
                <a class="btn btn-danger btn-flat" href="<?=ADMIN;?>/user/logout" role="button">Exit</a>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    <?=$content;?>
</div>

<script>
    let adminpath = '<?= ADMIN;?>'
</script>

<script src="/public/js/jquery-3.6.0.min.js"></script>
<script src="/public/js/jquery-ui.js"></script>
<script src="/public/js/ajaxupload.js"></script>
<script src="/public/admins/my.js"></script>

</body>
</html>
