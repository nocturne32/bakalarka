<?php
function active($url)
{
    return current_url() === $url ? 'active' : '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Codeigniter demo</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<header class="page-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">Codeigniter demo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav"
                    aria-controls="mobile-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mobile-nav">
                <ul class="navbar-nav ml-auto">
                    <?php foreach ($menu as $url => $label): ?>
                        <li class="nav-item <?= active($url) ?>">
                            <a href="<?= $url ?>" class="nav-link"><?= html_escape($label) ?></a></li>
                    <?php endforeach; ?>
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
    <!-- </main> - footer.php-->
