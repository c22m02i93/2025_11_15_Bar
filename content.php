<aside id="content_right" class="sidebar-stack">
  <div class="card card-section">
    <div class="card-body text-center">
      <a href="//www.yandex.ru/?add=178939&from=promocode" class="text-decoration-none fw-semibold text-dark">
        Наш новостной виджет на <span class="text-danger">Я</span><span class="text-dark">ндекс</span>
      </a>
    </div>
  </div>

  <div class="card card-section">
    <div class="card-header text-center py-3">
      <span class="section-title">Календарь епархии</span>
    </div>
    <div class="card-body calendar-list">
      <?php
      mysql_connect("localhost", "host1409556", "0f7cd928");
      mysql_query("SET NAMES 'cp1251'");
      $today = date('Y-m-d');
      $month = date('m');
      $calendar = mysql_query("SELECT * FROM host1409556_barysh.calendar WHERE DATE_FORMAT(data, '%m') = '$month' ORDER BY data ASC");
      if ($calendar && mysql_num_rows($calendar) > 0) {
          while ($row = mysql_fetch_assoc($calendar)) {
              $date = strtotime($row['data']);
              $dayLabel = date('d.m', $date);
              echo '<div class="date-item">';
              echo '<div class="calendar-date">' . date('d F', $date) . '</div>';
              echo '<p class="mb-1 fw-semibold">' . $row['kategoriya'] . '</p>';
              echo '<p class="mb-0"><a href="' . $row['url'] . '" target="_blank">' . $row['tema'] . '</a></p>';
              echo '</div>';
              echo '<hr class="my-3" />';
          }
      } else {
          echo '<p class="mb-0 text-muted text-center">Нет записей на текущий месяц.</p>';
      }
      ?>
      <div class="text-center mt-2"><a class="link-secondary" href="/kalendar.php?month=<?php echo $month; ?>">Весь календарь</a></div>
    </div>
  </div>

  <div class="card card-section text-center">
    <div class="card-body">
      <a href="/prihod.php?id=21"><img src="/IMG/glotovka.png" class="img-fluid mx-auto d-block" alt="Глотовка" /></a>
    </div>
  </div>

  <div class="card card-section text-center">
    <div class="card-body">
      <a href="/saints.php"><img src="/IMG/saints.png" class="img-fluid mx-auto d-block" alt="Святые" /></a>
    </div>
  </div>

  <div class="card card-section text-center">
    <div class="card-body">
      <a href="hod.php"><img src="/IMG/hod.png" class="img-fluid mx-auto d-block" alt="Крестный ход" /></a>
    </div>
  </div>
</aside>
