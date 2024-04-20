<!DOCTYPE html>
<html lang="en">
<?php
include_once './dbData/dbData.php';
include_once './dbData/createTable.php';
include './dbData/getData.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './title.php' ?>
    <?php $title = 'Друга таска' ?>
    <title><?php echo title($title); ?></title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
<div class="wrapper">
    <div class="data_fields">
        <div class="data_field_item id">ID</div>
        <div class="data_field_item">ПІБ</div>
        <div class="data_field_item">Пошта</div>
        <div class="data_field_item">Статус блокування</div>
        <div class="data_field_item">Дата останнього візиту</div>
    </div>
    <?php
    foreach ($query as $item) { ?>
        <form action="" method="post">
            <div class="data_items_wrapper">
                <div class="data_items">
                    <div class="data_field_item id"><?= $item['id'] ?></div>
                    <div class="data_field_item"><?= $item['name'] ?></div>
                    <div class="data_field_item"><?= $item['email'] ?></div>
                    <?php
                    if ($item['is_Block'] == 1) { ?>
                        <div class="data_field_item">
                            <img src="red.png" alt="red">
                        </div>
                    <?php } else { ?>
                        <div class="data_field_item">
                            <img src="green.png" alt="red">
                        </div>
                    <?php } ?>
                    <div class="data_field_item"><?= date("Y-m-d H:i:s", strtotime($item['last_visit'])) ?></div>
                </div>

                <div class="data_items_btn">
                    <input name="id" type="hidden" value='<?= $item['id'] ?>'>
                    <?php
                    if ($item['is_Block'] == 0) { ?>
                        <button class="btn btn-warning" type="submit" value="1" name="blockUser">Заблокувати</button>
                    <?php } else { ?>
                        <button class="btn btn-success" type="submit" value="0" name="blockUser">Розблокувати</button>
                    <?php } ?>
                    <button type="submit" class="btn btn-danger" value="1" name="deleteUser">Видалити</button>
                </div>
            </div>
        </form>
    <?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>