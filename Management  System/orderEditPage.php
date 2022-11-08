<?php
    include 'data/bdConnect.php';
    include 'functions/functions.php';
    
    $id = $_GET['id'];
    $request = "SELECT * FROM orders WHERE id='$id'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reseter.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Система управления</title>
</head>
<body>
    <section class="section">
        <div class="main-container">
            <div class="menu">
                <div class="menu__wrapper">
                    <div class="logo">
                        <a href="index.html" class="logo__link">
                            <div class="logo__wrapper">
                                <div class="logo-icon">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="16" cy="16" r="16" fill="#3751FF"/>
                                        <path d="M11 10C11 9.44772 11.4477 9 12 9H15.9905C18.2127 9 19.9333 9.60955 21.1524 10.8287C22.3841 12.0478 23 13.765 23 15.9803C23 18.2088 22.3841 19.9391 21.1524 21.1713C19.9333 22.3904 18.2127 23 15.9905 23H12C11.4477 23 11 22.5523 11 22V10Z" fill="url(#paint0_linear_584_285)"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_584_285" x1="11" y1="9" x2="23" y2="23" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.7"/>
                                        <stop offset="1" stop-color="white"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <span class="logo__text">
                                    Система управления
                                </span>
                            </div>
                        </a>
                    </div>
                    <ul class="menu__list">
                        <li class="menu__list-item menu__list-item--active menu__list-item--orders">
                            <a href="orders.php" class="menu__link">Заказы</a>
                        </li>
                        <li class="menu__list-item menu__list-item--client">
                            <a href="clients.php" class="menu__link">Клиенты</a>
                        </li>
                        <li class="menu__list-item menu__list-item--objects">
                            <a href="objects.php" class="menu__link">Объекты</a>
                        </li>
                        <li class="menu__list-item menu__list-item--employyes">
                            <a href="workers.php" class="menu__link">Сотрудники</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="info">
                <div class="info__wrapper">
                    <h1 class="info__title">Редактирование данных заказа</h1>
                    <div class="info__table-wrapper">
                        <table class="info__table">
                            <tr class="info__table-row">
                                <th class="info__table-column">Наименование объекта</th>
                                <th class="info__table-column">Сумма заказа</th>
                                <th class="info__table-column">Дата размещения</th>
                                <th class="info__table-column">Плановая дата заавершения</th>
                            </tr>
                            <tr class="info__table-row">
                                <td class="info__table-column"><?=$row['order_name']?></td>
                                <td class="info__table-column"><?=$row['order_amount']?> руб.</td>
                                <td class="info__table-column"><?=fixDate($row['order_start_date'])?></td>
                                <td class="info__table-column"><?=fixDate($row['order_end_date'])?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <form action="scenaries/orderUpdate.php?id=<?=$id?>" class="edit-form" method="POST">
                        <label class="edit-form__label" for="name">Наименование объекта</label>
                        <input type="text" id="name" name="order_name" class="edit-form__input">
                        <label class="edit-form__label" for="first-name">Сумма заказа</label>
                        <input type="text" id="first-name" name="order_amount" class="edit-form__input">
                        <label class="edit-form__label" for="middle-name">Дата размещения</label>
                        <input type="date" min="1900-01-01" max="2099-09-13" id="middle-name" name="order_end_date" class="edit-form__input">
                        <label class="edit-form__label" for="phone">Плановая дата завершения</label>
                        <input type="date" min="1900-01-01" max="2099-09-13" id="phone" name="order_start_date" class="edit-form__input">
                        <input type="submit" name="edit-submit" class="edit-form__submit" value="Изменить">
                    </form>
            </div>
        </div>
    </section>
    <script src="Js/JQuery.min.js"></script>
    <script src="Js/jquery.maskedinput.min.js"></script>
    <script src="Js/main.js"></script>
</body>
</html>