<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP2 Application | Admin | Index</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="pull-left">Последние новости (Администратор)</h1>
            <div class="pull-right">
                <h1><a class="btn btn-primary" href="/admin.php?act=edit">Добавить новость</a></h1>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="row">
                <?php if (false !== $lastNews): ?>
                    <?php foreach ($lastNews as $n): ?>
                        <div class="col-xs-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <?= $n->title ?>
                                        <div class="pull-right">
                                            <a href="/admin.php?act=edit&id=<?= $n->id ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <a href="/admin.php?act=delete&id=<?= $n->id ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </div>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">Новостей не найдено</div>
                <?php endif ?>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>