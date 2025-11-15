<?php
if (isset($_REQUEST[session_name()])) {
    session_start();
}
$auth = $_SESSION['auth'];
$name_user = $_SESSION['name_user'];

require_once 'function.php';

$mysqlConnection = mysql_connect("localhost", "host1409556", "0f7cd928");
if ($mysqlConnection) {
    mysql_query("SET NAMES 'cp1251'", $mysqlConnection);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include 'head.php';
?>
<title>Áàðûøñêàÿ åïàðõèÿ</title>

</head>
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?php
include 'golova.php';
include 'menu.php';
?>

<div id="content_right" style="margin-top: 10px"> 
<div style="text-align:center"><a href="//www.yandex.ru/?add=178939&from=promocode">Íàø íîâîñòíîé âèäæåò íà <span style="color:red">ß</span><span style="color:#000">íäåêñ</span></a></div><br />
<?php

    $news_day = mysql_query("SELECT * FROM host1409556_barysh.news_day");

    $new_day = mysql_fetch_array($news_day); 
$dtn_day = $new_day['data']; 

    ####################################### Êðåñòíûé õîä ñåé÷àñ
    $data_today = Date("Y.m.d");
    $chas_today = Date("H:i");
    $god_today = Date("Y");

    $hod_all = mysql_query("SELECT * FROM host1409556_barysh.krest_hod_$god_today where data = '$data_today' ORDER BY pribyv ASC");
    
    $hod_all = 0; // fixme
    
    if (mysql_num_rows($hod_all) > 0) {
        
        echo '<div style="background: #fff; width: 90%; border: 1px solid #D7D7D7;box-shadow:2px 3px 5px #aaa; padding: 5px 10px">';
        echo '<div class="title" style="text-align: center"><b>Ãäå ñåé÷àñ êðåñòíûé õîä</b></div><hr />';
            for ($t=0; $t<mysql_num_rows($hod_all); $t++)
            {
            $hod = mysql_fetch_array($hod_all); 
            
            if ($hod['pribyv'] == '00:00' && $hod['otbyv'] == '24:00') 
                $pribyv_otbyv = 'Âåñü äåíü ';
            else
                $pribyv_otbyv = $hod['pribyv'].' - '.$hod['otbyv'].' ';

            if ($chas_today > $hod['otbyv']) echo '<span style="color: #aaa"><b>'.$pribyv_otbyv.'</b> '.$hod['nas_punkt'].'</span><br />'; 
            elseif ($chas_today < $hod['pribyv']) echo '<b>'.$pribyv_otbyv.'</b> '.$hod['nas_punkt'].'<br />';
            else echo '<div style="width:100%; background:#F8FCBE"><b>'.$pribyv_otbyv.'</b> '.$hod['nas_punkt'].'</div>';
            }
        echo '<hr /><div style="text-align: center"><a href="hod.php?year='.$god_today.'#'.$data_today.'">Ïîëíîå ðàñïèñàíèå è ôîòîîò÷åòû</a></div><br /></div><br /><br />';

    }
#######################################

####################################### Êàëåíäàðü åïàðõèè
    $day_today = Date("d");    
    $month_today = Date("m");
    
 if ($month_today == '01') {$mon2 = 'ÿíâàðÿ';}
 if ($month_today == '02') {$mon2 = 'ôåâðàëÿ';}
 if ($month_today == '03') {$mon2 = 'ìàðòà';}
 if ($month_today == '04') {$mon2 = 'àïðåëÿ';}
 if ($month_today == '05') {$mon2 = 'ìàÿ';}
 if ($month_today == '06') {$mon2 = 'èþíÿ';}
 if ($month_today == '07') {$mon2 = 'èþëÿ';}
 if ($month_today == '08') {$mon2 = 'àâãóñòà';}
 if ($month_today == '09') {$mon2 = 'ñåíòÿáðÿ';}
 if ($month_today == '10') {$mon2 = 'îêòÿáðÿ';}
 if ($month_today == '11') {$mon2 = 'íîÿáðÿ';}
 if ($month_today == '12') {$mon2 = 'äåêàáðÿ';}

$dd_today = $day_today;
if ($day_today == "01") $dd_today="1";
if ($day_today == "02") $dd_today="2";
if ($day_today == "03") $dd_today="3";
if ($day_today == "04") $dd_today="4";
if ($day_today == "05") $dd_today="5";
if ($day_today == "06") $dd_today="6";
if ($day_today == "07") $dd_today="7";
if ($day_today == "08") $dd_today="8";
if ($day_today == "09") $dd_today="9";
    //ÀÐÕÈÅÐÅÉ
    $arhi_rozd = '12.06';
    $arhi_hiro = '10.28';
    $arhi_postrig = '11.30';
    $arhi_angel = '12.02';
    $arhi_text = '<div style="margin-bottom: 5px"><a href="/arhierei.php" target="_blank">Åïèñêîï Áàðûøñêèé è Èíçåíñêèé Ôèëàðåò</a> - ';
    
if ($month_today.'.'.$day_today == $arhi_rozd) {
    $yy = '1963';
    $res = $god_today - $yy;
    $text_arhi = 'äåíü ðîæäåíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
    }
if ($month_today.'.'.$day_today == $arhi_hiro) {
    $yy = '2012';
    $res = $god_today - $yy;
    $text_arhi = 'àðõèåðåéñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
    }
if ($month_today.'.'.$day_today == $arhi_postrig) {
    $yy = '1996';
    $res = $god_today - $yy;
    $text_arhi = 'ìîíàøåñêèé ïîñòðèã <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
    }
if ($month_today.'.'.$day_today == $arhi_angel) {
    $text_arhi .= 'äåíü àíãåëà</div>';
    }
        // Ñîáûòèÿ äóõîâåíñòâà (äíè ðîæäåíèÿ, õèðîòîíèè, ïîñòðèãè, äíè àíãåëà)
        $text_cal = '';
        $text_cal_prest = '';

        $calendarDateKey = $month_today.'.'.$day_today;
        $angelDateKey = $day_today.'.'.$month_today;

        $klirik_all = mysql_query("SELECT id, name, san, rozd, diak, presv, monah, angel FROM host1409556_barysh.klir WHERE status LIKE 'øòàòíûé' AND (rozd LIKE '%$calendarDateKey' OR diak LIKE '%$calendarDateKey' OR presv LIKE '%$calendarDateKey' OR monah LIKE '%$calendarDateKey' OR angel LIKE '%$angelDateKey%') ORDER by name ASC");

        $calendarEvents = array(
                'birthday' => array(),
                'diakon' => array(),
                'ierey' => array(),
                'monah' => array(),
                'angel' => array(),
        );

        if ($klirik_all) {
                while ($klirik = mysql_fetch_assoc($klirik_all)) {
                        if (!empty($klirik['rozd']) && substr($klirik['rozd'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['rozd'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['birthday'][] = '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü ðîæäåíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['diak']) && substr($klirik['diak'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['diak'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['diakon'][] = '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äèàêîíñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['presv']) && substr($klirik['presv'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['presv'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['ierey'][] = '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - èåðåéñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['monah']) && substr($klirik['monah'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['monah'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['monah'][] = '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - ìîíàøåñêèé ïîñòðèã <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['angel']) && strpos($klirik['angel'], $angelDateKey) !== false) {
                                $calendarEvents['angel'][] = '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü àíãåëà</div>';
                        }
                }
        }

        foreach (array('birthday', 'diakon', 'ierey', 'monah', 'angel') as $eventType) {
                if (!empty($calendarEvents[$eventType])) {
                        $text_cal .= implode('', $calendarEvents[$eventType]);
                }
        }
        //ÏÐÅÑÒÎËÛ
    $prihod_all = mysql_query("SELECT id, name FROM host1409556_barysh.prihods WHERE angel LIKE '%$day_today.$month_today%' ORDER by name ASC");
while($prihod = mysql_fetch_array($prihod_all))
{
    $text_cal_prest .= '<div style="margin-bottom: 5px"><a href="/prihod.php?id='.$prihod['id'].'" target="_blank">'.$prihod['name'].'</a></div>';
}
    
    echo '<div style="background: #fff; width: 90%; border: 1px solid #D7D7D7;box-shadow:2px 3px 5px #aaa; padding: 5px 10px">';
    echo '<div class="title" style="text-align: center"><b>Êàëåíäàðü åïàðõèè</b></div><hr />';
    echo '<div style="color:red;font-size: 110%; text-align: center; ">'.$dd_today.' '.$mon2.'</div><br />';     
    if ($text_arhi) echo '<div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Àðõèåðåé</h2>'.$arhi_text.$text_arhi.'</div>';
    if ($text_cal) echo '<div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Äóõîâåíñòâî</h2>'.$text_cal.'</div>';
    if ($text_cal_prest) echo '<div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Ïðåñòîëüíûé ïðàçäíèê</h2>'.$text_cal_prest.'</div>';
    if (empty($text_cal) && empty($text_cal_prest) && empty($text_arhi)) {
        echo '<p>Ñåãîäíÿ ñîáûòèé íåò</p><br />';
}
    echo '<hr /><div style="text-align: center"><a style="color: #666" href="/kalendar.php?month='.$month_today.'">Âåñü êàëåíäàðü</a></div><br /></div><br /><br />';
#######################################
?>
<!--<div style="text-align: center"><a href="pyatino.php" ><img style="width: 80%; margin: 0 auto" src="/IMG/pyatino.png" border="0" /></a><br /><br />
</div>
-->
<div style="text-align: center"><a href="/prihod.php?id=21" ><img style="width: 80%; margin: 0 auto" src="/IMG/glotovka.png" border="0" /></a><br /><br />
</div>
<div style="text-align: center"><a href="/saints.php" ><img style="width: 80%; margin: 0 auto" src="/IMG/saints.png" border="0" /></a><br /><br />
</div>
<!--<div style="text-align: center"><a href="telemakov.php" ><img style="width: 80%; margin: 0 auto" src="/IMG/telemakov.png" border="0" /></a><br /><br />
</div>
-->
<div style="text-align: center"><a href="hod.php" ><img style="width: 80%; margin: 0 auto" src="/IMG/hod.png" border="0" /></a><br /><br />
</div>

<?  $news_all_r = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC LIMIT 1");

$news_r = mysql_fetch_array($news_all_r); 
if ($news_r['text']) echo '<h2 style="border-bottom: 5px solid #E6E0C6;"><a style="color: #7A6D42;border-bottom: 5px solid #E6E0C6;" href="raspisanie.php">Àðõèåðåéñêîå ñëóæåíèå</a></h2><br />';


        $news_all = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC, (text+0) ASC LIMIT 3");
for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
$news = mysql_fetch_array($news_all); 
echo '<div class="box_arhi">

<h3>'.$news['data_text'].' - '.$news['nedel'].'</h3>';
    $patterns = array ('/\n/', '/(\d{1,2}:\d{2})/');
    $replace = array ('</p><p>', '<b>${1}</b>');
    $text = preg_replace($patterns, $replace, $news['text']);

echo '<p>'.$text.'</p><br />
 </div>
  <br />
';
}

if ($news_r['text']) echo '<br />';

?>

<h2 style=" border-bottom: 5px solid #F0D0C8;"><a style="color: #A35241;border-bottom: 5px solid #F0D0C8;" href="anons.php">Àíîíñû è îáúÿâëåíèÿ</a></h2>
<br />

 <?
        $news_all = mysql_query("SELECT * FROM host1409556_barysh.anons WHERE data != '$dtn_day' ORDER BY data DESC LIMIT 2");
    for ($t=0; $t<mysql_num_rows($news_all); $t++)
{
$news = mysql_fetch_array($news_all); 

$dtn = $news['data']; 
$yyn = substr($dtn,0,4); // Ãîä
$mmn = substr($dtn,5,2); // Ìåñÿö
$ddn = substr($dtn,8,2); // Äåíü

// Ïåðåíàçíà÷àåì ïåðåìåííûå
if ($mmn == "01") $mm1n="ÿíâ.";
if ($mmn == "02") $mm1n="ôåâ.";
if ($mmn == "03") $mm1n="ìàð.";
if ($mmn == "04") $mm1n="àïð.";
if ($mmn == "05") $mm1n="ìàÿ";
if ($mmn == "06") $mm1n="èþí.";
if ($mmn == "07") $mm1n="èþë.";
if ($mmn == "08") $mm1n="àâã.";
if ($mmn == "09") $mm1n="ñåí.";
if ($mmn == "10") $mm1n="îêò.";
if ($mmn == "11") $mm1n="íîÿá.";
if ($mmn == "12") $mm1n="äåê.";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn,11,5); // Âðåìÿ 

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>'; // Êîíå÷íûé âèä ñòðîêè

    $patterns = array ('/\n/');
    $replace = array ('</p><p>');
    $text = preg_replace($patterns, $replace, $news['kratko']);

echo '<div class="box"><h3>'.$news['when'].'</h3>';
echo '<div style="margin-left: 10px"><span class="title"><a href="anons_show.php?data='.$news['data'].'">'.$news['tema'].'</a></span><br />'.$ddttn.'<span style="color: #777"> <img src="IMG/views.png" /> '.$news['views'].'</span></div><br />';

echo '<p>'.$text.'</p></div><br />';
}
?>

<br />
<h2> <a href="slovo_padre.php">Ñëîâî àðõèïàñòûðÿ</a></h2>
<br />
<?
/* ================== ÍÎÂÎÅ: "Ñëîâî àðõèïàñòûðÿ" òîëüêî èç ïàðñåðà ==================
   Áåð¸ì çàïèñè èç news_mitropolia, ãäå section = 'slovo', ñâåæèå, 2 øò.
   Ññûëêà âåä¸ò íà îðèãèíàë ($link), êàðòèíêà èç $oblozka (ïîëíûé ïóòü).
=============================================================================== */
$padre_all = mysql_query("
    SELECT tema, kratko, data, oblozka, link
    FROM host1409556_barysh.news_mitropolia
    WHERE section = 'slovo' AND data >= '2025-11-01 00:00:00'
    ORDER BY data DESC
    LIMIT 2
");

for ($t=0; $t<mysql_num_rows($padre_all); $t++) {
    $news = mysql_fetch_array($padre_all);

    $dtn = $news['data'];
    $yyn = substr($dtn,0,4);
    $mmn = substr($dtn,5,2);
    $ddn = substr($dtn,8,2);

                    max-width:130px;
                    max-height:130px;
                    width:auto;
    $months = array(
        "01"=>"ÿíâàðÿ","02"=>"ôåâðàëÿ","03"=>"ìàðòà","04"=>"àïðåëÿ","05"=>"ìàÿ",
        "06"=>"èþíÿ","07"=>"èþëÿ","08"=>"àâãóñòà","09"=>"ñåíòÿáðÿ","10"=>"îêòÿáðÿ",
        "11"=>"íîÿáðÿ","12"=>"äåêàáðÿ"
    );
    $mm1n = $months[$mmn];
    if ($ddn[0] == "0") $ddn = substr($ddn,1);
    $hours = substr($dtn,11,5);
    $ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>';

    // òåêñò ó ïàðñåðà óæå áåç ðàçìåòêè; ÷óòü óêîðîòèì ïðè íåîáõîäèìîñòè
    $text = $news['kratko'];
    if (preg_match_all("/[^\t]{250}/", $text, $massiv_news)) {
        $text = $massiv_news[0][0].'... <a href="'.$news['link'].'" target="_blank">(÷èòàòü äàëåå)</a>';
    }

    echo '<div style="margin-left:5px; margin-right:10px"><span class="title"><a href="'.$news['link'].'" target="_blank">'.$news['tema'].'</a></span><br />'.$ddttn.'</div><br />';
    if ($t == 1) echo '<div style="float:left; margin-bottom:5px; margin-right:10px">';
    else echo '<div style="float:left; margin-bottom:5px; margin-right:10px; border-bottom:1px #D7D7D7 solid">';

    if (!empty($news['oblozka'])) {
        echo '<a href="'.$news['link'].'" target="_blank">
                <img style="
                    width:180px;
                    height:auto;
                    box-shadow:2px 2px 5px rgba(0,0,0,0.3);
                    display:inline;
                    float:left;
                    border:1px solid #C3D7D4;
                    margin:0 10px 5px 10px;
                    padding:5px;
                " src="'.$news['oblozka'].'" />
              </a>';
    }

    echo '<p>'.$text.'<br /><br /></p></div>';
}
?>

<br />
<!--<h2>Êàðòà ïðèõîäîâ</h2>
<br />
<a href="http://www.barysh-eparhia.ru/map.php"><CENTER><img style="border: #BEC7BE 1px solid; width: 75%; margin: 0 auto" src="IMG/map.png" /></CENTER></a><br />
-->
<div style="text-align: center">
<a href="http://ekzeget.ru/" target="_blank" ><img style="width: 75%; margin: 0 auto" src="/IMG/ekzeget.png" border="0" /></a><br />
</div>
<br />
</div>

<div id="osnovnoe" style="margin-top:10px">

<div id="new_day">

 <?   
  ############################ ÍÎÂÎÑÒÜ ÄÍß 
 

$yyn = substr($dtn_day,0,4); // Ãîä
$mmn = substr($dtn_day,5,2); // Ìåñÿö
$ddn = substr($dtn_day,8,2); // Äåíü

// Ïåðåíàçíà÷àåì ïåðåìåííûå
if ($mmn == "01") $mm1n="ÿíâàðÿ";
if ($mmn == "02") $mm1n="ôåâðàëÿ";
if ($mmn == "03") $mm1n="ìàðòà";
if ($mmn == "04") $mm1n="àïðåëÿ";
if ($mmn == "05") $mm1n="ìàÿ";
if ($mmn == "06") $mm1n="èþíÿ";
if ($mmn == "07") $mm1n="èþëÿ";
if ($mmn == "08") $mm1n="àâãóñòà";
if ($mmn == "09") $mm1n="ñåíòÿáðÿ";
if ($mmn == "10") $mm1n="îêòÿáðÿ";
if ($mmn == "11") $mm1n="íîÿáðÿ";
if ($mmn == "12") $mm1n="äåêàáðÿ";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn_day,11,5); // Âðåìÿ 

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>'; // Êîíå÷íûé âèä ñòðîêè

    $patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/(?:\/{3})/', '/(?:\|{3})/', '/@[^@]+@/', '/(?:\{{3})/', '/(?:\}{3})/', '/\[/', '/\]/');
    $replace = array ('${2}', '</p><p>', '', '', '', '', '', '', '');

    $text = preg_replace($patterns, $replace, $new_day['text']);
       

if ($new_day['oblozka']) echo '<div style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3); display: inline;float: left;border: 1px solid #C3D7D4; margin: 0 10px 5px 10px; padding: 10px" ><a href="'.$new_day['page'].'_show.php?data='.$new_day['data'].'"><img src="DAY/'.$new_day['oblozka'].'.jpg" /></a></div>';
echo '<div class="block_title"><span class="title"><a href="'.$new_day['page'].'_show.php?data='.$new_day['data'].'">'.$new_day['tema'].'</a></span><br />'.$ddttn;
 echo '<span style="color: #777">';
 if ($new_day['page'] == 'news') { $newvid = mysql_query("SELECT * FROM host1409556_barysh.news_eparhia WHERE data = '$dtn_day'");
 $newvid = mysql_fetch_array($newvid); 
 if ($newvid['video']) echo ' (+ Âèäåî)';
  echo ' <img src="IMG/views.png" /> '.$newvid['views'].'</span>';
}
if ($new_day['page'] == 'anons') { $newvid = mysql_query("SELECT * FROM host1409556_barysh.anons WHERE data = '$dtn_day'");
 $newvid = mysql_fetch_array($newvid); 
  echo ' <img src="IMG/views.png" /> '.$newvid['views'].'</span>';
}
if ($new_day['page'] == 'pub') { $newvid = mysql_query("SELECT * FROM host1409556_barysh.publikacii WHERE data = '$dtn_day'");
 $newvid = mysql_fetch_array($newvid); 
  echo ' <img src="IMG/views.png" /> '.$newvid['views'].'</span>';
}
if ($new_day['page'] == 'slovo_padre') { $newvid = mysql_query("SELECT * FROM host1409556_barysh.padre WHERE data = '$dtn_day'");
 $newvid = mysql_fetch_array($newvid); 
  echo ' <img src="IMG/views.png" /> '.$newvid['views'].'</span>';
}

echo '</div><br /><p>'.$text.'</p>';

$page_news_day = $new_day['page']; 
?>
</div>
<!----------------------------------------------------------

<div style="text-align:center; margin: 24px 0;"><a href="http://sobor.patriarchia.ru/"><img src="http://www.patriarchia.ru/images/sobor/Arch_sobor2017_580.gif" alt="Àðõèåðåéñêèé Ñîáîð Ðóññêîé Ïðàâîñëàâíîé Öåðêâè 2017 ã." title="Àðõèåðåéñêèé Ñîáîð Ðóññêîé Ïðàâîñëàâíîé Öåðêâè 2017 ã." style="padding-right: 5%;"></a></div>
------------------------------------------------------------->

<br />

<div class="index_block">
<h2><a href="news.php">Íîâîñòè åïàðõèè</a></h2>
<br />

<?
/* ================== ÑÌÅØÀÍÍÛÅ ÍÎÂÎÑÒÈ (3 øòóêè) ==================
   Îáúåäèíÿåì ëîêàëüíûå íîâîñòè è ïàðñåð ïî òåãó 'barysh_tag'.
   Êàðòèíêè è äàòû ôîðìàòèðóþòñÿ, ññûëêè íà âíåøíèé ñàéò îòêðûâàþòñÿ â íîâîé âêëàäêå.
=================================================================== */
$mix_sql = "
SELECT * FROM (
  SELECT tema, kratko, data, oblozka, NULL AS link, 'local' AS source, video, views
  FROM host1409556_barysh.news_eparhia
  WHERE data != '$dtn_day'
  UNION ALL
  SELECT tema, kratko, data, oblozka, link, 'mitropolia' AS source, NULL AS video, NULL AS views
  FROM host1409556_barysh.news_mitropolia
  WHERE section='barysh_tag' AND data >= '2025-11-01 00:00:00'
) AS u
ORDER BY u.data DESC
LIMIT 3
";
$mix = mysql_query($mix_sql);

for ($t=0; $t<mysql_num_rows($mix); $t++) {
    $row = mysql_fetch_array($mix);

    $dtn = $row['data']; 
    $yyn = substr($dtn,0,4);
    $mmn = substr($dtn,5,2);
    $ddn = substr($dtn,8,2);

    $months = array(
        "01"=>"ÿíâàðÿ","02"=>"ôåâðàëÿ","03"=>"ìàðòà","04"=>"àïðåëÿ","05"=>"ìàÿ",
        "06"=>"èþíÿ","07"=>"èþëÿ","08"=>"àâãóñòà","09"=>"ñåíòÿáðÿ","10"=>"îêòÿáðÿ",
        "11"=>"íîÿáðÿ","12"=>"äåêàáðÿ"
    );
    $mm1n = $months[$mmn];
    if ($ddn[0] == '0') $ddn = substr($ddn,1);
    $hours = substr($dtn,11,5);
    $ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>';

    // î÷èñòêà òåêñòà äëÿ ëîêàëüíûõ
    $text = $row['kratko'];
    if ($row['source'] == 'local') {
        $patterns = array (
            '/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i',
            '/\n/','/(?:\/{3})/','/(?:\|{3})/','/@[^@]+@/','/(?:\{{3})/','/(?:\}{3})/'
        );
        $replace = array ('${2}','</p><p>','','','','','');
        $text = preg_replace($patterns, $replace, $text);
    }

    echo '<div style="margin-left:5px;"><span class="title">';

    if ($row['source'] == 'local') {
        echo '<a href="news_show.php?data='.$row['data'].'">'.$row['tema'].'</a>';
    } else {
        echo '<a href="'.$row['link'].'" target="_blank">'.$row['tema'].'</a>';
    }

    echo '</span><br />'.$ddttn;
    echo '<span style="color:#777">';
              margin:0 10px 5px 10px;padding:10px; max-width:130px; max-height:130px; width:auto; height:auto;" src="'.$img_url.'" /></a>';
    if ($row['source'] == 'local') echo ' <img src="IMG/views.png" /> '.$row['views'];
    echo '</span></div><br />';

    echo '<div style="float:left; border-bottom:1px #D7D7D7 solid; margin-bottom:5px;">';

    if (!empty($row['oblozka'])) {
        if ($row['source'] == 'local') {
            $img_url = 'FOTO_MINI/'.$row['oblozka'].'.jpg';
        } else {
            // åñëè â îáëîæêå íåò https  äîáàâèì äîìåí
            if (strpos($row['oblozka'], 'http') === 0) {
                $img_url = $row['oblozka'];
            } else {
                $img_url = 'https://mitropolia-simbirsk.ru'.$row['oblozka'];
            }
        }
        $link_target = ($row['source'] == 'local')
            ? 'news_show.php?data='.$row['data']
            : $row['link'];
        echo '<a href="'.$link_target.'" target="'.($row['source']=='local'?'_self':'_blank').'">
              <img style="box-shadow:2px 2px 5px rgba(0,0,0,0.3);
              display:inline;float:left;border:1px solid #C3D7D4;
              margin:0 10px 5px 10px;padding:10px" src="'.$img_url.'" /></a>';
    }

    echo '<p>'.$text.'<br /><br /></p></div>';
}
?>

</div>  

<div class="index_block">
<h2><a href="pub.php">Ïóáëèêàöèè</a></h2>
<br />

 <?
        $pub_all = mysql_query("SELECT * FROM host1409556_barysh.publikacii WHERE data != '$dtn_day' ORDER BY data DESC LIMIT 3");
    for ($t=0; $t<mysql_num_rows($pub_all); $t++)
{
$pub = mysql_fetch_array($pub_all); 

$dtn = $pub['data']; 
$yyn = substr($dtn,0,4); // Ãîä
$mmn = substr($dtn,5,2); // Ìåñÿö
$ddn = substr($dtn,8,2); // Äåíü

// Ïåðåíàçíà÷àåì ïåðåìåííûå
if ($mmn == "01") $mm1n="ÿíâàðÿ";
if ($mmn == "02") $mm1n="ôåâðàëÿ";
if ($mmn == "03") $mm1n="ìàðòà";
if ($mmn == "04") $mm1n="àïðåëÿ";
if ($mmn == "05") $mm1n="ìàÿ";
if ($mmn == "06") $mm1n="èþíÿ";
if ($mmn == "07") $mm1n="èþëÿ";
if ($mmn == "08") $mm1n="àâãóñòà";
if ($mmn == "09") $mm1n="ñåíòÿáðÿ";
if ($mmn == "10") $mm1n="îêòÿáðÿ";
if ($mmn == "11") $mm1n="íîÿáðÿ";
if ($mmn == "12") $mm1n="äåêàáðÿ";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn,11,5); // Âðåìÿ 

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>'; // Êîíå÷íûé âèä ñòðîêè
    $patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/\n/', '/(?:\/{3})/', '/(?:\|{3})/', '/@[^@]+@/', '/(?:\{{3})/', '/(?:\}{3})/');
    $replace = array ('${2}', '</p><p>', '', '', '', '', '');

    $text = preg_replace($patterns, $replace, $pub['kratko']);

echo '<div style="margin-left: 5px;"><span class="title"><a href="pub_show.php?data='.$pub['data'].'">'.$pub['tema'].'</a></span><br />'.$ddttn.'<span style="color: #777"> <img src="IMG/views.png" /> '.$pub['views'].'</span></div><br /><div style="float: left; border-bottom: 1px #D7D7D7 solid; margin-bottom: 5px">';

if ($pub['oblozka']) echo '<a href="pub_show.php?data='.$pub['data'].'"><img style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3); display: inline;float: left;border: 1px solid #C3D7D4; margin: 0 10px 5px 10px; padding: 10px " src="FOTO_MINI/'.$pub['oblozka'].'.jpg" /></a>';

echo '<p>'.$text.'<br /><br /></p></div>';
}
?>


</div>  
<!-- Äîêóìåíòû áëîê îñòàâëåí çàêîììåíòèðîâàííûì êàê â èñõîäíèêå -->

<div class="index_block_padre">

<h2><a href="video.php">Âèäåî</a></h2>
<br />

<div style="text-align: center">
<?
    $vid_all = mysql_query("SELECT * FROM host1409556_barysh.video ORDER by id DESC LIMIT 2");
        for ($t=0; $t<mysql_num_rows($vid_all); $t++)
{
$vid = mysql_fetch_array($vid_all); 
$dtn = $vid['data']; 
$yyn = substr($dtn,0,4); // Ãîä
$mmn = substr($dtn,5,2); // Ìåñÿö
$ddn = substr($dtn,8,2); // Äåíü

// Ïåðåíàçíà÷àåì ïåðåìåííûå
if ($mmn == "01") $mm1n="ÿíâàðÿ";
if ($mmn == "02") $mm1n="ôåâðàëÿ";
if ($mmn == "03") $mm1n="ìàðòà";
if ($mmn == "04") $mm1n="àïðåëÿ";
if ($mmn == "05") $mm1n="ìàÿ";
if ($mmn == "06") $mm1n="èþíÿ";
if ($mmn == "07") $mm1n="èþëÿ";
if ($mmn == "08") $mm1n="àâãóñòà";
if ($mmn == "09") $mm1n="ñåíòÿáðÿ";
if ($mmn == "10") $mm1n="îêòÿáðÿ";
if ($mmn == "11") $mm1n="íîÿáðÿ";
if ($mmn == "12") $mm1n="äåêàáðÿ";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";

$hours = substr($dtn,11,5); // Âðåìÿ 

$ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>'; // Êîíå÷íûé âèä ñòðîêè
$news_all_wer = mysql_query("SELECT * FROM host1409556_barysh.news_eparhia WHERE video = '".$vid['kod']."'");
$news_wer = mysql_fetch_array($news_all_wer); 
    $patterns = array ('/width="46\%"/');
    $replace = array ('width="100%"');
    $vid['kod'] = preg_replace($patterns, $replace, $vid['kod']);

if ($news_wer['data']) echo '<div class="index_block" style="text-align: left"><div style="margin-left: 5px;"><span class="title"><a href="news_show.php?data='.$news_wer['data'].'">'.$vid['tema'].'</a></span>';
else echo '<div class="index_block" style="text-align: left"><div style="margin-left: 5px;"><span class="title">'.$vid['tema'].'</span>';
echo '<br />'.$ddttn.'<br /><br />'.$vid['kod'].'</div></div>';

}
?>

</div>

<br />
</div>  
<div class="index_block_padre">
<div style="text-align: center">
<br />
<SCRIPT language=JavaScript src="http://www.eparhia.ru/sinfo.asp?i=3"></SCRIPT>
</div>  
</div>  
<br />

</div>  
<br />

<?
include 'footer.php';
?>
</div>

</body>
</html>