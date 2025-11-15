<?
if (isset($_REQUEST[session_name()])) session_start ();
$auth=$_SESSION['auth'];
$name_user=$_SESSION['name_user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
include 'head.php';
?>
<title>Новости епархии</title>

</head>
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';
$new = yes;
include 'menu.php';
include 'function.php';

include 'content.php';

?>
<div id="osnovnoe">

<h1>Новости епархии</h1>

 <?   if(!isset($_GET['page'])){
  $p = 1;
}
else{
  $p = addslashes(strip_tags(trim($_GET['page'])));
  if($p < 1) $p = 1;
}
$num_elements = 10;
$cutoff = "2025-11-01 00:00:00";
$total_local = mysql_result(mysql_query("SELECT COUNT(*) FROM host1409556_barysh.news_eparhia"),0,0);
$total_external = mysql_result(mysql_query("SELECT COUNT(*) FROM host1409556_barysh.news_mitropolia WHERE section='barysh_tag' AND data >= '$cutoff'"),0,0);
$total = $total_local + $total_external;
$num_pages = $total > 0 ? ceil($total / $num_elements) : 1;
if ($p > $num_pages) $p = $num_pages;
if ($p < 1) $p = 1;
$start = ($p - 1) * $num_elements;
if ($start < 0) $start = 0;

  echo GetNav($p, $num_pages, "news").'<hr style="width: 100%" />';
            $sel = "
                SELECT * FROM (
                    SELECT data, tema, kratko, oblozka, video, views, NULL AS link, 'local' AS source
                    FROM host1409556_barysh.news_eparhia
                UNION ALL
                    SELECT data, tema, kratko, oblozka, NULL AS video, NULL AS views, link, 'mitropolia' AS source
                    FROM host1409556_barysh.news_mitropolia
                    WHERE section='barysh_tag' AND data >= '$cutoff'
                ) AS u
                ORDER BY data DESC
                LIMIT $start, $num_elements
            ";
            $query = mysql_query($sel);
            if(mysql_num_rows($query)>0){

			while($row = mysql_fetch_assoc($query)){


$dtn = $row['data'];
$yyn = substr($dtn,0,4); // Год
$mmn = substr($dtn,5,2); // Месяц
$ddn = substr($dtn,8,2); // День

// Переназначаем переменные
if ($mmn == "01") $mm1n="января";
if ($mmn == "02") $mm1n="февраля";
if ($mmn == "03") $mm1n="марта";
if ($mmn == "04") $mm1n="апреля";
if ($mmn == "05") $mm1n="мая";
if ($mmn == "06") $mm1n="июня";
if ($mmn == "07") $mm1n="июля";
if ($mmn == "08") $mm1n="августа";
if ($mmn == "09") $mm1n="сентября";
if ($mmn == "10") $mm1n="октября";
if ($mmn == "11") $mm1n="ноября";
if ($mmn == "12") $mm1n="декабря";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn,11,5); // Время

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' г. '.$hours.'</span>'; // Конечный вид строки

        $patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/(?:\/{3})/', '/(?:\|{3})/', '/@[^@]+@/', '/(?:\{{3})/', '/(?:\}{3})/');
        $replace = array ('${2}', '</p><p>', '', '', '', '', '');
        $text = $row['kratko'];
        if ($row['source'] == 'local') {
            $text = preg_replace($patterns, $replace, $text);
        } else {
            $text = nl2br($text);
        }

$title_link = ($row['source'] == 'local') ? 'news_show.php?data='.$row['data'] : $row['link'];
$target = ($row['source'] == 'local') ? '_self' : '_blank';

echo '<div style="float: left; margin-bottom: 10px; border-bottom: 1px #D7D7D7 solid"><div class="block_title"><span class="title"><a href="'.$title_link.'" target="'.$target.'">'.$row['tema'].'</a></span><br />'.$ddttn;
 if ($row['source'] == 'local' && $row['video']) echo '<span style="color: #777"> (+ Видео)</span>';
 if ($row['source'] == 'mitropolia') echo '<span style="color: #777"> (митрополия)</span>';

echo '</div><div>';
        if ($row['oblozka']) {
            if ($row['source'] == 'local') {
                $img_url = 'FOTO_MINI/'.$row['oblozka'].'.jpg';
            } else {
                if (strpos($row['oblozka'], 'http') === 0) {
                    $img_url = $row['oblozka'];
                } elseif (strpos($row['oblozka'], '//') === 0) {
                    $img_url = 'https:'.$row['oblozka'];
                } else {
                    $img_url = 'https://mitropolia-simbirsk.ru'.$row['oblozka'];
                }
            }
            echo '<div><a href="'.$title_link.'" target="'.$target.'"><img style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3); display: inline;float: left;border: 1px solid #C3D7D4; margin: 0 10px 5px 10px; padding: 10px; max-width: 130px; max-height: 130px; width: auto; height: auto;" src="'.$img_url.'" /></a></div>';
        }

        $info_line = '';
        if ($row['source'] == 'local') {
            $info_line = '<span class="views">Просмотров: '.$row['views'].'.<br /><br /></span>';
        } else {
            $info_line = '<span class="views">: .<br /><br /></span>';
        }

echo '<div style="margin-right: 5px"><p>'.$text.'</p><div class="zakladka" style="margin: 0 0 0 20px">'.$info_line.'</div></div></div></div>';
}
}

  echo '<table width="100%"><tr><td>'.GetNav($p, $num_pages, "news").'</td></tr></table><hr style="width: 100%" />';

?>

</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>
