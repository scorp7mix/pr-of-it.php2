<?php $title = 'Admin | Article' ?>
<h1>Редактирование новости</h1>
<div class="row">
    <div class="col-xs-6 col-xs-offset-3">
        <form method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="title" class="col-xs-3 control-label">Заголовок</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $article->title ?>" required>
                    <?php if ($errors['title']): ?>
                        <div class="alert alert-danger"><?= $errors['title']->getMessage() ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="text" class="col-xs-3 control-label">Текст</label>
                <div class="col-xs-9">
                    <textarea class="form-control" id="text" name="text" rows="5" required><?= $article->text ?></textarea>
                    <?php if ($errors['text']): ?>
                        <div class="alert alert-danger"><?= $errors['text']->getMessage() ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="author_id" class="col-xs-3 control-label">Автор</label>
                <div class="col-xs-9">
                    <select class="form-control" name="author_id">
                        <option></option>
                        <?php foreach ($authors as $author): ?>
                            <option value="<?= $author->id ?>" <?= $author->id === $article->author->id ? 'selected' : '' ?>><?= $author->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-xs-3 control-label">Дата</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="date" name="date" value="<?= $article->date ?>" placeholder="0000-00-00 00:00:00">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 text-center">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<a class="btn btn-primary" href="/admin/news/index" role="button">На главную</a>
