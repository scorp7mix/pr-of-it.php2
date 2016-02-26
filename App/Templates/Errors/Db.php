<?php $title = 'DB Error' ?>
<h2>Ошибка базы данных</h2>
<div class="alert alert-danger">
    <?php
    switch ($error) {
        case 1:
            echo 'Не удалось подключиться к базе данных';
            break;
        case 2:
            echo 'Ошибка при выполнении запроса';
            break;
        default:
            echo 'Неизвестная ошибка';
    }
    ?>
</div>
