<!--noindex-->
<a id="toTop" class="btn btn-outline-light" href="#" aria-label="">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" role="img" aria-hidden="true">
    <path d="M7.247 4.86 2.451 9.657a.5.5 0 0 0 .708.708L8 5.525l4.84 4.84a.5.5 0 0 0 .707-.708L8.354 4.86a.5.5 0 0 0-.707 0z"/>
  </svg>
  <span class="visually-hidden"></span>
</a>

<div id="footer">
  <div class="footer-shell">
    <div class="footer-inner">

      <div class="footer-grid">

        <div class="footer-col">
          <h3>Àðõèåðåé</h3>
          <a href="arhierei.php">Áèîãðàôèÿ</a>
          <a href="slovo_padre.php">Ñëîâî àðõèïàñòûðÿ</a>
          <a href="raspisanie.php">Ñëóæåíèå</a>
        </div>

        <div class="footer-col">
          <h3>Íîâîñòè</h3>
          <a href="news.php">Íîâîñòè åïàðõèè</a>
          <a href="anons.php">Àíîíñû</a>
          <a href="pub.php">Ïóáëèêàöèè</a>
        </div>

        <div class="footer-col">
          <h3>Ìåäèà</h3>
          <a href="video.php">Âèäåî</a>
          <a href="sv_vecher.php">Ðàäèîïåðåäà÷à «Ñâåòëûé âå÷åð»</a>
        </div>

        <div class="footer-col">
          <h3>Äîêóìåíòû</h3>
          <a href="doks.php?tip=ukaz">Óêàçû</a>
          <a href="doks.php?tip=raspor">Ðàñïîðÿæåíèÿ</a>
          <a href="doks.php?tip=cirk">Öèðêóëÿðû</a>
          <a href="doks.php?tip=udostoverenie">Óäîñòîâåðåíèÿ</a>
        </div>

        <div class="footer-col">
          <h3>Åïàðõèÿ</h3>
          <a href="histor.php">Èñòîðèÿ</a>
          <a href="upravlenie.php">Óïðàâëåíèå</a>
          <a href="otdel.php">Îòäåëû</a>
        </div>

        <div class="footer-col">
          <h3>Ïðèõîäû</h3>
          <a href="mon.php">Æàäîâñêèé ìîíàñòûðü</a>
          <a href="prihods.php">Äåéñòâóþùèå ïðèõîäû</a>
          <a href="old_prihods.php">Ðàçðóøåííûå õðàìû</a>
          <a href="map.php">Êàðòà ïðèõîäîâ</a>
        </div>

        <div class="footer-col">
          <h3><a href="kontakt.php">Êîíòàêòû</a></h3>
        </div>

      </div>

      <div class="footer-banners">
        <span style="color:#eee; font-size:14px; align-self:center; margin-right:12px;">© Áàðûøñêàÿ åïàðõèÿ, 2012 – <?php echo date("Y"); ?> ãã. · Ñîçäàíèå ñàéòà: <a href="mailto:zhidkoff@list.ru" style="color:#4ea3ff;">Ñåðãåé Æèäêîâ</a></span>

        <a href="http://www.patriarchia.ru/index.html"><img src="http://www.patriarchia.ru/images/patr_banner_88.gif"></a>
        <a href="https://mitropolia-simbirsk.ru/" target="_blank"><img src="IMG/simbmitropolia.png"></a>
        <a href="http://www.ekzeget.ru" target="_blank"><img src="http://www.åêzeget.ru/IMG/banner.gif"></a>
        <a href="http://ëóêà-êðûìñêèé.ðô/" target="_blank"><img src="/IMG/386.jpg"></a>
        <a href="http://vsehsvjatyh-glotovka.prihod.ru/" target="_blank"><img src="http://prihod.ru/pravbanners/vsehsvjatyh-glotovka.png"></a>

        <!-- 24LOG block fully removed as requested -->
      </div>

      <div class="footer-bottom">
        <?php
          list($msec,$sec)=explode(chr(32),microtime());
          $skor_gen=(round(($sec+$msec)-$mTimeStart,4));
          echo '<span style="font-family: \'Arial Narrow\'; font-weight: normal;">Ñòðàíèöà ñãåíåðèðîâàíà çà <b>'.$skor_gen.'</b> ñåê.</span>';
        ?>
      </div>

    </div>
  </div>
</div>
<!--/noindex-->