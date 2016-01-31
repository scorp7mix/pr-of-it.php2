<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP2 Application | Article</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1><?= $article->title ?></h1>
            <p class="text-info small">От <?= $article->date ?></p>
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $article->text ?>
                </div>
            </div>
            <a class="btn btn-primary" href="/index.php" role="button">На главную</a>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>