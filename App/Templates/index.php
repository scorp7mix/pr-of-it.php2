<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP2 Application | Index</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Последние новости</h1>
            <?php if (false !== $lastNews): ?>
                <?php foreach($lastNews as $n): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a href="article.php?id=<?= $n->id ?>"><?= $n->title ?></a></h3>
                        </div>
                        <div class="panel-body">
                            <?= $n->text ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">Новостей не найдено</div>
            <?php endif ?>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>