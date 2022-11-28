<?php
    include 'data/bdConnect.php';

    $request = "SELECT client_first_name, client_middle_name, client_last_name FROM clients";
    $result = mysqli_query($link, $request);

    $request = "SELECT id, worker_first_name, worker_middle_name, worker_last_name FROM workers WHERE worker_post='Прораб' AND worker_status='Свободен'";
    $resultWorker = mysqli_query($link, $request);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reseter.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Добавление объекта</title>
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
                        <li class="menu__list-item menu__list-item--orders">
                            <a href="orders.php" class="menu__link">Заказы</a>
                        </li>
                        <li class="menu__list-item menu__list-item--client">
                            <a href="clients.php" class="menu__link">Клиенты</a>
                        </li>
                        <li class="menu__list-item menu__list-item--active menu__list-item--objects">
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
                <h1 class="info__title info__title--margin-bottom40px">Добавление нового объекта</h1>
                <form action="scenaries/objectAdd.php" class="edit-form" method="POST">
                    <label class="edit-form__label">Наименование объекта</label>
                    <input required type="text" name="object_name" class="edit-form__input">
                    <label class="edit-form__label">Владелец объекта</label>
                    <select name="object_owner" class="edit-form__input">
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                $fullName = $row['client_last_name'] . ' ' . $row['client_first_name'] . ' ' . $row['client_middle_name'];
                            ?>
                                <option value="<?=$fullName?>"><?=$fullName?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <label class="edit-form__label">Стоимость работ</label>
                    <input reauired type="number" min="0" name="object_amount" class="edit-form__input">
                    <label class="edit-form__label">Категория объекта</label>
                    <select name="object_category" class="edit-form__input">
                        <option>Жилой объект</option>
                        <option>Нежилой объект</option>
                    </select>
                    <label class="edit-form__label">Выберите прораба</label>
                    <select name="object_foreman" class="edit-form__input">
                        <?php
                            while($row = mysqli_fetch_assoc($resultWorker)) {
                                $fullName = $row['worker_last_name'] . ' ' . $row['worker_first_name'] . ' ' . $row['worker_middle_name'];
                            ?>
                                <option value="<?=$row['id']?>"><?=$fullName?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <label class="edit-form__label">Телефон</label>
                    <input required type="text" name="object_phone" class="edit-form__input mask-phone">
                    <label class="edit-form__label">Индекс</label>
                    <input required type="text" name="object_index" class="edit-form__input mask-index">
                    <label class="edit-form__label">Регион</label>
                    <input required type="text" name="object_region" class="edit-form__input">
                    <label class="edit-form__label">Город</label>
                    <input required type="text" name="object_city" class="edit-form__input">
                    <label class="edit-form__label">Улица</label>
                    <input required type="text" name="object_street" class="edit-form__input">
                    <label class="edit-form__label">Дом</label>
                    <input required type="number" min="0" name="object_home" class="edit-form__input">
                    <input type="submit" name="edit-submit" class="edit-form__submit" value="Добавить">
                </form>
                </div>
            </div>
        </div>
    </section>
    <script src="Js/JQuery.min.js"></script>
    <script src="Js/jquery.maskedinput.min.js"></script>
    <script src="Js/main.js"></script>
</body>
</html>