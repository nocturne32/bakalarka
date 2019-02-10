<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = null;
echo 'User_id: ' . Yii::$app->user->id;

function isActive($url) {
    return Url::current() === $url ? 'active' : '';
}
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>

    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title><?= isset($this->title) ? Html::encode("{$this->title} | Yii2 demo") : 'Yii2 demo'?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="page-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= Url::home()?>">Yii2 demo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav"
                    aria-controls="mobile-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mobile-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= isActive(Url::home()) ?>">
                        <a href="<?= Url::home()?>" class="nav-link">Articles</a></li>
                    <li class="nav-item <?= isActive(Url::to('/articles/create')) ?>">
                        <a href="<?= Url::to('/articles/create')?>" class="nav-link">New article</a></li>
                    <li class="nav-item <?= isActive(Url::to('/articles')) ?>">
                        <a href="<?= Url::to('/articles')?>" class="nav-link">Edit articles</a></li>
                    <li class="nav-item <?= isActive(Url::to('/categories')) ?>">
                        <a href="<?= Url::to('/categories')?>" class="nav-link">Edit categories</a></li>
                    <li class="nav-item <?= isActive(Url::to('/login')) ?>">
                        <a href="<?= Url::to('/login')?>" class="nav-link">Sign in</a></li>
                    <li class="nav-item <?= isActive(Url::to('/register')) ?>">
                        <a href="<?= Url::to('/register')?>" class="nav-link">Sign up</a></li>
                    <li class="nav-item <?= isActive(Url::to('/logout')) ?>">
                        <a href="<?= Url::to('/logout')?>" class="nav-link">Sign out</a></li>
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">-->
                <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">-->
                <!--<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>-->
                <!--</form>-->
            </div>
        </div>
    </nav>
</header>

<main class="page-main">
    <?= Alert::widget() ?>
    <?= $content ?>
</main>


<footer class="page-footer">
    <div class="container-fluid text-center text-light bg-dark py-3">
        <div class="row">
            <div class="col-md-12">
                <p>This is a school project.</p>
                <a href="https://github.com/nocturne32"> David Pocar</a>
                &copy; 2019
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
