<?php
/** @var array $sidebar - Меню */
?>
<div class="page">
    <div class="container">
        <div class="cabinet_wrapped">
            <div class="cabinet_sidebar">
                <?php if (!empty($sidebar)) : ?>
                    <div class="menu_box">
                        <ul>
                            <?php foreach ($sidebar as $link) : ?>
                                <li>
                                    <a href="<?= $link['link'] ?>"><?= $link['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cabinet_content">
                <dib class="page-content-inner">
                    <h2>Добавление сеанса</h2>
                    <form method="post" name="session_add_form">
                        <div class="news_add_form">
                            <div class="alert alert-danger <?= !empty($error_message) ? null : 'hidden' ?>">
                                <?= !empty($error_message) ? $error_message : null ?>
                            </div>

                            <div class="input_box">
                                <label for="field_title">Наименование</label>
                                <input type="text"
                                       name="session[title]"
                                       id="field_title"
                                       class="form-control"
                                       maxlength="120"
                                       value="<?= !empty($_POST['session']['title']) ? $_POST['session']['title'] : '' ?>"
                                       placeholder="Введите наименование"
                                >
                            </div>

                            <div class="input_box">
                                <label for="field_short_description">Краткое описание</label>
                                <input type="text"
                                       name="session[genre]"
                                       id="field_short_description"
                                       class="form-control"
                                       maxlength="120"
                                       value="<?= !empty($_POST['session']['genre'])
                                           ? $_POST['session']['genre']
                                           : ''
                                       ?>"
                                       placeholder="Введите краткое описание"
                                >
                            </div>
                            <div class="input_box">
                                <label for="field_short_description">Краткое описание</label>
                                <input type="date"
                                       name="session[date]"
                                       id="field_short_description"
                                       class="form-control"
                                       maxlength="120"
                                       value="<?= !empty($_POST['session']['genre'])
                                           ? $_POST['session']['genre']
                                           : ''
                                       ?>"
                                       placeholder="Введите краткое описание"
                                >
                            </div>

                            <div class="button_box">
                                <button type="submit"
                                        name="btn_session_add_form"
                                        id="btnNewsAddForm"
                                        class="btn btn-primary"
                                        value="1"
                                >Добавить
                                </button>
                            </div>

                        </div>
                    </form>
                </dib>
            </div>
        </div>
    </div>
</div>