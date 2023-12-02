<?php
/** @var array $sidebar - Меню */
/** @var string $role - Список новостей */
/** @var array $news - Роль пользователя */

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
    <div class="main-content">
        <div class="content-header">
            <h2>сегодня</h2>
            <div class="m-c-content">
                <div class="s-items">
                    <?php $i = 1;
                    while($i <= 4){    ?>
                        <div class="s-i-row">
                            <?php $j = 1;
                            while($j <= 2){    ?>
                                <?php foreach($news as $item){ ?>
                                    <a href="" class="n-item">
                                        <img src="https://avatars.dzeninfra.ru/get-zen_doc/271828/pub_6568c3f024c97f15f649aca1_6568c50cf6adc66bb9be86e1/scale_1200" alt="">
                                        <div class="title"><?= $item['title'] ?> </div>
                                        <div class="s-desc"><?= $item['short_description'] ?></div>
                                        <div class="date"><?= date('j F',strtotime($item['date_create']))?></div>
                                    </a>
                                <?php $j++; } ?>
                            <?php $i++; } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>