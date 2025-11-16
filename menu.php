<nav class="main-menu">
  <div class="menu-shell">
    <ul class="menu-list">
      <li class="menu-item">
        <span class="menu-link<?php if ($arhi == yes) echo ' active'; ?>">Архиерей</span>
        <ul class="submenu">
          <li<?php if ($arhi == yes) echo ' class="active"'; ?>><?php echo ($arhi == yes) ? '<span>Биография</span>' : '<a href="arhierei.php">Биография</a>'; ?></li>
          <li<?php if ($slovo_padre == yes) echo ' class="active"'; ?>><?php echo ($slovo_padre == yes) ? '<span>Слово архипастыря</span>' : '<a href="slovo_padre.php">Слово архипастыря</a>'; ?></li>
          <li<?php if ($raspisanie == yes) echo ' class="active"'; ?>><?php echo ($raspisanie == yes) ? '<span>Служение</span>' : '<a href="raspisanie.php">Служение</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item">
        <span class="menu-link<?php if ($new == yes) echo ' active'; ?>">Новости</span>
        <ul class="submenu">
          <li<?php if ($new == yes) echo ' class="active"'; ?>><?php echo ($new == yes) ? '<span>Новости епархии</span>' : '<a href="news.php">Новости епархии</a>'; ?></li>
          <li<?php if ($anons == yes) echo ' class="active"'; ?>><?php echo ($anons == yes) ? '<span>Анонсы и объявления</span>' : '<a href="anons.php">Анонсы и объявления</a>'; ?></li>
          <li<?php if ($pub == yes) echo ' class="active"'; ?>><?php echo ($pub == yes) ? '<span>Публикации</span>' : '<a href="pub.php">Публикации</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item">
        <span class="menu-link<?php if ($tip) echo ' active'; ?>">Документы</span>
        <ul class="submenu">
          <li<?php if ($tip == ukaz) echo ' class="active"'; ?>><?php echo ($tip == ukaz) ? '<span>Указы</span>' : '<a href="doks.php?tip=ukaz">Указы</a>'; ?></li>
          <li<?php if ($tip == raspor) echo ' class="active"'; ?>><?php echo ($tip == raspor) ? '<span>Распоряжения</span>' : '<a href="doks.php?tip=raspor">Распоряжения</a>'; ?></li>
          <li<?php if ($tip == cirk) echo ' class="active"'; ?>><?php echo ($tip == cirk) ? '<span>Циркуляры</span>' : '<a href="doks.php?tip=cirk">Циркуляры</a>'; ?></li>
          <li<?php if ($tip == udostoverenie) echo ' class="active"'; ?>><?php echo ($tip == udostoverenie) ? '<span>Удостоверения</span>' : '<a href="doks.php?tip=udostoverenie">Удостоверения</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item">
        <span class="menu-link<?php if ($histor == yes || $barysh == yes || $upravlenie == yes || $otdel == yes || $klir == yes) echo ' active'; ?>">Епархия</span>
        <ul class="submenu">
          <li<?php if ($histor == yes) echo ' class="active"'; ?>><?php echo ($histor == yes) ? '<span>История</span>' : '<a href="histor.php">История</a>'; ?></li>
          <li<?php if ($barysh == yes) echo ' class="active"'; ?>><?php echo ($barysh == yes) ? '<span>Архиереи Барышской епархии</span>' : '<a href="barysh.php">Архиереи Барышской епархии</a>'; ?></li>
          <li<?php if ($upravlenie == yes) echo ' class="active"'; ?>><?php echo ($upravlenie == yes) ? '<span>Управление</span>' : '<a href="upravlenie.php">Управление</a>'; ?></li>
          <li<?php if ($otdel == yes) echo ' class="active"'; ?>><?php echo ($otdel == yes) ? '<span>Отделы</span>' : '<a href="otdel.php">Отделы</a>'; ?></li>
          <li<?php if ($klir == yes) echo ' class="active"'; ?>><?php echo ($klir == yes) ? '<span>Духовенство</span>' : '<a href="klir.php">Духовенство</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item">
        <span class="menu-link<?php if ($prihods == yes || $mon == yes || $old_prihods == yes || $map == yes) echo ' active'; ?>">Приходы</span>
        <ul class="submenu">
          <li<?php if ($mon == yes) echo ' class="active"'; ?>><?php echo ($mon == yes) ? '<span>Жадовский монастырь</span>' : '<a href="mon.php">Жадовский монастырь</a>'; ?></li>
          <li<?php if ($prihods == yes) echo ' class="active"'; ?>><?php echo ($prihods == yes) ? '<span>Действующие приходы</span>' : '<a href="prihods.php">Действующие приходы</a>'; ?></li>
          <li<?php if ($old_prihods == yes) echo ' class="active"'; ?>><?php echo ($old_prihods == yes) ? '<span>Разрушенные храмы</span>' : '<a href="old_prihods.php">Разрушенные храмы</a>'; ?></li>
          <li<?php if ($map == yes) echo ' class="active"'; ?>><?php echo ($map == yes) ? '<span>Карта приходов</span>' : '<a href="map.php">Карта приходов</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item">
        <span class="menu-link<?php if ($video == yes || $gazeta == yes) echo ' active'; ?>">Медиа</span>
        <ul class="submenu">
          <li<?php if ($video == yes) echo ' class="active"'; ?>><?php echo ($video == yes) ? '<span>Видео</span>' : '<a href="video.php">Видео</a>'; ?></li>
          <li<?php if ($gazeta == yes) echo ' class="active"'; ?>><?php echo ($gazeta == yes) ? '<span>Газета "Моя епархия"</span>' : '<a href="gazeta.php">Газета "Моя епархия"</a>'; ?></li>
          <li<?php if ($sv_vecher == yes) echo ' class="active"'; ?>><?php echo ($sv_vecher == yes) ? '<span>Радиопередача "Светлый вечер"</span>' : '<a href="sv_vecher.php">Радиопередача "Светлый вечер"</a>'; ?></li>
        </ul>
      </li>

      <li class="menu-item single"><a href="kontakt.php" class="menu-link<?php if ($kontakt == yes) echo ' active'; ?>">Контакты</a></li>
      <li class="menu-item single"><a href="top.php" class="menu-link<?php if ($top == yes) echo ' active'; ?>">Читаемое</a></li>
    </ul>
  </div>
</nav>
