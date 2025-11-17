<!--noindex-->
<a id="toTop" class="btn btn-outline-light back-to-top" href="#" aria-label="Вернуться наверх">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" role="img" aria-hidden="true">
    <path d="M7.247 4.86 2.451 9.657a.5.5 0 0 0 .708.708L8 5.525l4.84 4.84a.5.5 0 0 0 .707-.708L8.354 4.86a.5.5 0 0 0-.707 0z"/>
  </svg>
  <span class="visually-hidden">Наверх</span>
</a>

<footer id="footer">
  <div class="footer-shell">
    <div class="footer-inner">
      <div class="footer-grid">
        <div class="footer-col">
          <h3>Архиерей</h3>
          <a href="arhierei.php">Биография</a>
          <a href="slovo_padre.php">Слово архипастыря</a>
          <a href="raspisanie.php">Служение</a>
        </div>

        <div class="footer-col">
          <h3>Новости</h3>
          <a href="news.php">Новости епархии</a>
          <a href="anons.php">Анонсы</a>
          <a href="pub.php">Публикации</a>
        </div>

        <div class="footer-col">
          <h3>Медиа</h3>
          <a href="video.php">Видео</a>
          <a href="sv_vecher.php">Радиопередача «Светлый вечер»</a>
        </div>

        <div class="footer-col">
          <h3>Документы</h3>
          <a href="doks.php?tip=ukaz">Указы</a>
          <a href="doks.php?tip=raspor">Распоряжения</a>
          <a href="doks.php?tip=cirk">Циркуляры</a>
          <a href="doks.php?tip=udostoverenie">Удостоверения</a>
        </div>

        <div class="footer-col">
          <h3>Епархия</h3>
          <a href="histor.php">История</a>
          <a href="upravlenie.php">Управление</a>
          <a href="otdel.php">Отделы</a>
        </div>

        <div class="footer-col">
          <h3>Приходы</h3>
          <a href="mon.php">Жадовский монастырь</a>
          <a href="prihods.php">Действующие приходы</a>
          <a href="old_prihods.php">Разрушенные храмы</a>
          <a href="map.php">Карта приходов</a>
        </div>

        <div class="footer-col">
          <h3><a href="kontakt.php">Контакты</a></h3>
        </div>
      </div>

      <div class="footer-banners">
        <span class="footer-meta">© Барышская епархия, 2012 – <?php echo date('Y'); ?> гг. · Создание сайта: <a href="mailto:zhidkoff@list.ru">Сергей Жидков</a></span>

        <a href="http://www.patriarchia.ru/index.html"><img src="http://www.patriarchia.ru/images/patr_banner_88.gif" alt="Патриархия"></a>
        <a href="https://mitropolia-simbirsk.ru/" target="_blank"><img src="IMG/simbmitropolia.png" alt="Симбирская митрополия"></a>
        <a href="http://www.ekzeget.ru" target="_blank"><img src="http://www.екzeget.ru/IMG/banner.gif" alt="Экзегет"></a>
        <a href="http://лука-крымский.рф/" target="_blank"><img src="/IMG/386.jpg" alt="Лука Крымский"></a>
        <a href="http://vsehsvjatyh-glotovka.prihod.ru/" target="_blank"><img src="http://prihod.ru/pravbanners/vsehsvjatyh-glotovka.png" alt="Приход Всех святых"></a>
      </div>

      <div class="footer-bottom">
        <?php
          list($msec,$sec)=explode(' ',microtime());
          $skor_gen=(round(($sec+$msec)-$mTimeStart,4));
          echo '<span class="generator">Страница сгенерирована за <b>'.$skor_gen.'</b> сек.</span>';
        ?>
      </div>
    </div>
  </div>
</footer>
<!--/noindex-->
