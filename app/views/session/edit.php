<?php
/** @var array $sidebar - Меню */
/** @var string $role - Список новостей */
/** @var array $session - Роль пользователя */

use app\lib\UserOperation;

?>
<?php if (!empty($sidebar)) : ?>
    <header>
        <section class="container">
            <a href="/" class="logo">КИНО</a>
            <nav>
                <?php foreach ($sidebar as $link) : ?>
                    <a href="<?= $link['link'] ?>"><?= $link['title'] ?></a>
                <?php endforeach; ?>
            </nav>
            <form action="" class="search-form">
                <input type="text" placeholder="поиск">
                <button class="button search-button" type="submit"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 612.08 612.08" style="enable-background:new 0 0 612.08 612.08;" xml:space="preserve"><g><path  d="M237.927,0C106.555,0,0.035,106.52,0.035,237.893c0,131.373,106.52,237.893,237.893,237.893c50.518,0,97.368-15.757,135.879-42.597l0.028-0.028l176.432,176.433c3.274,3.274,8.48,3.358,11.839,0l47.551-47.551c3.274-3.274,3.106-8.703-0.028-11.838L433.223,373.8c26.84-38.539,42.597-85.39,42.597-135.907C475.82,106.52,369.3,0,237.927,0zM237.927,419.811c-100.475,0-181.918-81.443-181.918-181.918S137.453,55.975,237.927,55.975s181.918,81.443,181.918,181.918S338.402,419.811,237.927,419.811z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></button>
            </form>
            <a href="/user/profile" class="account"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 229.99 229.99"><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M115,15A100.11,100.11,0,0,1,215,115,98.89,98.89,0,0,1,203.7,161.2a101.14,101.14,0,0,1-30.14,34.86,100,100,0,0,1-117.12,0A101.06,101.06,0,0,1,26.29,161.2,98.89,98.89,0,0,1,15,115,100.11,100.11,0,0,1,115,15m0-15A115,115,0,1,0,230,115,115,115,0,0,0,115,0Z"/><path class="cls-1" d="M122.27,145.08a45.14,45.14,0,0,1,45.08,45.09v10a100.12,100.12,0,0,1-104.71,0v-10a45.14,45.14,0,0,1,45.08-45.09h14.55m0-15H107.72a60.08,60.08,0,0,0-60.08,60.09v18a115,115,0,0,0,134.71,0v-18a60.08,60.08,0,0,0-60.08-60.09Z"/><path class="cls-1" d="M115,73.31A18.82,18.82,0,1,1,96.18,92.12,18.83,18.83,0,0,1,115,73.31m0-15a33.82,33.82,0,1,0,33.81,33.81A33.82,33.82,0,0,0,115,58.31Z"/></g></g></svg></a>
        </section>
    </header>
<?php endif; ?>
<section class="container">
<form method="post" class="session-form" name="session_add_form" enctype="multipart/form-data">
    <h3>новый сеанс</h3>
    <div class="session_add_form">
        <div class="alert alert-danger <?= !empty($error_message) ? null : 'hidden' ?>">
            <?= !empty($error_message) ? $error_message : null ?>
        </div>

        <div class="name-img">
            <div class="input_box">
            <label for="field_title">название фильма:</label>
            <input type="text"
                name="session[title]"
                id="field_title"
                class="form-control"
                maxlength="120"
                value="<?= $session['title']?>"
                placeholder="max: 120"
            >
            </div>
        </div>
        <div class="input_box">
            <label for="field_short_description">описание:</label>
            <textarea name="session[desc]"
                    id="field_short_description"
                    maxlength="300"
                    placeholder="max: 300"
                    cols="20" rows="4"
            ><?= $session['s_desc'] ?></textarea>
        </div>
        <div class="date-time">
            <div class="input_box">
                <label for="field_short_description">дата:</label>
                <input type="date"
                        name="session[date]"
                        id="field_short_description"
                        class="form-control date"
                        maxlength="120"
                        value="<?= $session['session_date'] ?>"
                        placeholder="Введите краткое описание"
                >
            </div>
            <div class="input_box">
                <label for="field_short_description">время начала:</label>
                <input type="time"
                        name="session[start_time]"
                        id="field_short_description"
                        class="form-control time"
                        maxlength="120"
                        value="<?= $session['start_time'] ?>"
                        placeholder="Введите краткое описание"
                >
            </div>
            <input id="img" type="file" name="img" class="file_input" >
        </div>
        <div class="button_box">
        <button type="submit"
                name="btn_session_edit_form"
                id="btnNewsAddForm"
                class="btn btn-primary"
                value="1"
        >изменить</button>
        </div>
    </div>
</form>
</section>