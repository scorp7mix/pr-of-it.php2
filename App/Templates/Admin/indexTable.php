<?php $title = 'Admin | Index' ?>
<h1 class="pull-left">Последние новости (Администратор)</h1>
<div class="pull-right">
    <h1><a class="btn btn-primary" href="/admin/news/edit">Добавить новость</a></h1>
</div>
<div class="clearfix"></div>
<br>
<div class="row">
    <?php if (!empty($data)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>PK</th>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?= $cell ?></td>
                        <?php endforeach; ?>
                        <td><a href="/admin/news/edit?id=<?= $row[0] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                        <td><a href="/admin/news/delete?id=<?= $row[0] ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">Новостей не найдено</div>
    <?php endif ?>
</div>
