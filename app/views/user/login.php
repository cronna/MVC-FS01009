<div class="page">
    <div class="container">
        <div class="auth_block">
            
            <form name="auth_form" method="post">
                <div class="auth_form">
                    <h1 style="background: rgb(31, 41, 55);" class="title">Авторизация</h1>
                    <div class="alert alert-danger <?= !empty($error_message) ? null : 'hidden' ?>">
                        <?= !empty($error_message) ? $error_message : null ?>
                    </div>
                    <div class="input_box">
                        <label class="log-label" for="field_login">Логин</label>
                        <input type="text"
                               name="login"
                               id="field_login"
                               maxlength="24"
                               value="<?= !empty($_POST['login']) ? $_POST['login'] : '' ?>"
                               placeholder="Введите логин"
                        >
                    </div>
                    <div class="input_box">
                        <label class="log-label" for="field_password">Пароль</label>
                        <input type="password"
                               name="password"
                               id="field_password"
                               placeholder="Введите пароль"
                        >
                    </div>

                    <div class="links_box" style="background: rgb(31, 41, 55);">
                        <a style="background: rgb(31, 41, 55);" href="/user/registration">Регистрация</a>
                    </div>
                    <div class="button_box">
                        <button type="submit"
                                name="btn_login_form"
                                id="btnLoginForm"
                                class="btn btn-primary"
                                value="1"
                        >Войти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>