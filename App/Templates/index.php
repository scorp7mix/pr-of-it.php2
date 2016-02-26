<?php $title = 'Index' ?>
<h1>Последние новости</h1>
<?php if (false !== $lastNews): ?>
    <?php foreach($lastNews as $n): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b><a href="/show?id=<?= $n->id ?>"><?= $n->title ?></a></b></h3>
            </div>
            <div class="panel-body">
                <?= $n->text ?>
            </div>
            <div class="panel-footer">
                <i>
                    <?= $n->author->name ?? 'Неизвестный автор' ?>
                    <small>(<?= $n->date ?>)</small>
                </i>
            </div>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="alert alert-warning" role="alert">Новостей не найдено</div>
<?php endif ?>
