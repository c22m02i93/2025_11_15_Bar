<?
if (isset($_REQUEST[session_name()])) session_start ();
$auth=$_SESSION['auth'];
$name_user=$_SESSION['name_user'];
if ($auth!=1) {Header ("Location: my_auth.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
include 'head.php';
?>
<div class="admin-nav" style="float:left">
<p><a <? if ($name_user == '') echo 'onclick="return false" class="link-disabled"';?> href="add_klir.php"> </a></p>
<p><a <? if ($name_user == '') echo 'onclick="return false" class="link-disabled"';?> href="my_klir.php"></a></p>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';

include 'menu.php';

include 'content.php';

?>

<div id="osnovnoe">
<h1>Ìîé êàáèíåò</h1>

<div style="float:left">

<p><a href="my_cron.php" style="color: red">Îòëîæåííûå íîâîñòè</a></p>
<p><a href="my_anons.php">Àíîíñû è îáúÿâëåíèÿ</a></p>
<p><a href="my_audio.php">Àóäèî</a></p>
<p><a href="my_video.php">Âèäåî</a></p>
<p><a href="my_gazeta.php">Ãàçåòà "Ìîÿ åïàðõèÿ"</a></p>
<p><a href="my_doks.php">Äîêóìåíòû</a></p>
<p><a href="my_docs.php">Äîêóìåíòû íà ñåðâåð</a></p>
<p><a href="my_hod.php">Êðåñòíûé õîä</a></p>
<p><a href="my_news.php">Íîâîñòè</a></p>
<p><a href="my_news_ep.php">Íîâîñòè åïàðõèè</a></p>
<p><a href="my_news_day.php">Íîâîñòü äíÿ</a></p>
<p><a href="my_prihods.php">Ïðèõîäû</a></p>
<p><a href="my_pub.php">Ïóáëèêàöèè</a></p>
<p><a href="my_radio.php">Ðàäèîïåðåäà÷à "Ñâåòëûé âå÷åð"</a></p>
<p><a href="my_old_prihods.php">Ðàçðóøåííûå õðàìû</a></p>
<p><a href="my_raspisanie.php">Ðàñïèñàíèå</a></p>
<p><a href="my_padre.php">Ñëîâî àðõèïàñòûðÿ</a></p>
<p><a href="my_foto.php">Ôîòîãðàôèè</a></p>
<p><a href="my_hod_foto.php">Ôîòîîò÷åò êðåñòíîãî õîäà</a></p>
<hr />
<p><a href="my_raspisanie_all.php">Âñå ñëóæåíèå âëàäûêè</a></p>
<hr />
<p><a <? if ($name_user == 'Ñòàñ') echo 'onclick="return false" class="disabled"';?> href="add_klir.php">Äîáàâëåíèå êëèðèêîâ</a></p>
<p><a <? if ($name_user == 'Ñòàñ') echo 'onclick="return false" class="disabled"';?> href="my_klir.php">Äóõîâåíñòâî</a></p>
<hr />
<p><a href="kalendar.php">Êàëåíäàðü åïàðõèè</a></p>

</div>
</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>