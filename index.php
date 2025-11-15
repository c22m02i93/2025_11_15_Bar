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
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="windows-1251" />
<?php include 'head.php'; ?>
<title>Áàðûøñêàÿ åïàðõèÿ</title>
<style>
    body {
        background-color: #f8f9fa;
    }

    .layout-wrapper {
        border-radius: 1.5rem;
        box-shadow: 0 1.5rem 3rem rgba(15, 34, 58, 0.2);
        background: #ffffff;
        overflow: hidden;
    }

    .layout-inner {
        padding: 2.5rem 1.5rem 3rem;
    }

    @media (min-width: 992px) {
        .layout-inner {
            padding: 3rem 3.5rem;
        }
    }

    .sidebar-stack,
    .content-stack {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .card-section {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.75rem 1.5rem rgba(15, 34, 58, 0.08);
        overflow: hidden;
    }

    .card-section .card-header {
        background: linear-gradient(135deg, #e9f2ff 0%, #fef6ff 100%);
        border-bottom: none;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #394861;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .calendar-date {
        font-size: 1.4rem;
        color: #c0392b;
        font-weight: 700;
    }

    .calendar-list > div,
    .calendar-list p,
    .calendar-list .date-item {
        margin-bottom: 0.75rem;
    }

    .calendar-list a {
        color: #0d6efd;
        text-decoration: none;
    }

    .calendar-list a:hover,
    .sidebar-stack a:hover {
        text-decoration: underline;
    }

    .media-card img {
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        border: 1px solid #dee2e6;
        box-shadow: 0 0.75rem 1.5rem rgba(15, 34, 58, 0.08);
    }

    .highlight-current {
        background: #fdf9d8;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
    }

    .news-card img,
    .pub-card img {
        border-radius: 0.75rem;
        border: 1px solid #d5dce3;
        padding: 0.5rem;
        box-shadow: 0 0.75rem 1.25rem rgba(15, 34, 58, 0.08);
    }

    .news-card p,
    .pub-card p {
        margin-bottom: 0;
    }

    .card-divider {
        border-bottom: 1px solid rgba(15, 34, 58, 0.08);
        margin: 1.25rem 0;
    }

    
    #new_day,
    #osnovnoe .index_block,
    #osnovnoe .index_block_padre {
        background: #ffffff;
        border-radius: 1.25rem;
        padding: 2rem 2.25rem;
        box-shadow: 0 1.25rem 2.5rem rgba(15, 34, 58, 0.12);
    }

    #new_day img,
    .index_block img,
    .index_block_padre img {
        float: none !important;
        margin: 0 auto 1.25rem auto !important;
        display: block;
        border-radius: 0.75rem;
        border: 1px solid #e1e6ef;
        box-shadow: 0 0.75rem 1.5rem rgba(15, 34, 58, 0.08);
    }

    #new_day .block_title,
    .index_block .title,
    .index_block_padre .title {
        display: block;
        color: #1f2f4a;
        font-weight: 700;
    }

    .index_block > h2,
    .index_block_padre > h2,
    #new_day h2 {
        margin-bottom: 1.25rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2f4a;
    }

    .index_block > h2 a,
    .index_block_padre > h2 a,
    #new_day .title a {
        color: #0d6efd;
        text-decoration: none;
    }

    .index_block > h2 a:hover,
    .index_block_padre > h2 a:hover,
    #new_day .title a:hover {
        text-decoration: underline;
    }

    .box_arhi,
    .box {
        background: rgba(13, 110, 253, 0.05);
        border-radius: 1rem;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.6);
    }

    .box_arhi h3,
    .box h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #1f2f4a;
    }

    .index_block .box p,
    .index_block .box_arhi p {
        margin-bottom: 0;
    }
.video-wrapper iframe,
    .video-wrapper video {
        border-radius: 0.75rem;
        box-shadow: 0 1rem 2rem rgba(15, 34, 58, 0.16);
    }
</style>
</head>
<body class="text-body">

<div class="container py-4 py-lg-5">
    <div class="layout-wrapper">
<?php
include 'golova.php';
include 'menu.php';
?>

        <div class="layout-inner">
            <div class="row g-4 flex-column-reverse flex-lg-row">
                <div class="col-lg-4 order-lg-2">
                    <aside id="content_right" class="sidebar-stack">
                        <div class="card card-section">
                            <div class="card-body text-center">
                                <a href="//www.yandex.ru/?add=178939&from=promocode" class="text-decoration-none fw-semibold text-dark">
                                    Íàø íîâîñòíîé âèäæåò íà <span class="text-danger">ß</span><span class="text-dark">íäåêñ</span>
                                </a>
                            </div>
                        </div>
<?php

    $news_day = mysql_query("SELECT * FROM host1409556_barysh.news_day");

    $new_day = mysql_fetch_array($news_day);
$dtn_day = $new_day['data']; 

    ####################################### Êðåñòíûé õîä ñåé÷àñ
    $data_today = Date("Y.m.d");
    $chas_today = Date("H:i");
    $god_today = Date("Y");

    $hod_all = mysql_query("SELECT * FROM host1409556_barysh.krest_hod_$god_today where data = '$data_today' ORDER BY pribyv ASC");

    if ($hod_all && mysql_num_rows($hod_all) > 0) {
        echo '<div class="card card-section">';
        echo '<div class="card-header text-center py-3">';
        echo '<span class="section-title">Ãäå ñåé÷àñ êðåñòíûé õîä</span>';
        echo '</div>';
        echo '<div class="card-body">';
        for ($t = 0; $t < mysql_num_rows($hod_all); $t++) {
            $hod = mysql_fetch_array($hod_all);

            if ($hod['pribyv'] == '00:00' && $hod['otbyv'] == '24:00') {
                $pribyv_otbyv = 'Âåñü äåíü ';
            } else {
                $pribyv_otbyv = $hod['pribyv'] . ' - ' . $hod['otbyv'] . ' ';
            }

            if ($chas_today > $hod['otbyv']) {
                echo '<div class="text-muted mb-2"><strong>' . $pribyv_otbyv . '</strong> ' . $hod['nas_punkt'] . '</div>';
            } elseif ($chas_today < $hod['pribyv']) {
                echo '<div class="mb-2"><strong>' . $pribyv_otbyv . '</strong> ' . $hod['nas_punkt'] . '</div>';
            } else {
                echo '<div class="highlight-current"><strong>' . $pribyv_otbyv . '</strong> ' . $hod['nas_punkt'] . '</div>';
            }
        }
        echo '<div class="card-divider"></div>';
        echo '<div class="text-center">';
        echo '<a class="btn btn-outline-primary btn-sm" href="hod.php?year=' . $god_today . '#' . $data_today . '">Ïîëíîå ðàñïèñàíèå è ôîòîîò÷åòû</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
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
    $arhi_text = '<div class="mb-2"><a class="link-primary fw-semibold" href="/arhierei.php" target="_blank">Åïèñêîï Áàðûøñêèé è Èíçåíñêèé Ôèëàðåò</a> - ';
    
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
                                $calendarEvents['birthday'][] = '<div class="mb-2"><a class="link-primary" href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü ðîæäåíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['diak']) && substr($klirik['diak'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['diak'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['diakon'][] = '<div class="mb-2"><a class="link-primary" href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äèàêîíñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['presv']) && substr($klirik['presv'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['presv'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['ierey'][] = '<div class="mb-2"><a class="link-primary" href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - èåðåéñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['monah']) && substr($klirik['monah'], 5, 5) === $calendarDateKey) {
                                $yy = substr($klirik['monah'], 0, 4); // Ãîä
                                $res = $god_today - $yy;
                                $calendarEvents['monah'][] = '<div class="mb-2"><a class="link-primary" href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - ìîíàøåñêèé ïîñòðèã <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
                        }
                        if (!empty($klirik['angel']) && strpos($klirik['angel'], $angelDateKey) !== false) {
                                $calendarEvents['angel'][] = '<div class="mb-2"><a class="link-primary" href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü àíãåëà</div>';
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
    $text_cal_prest .= '<div class="mb-2"><a class="link-primary" href="/prihod.php?id='.$prihod['id'].'" target="_blank">'.$prihod['name'].'</a></div>';
}
    
    echo '<div class="card card-section">';
    echo '<div class="card-header text-center py-3">';
    echo '<span class="section-title">Êàëåíäàðü åïàðõèè</span>';
    echo '</div>';
    echo '<div class="card-body calendar-list">';
    echo '<div class="calendar-date text-center mb-4">' . $dd_today . ' ' . $mon2 . '</div>';
    if ($text_arhi) echo '<div class="mb-4" id="calendar"><h2 class="h6 text-uppercase text-secondary fw-semibold mb-2">Àðõèåðåé</h2>' . $arhi_text . $text_arhi . '</div>';
    if ($text_cal) echo '<div class="mb-4" id="calendar"><h2 class="h6 text-uppercase text-secondary fw-semibold mb-2">Äóõîâåíñòâî</h2>' . $text_cal . '</div>';
    if ($text_cal_prest) echo '<div class="mb-4" id="calendar"><h2 class="h6 text-uppercase text-secondary fw-semibold mb-2">Ïðåñòîëüíûé ïðàçäíèê</h2>' . $text_cal_prest . '</div>';
    if (empty($text_cal) && empty($text_cal_prest) && empty($text_arhi)) {
        echo '<p class="text-center text-muted">Ñåãîäíÿ ñîáûòèé íåò</p>';
    }
    echo '<div class="text-center mt-3">';
    echo '<a class="btn btn-outline-secondary btn-sm" href="/kalendar.php?month=' . $month_today . '">Âåñü êàëåíäàðü</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
#######################################
?>
                        <div class="card card-section media-card">
                            <div class="card-body text-center">
                                <a href="/prihod.php?id=21" class="d-inline-block">
                                    <img src="/IMG/glotovka.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="card card-section media-card">
                            <div class="card-body text-center">
                                <a href="/saints.php" class="d-inline-block">
                                    <img src="/IMG/saints.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="card card-section media-card">
                            <div class="card-body text-center">
                                <a href="hod.php" class="d-inline-block">
                                    <img src="/IMG/hod.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>

<?php  $news_all_r = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC LIMIT 1");

$news_r = mysql_fetch_array($news_all_r);
$news_all = mysql_query("SELECT * FROM host1409556_barysh.raspisanie where data between '$data_today' and '9999.12.31' ORDER BY data ASC, (text+0) ASC LIMIT 3");

if ($news_all && mysql_num_rows($news_all) > 0) {
    echo '<div class="card card-section">';
    echo '<div class="card-header d-flex align-items-center justify-content-between py-3">';
    echo '<span class="section-title mb-0">Àðõèåðåéñêîå ñëóæåíèå</span>';
    echo '<a class="btn btn-sm btn-outline-primary" href="raspisanie.php">Âñå ðàñïèñàíèÿ</a>';
    echo '</div>';
    echo '<div class="card-body content-stack">';
    for ($t = 0; $t < mysql_num_rows($news_all); $t++) {
        $news = mysql_fetch_array($news_all);
        echo '<div class="news-card pb-3 mb-3 border-bottom">';
        echo '<h3 class="h6 fw-bold text-primary mb-2">' . $news['data_text'] . ' - ' . $news['nedel'] . '</h3>';
        $patterns = array ('/\n/', '/(\d{1,2}:\d{2})/');
        $replace = array ('</p><p>', '<b>${1}</b>');
        $text = preg_replace($patterns, $replace, $news['text']);
        echo '<p>' . $text . '</p>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

?>

<?php
$news_all = mysql_query("SELECT * FROM host1409556_barysh.anons WHERE data != '$dtn_day' ORDER BY data DESC LIMIT 2");
if ($news_all && mysql_num_rows($news_all) > 0) {
    echo '<div class="card card-section">';
    echo '<div class="card-header d-flex align-items-center justify-content-between py-3">';
    echo '<span class="section-title mb-0">Àíîíñû è îáúÿâëåíèÿ</span>';
    echo '<a class="btn btn-sm btn-outline-secondary" href="anons.php">Âñå àíîíñû</a>';
    echo '</div>';
    echo '<div class="card-body content-stack">';
    for ($t = 0; $t < mysql_num_rows($news_all); $t++) {
        $news = mysql_fetch_array($news_all);

        $dtn = $news['data'];
        $yyn = substr($dtn,0,4);
        $mmn = substr($dtn,5,2);
        $ddn = substr($dtn,8,2);

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

        $hours = substr($dtn,11,5);
        $ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>';

        $patterns = array ('/
/');
        $replace = array ('</p><p>');
        $text = preg_replace($patterns, $replace, $news['kratko']);

        echo '<div class="news-card pb-3 mb-3 border-bottom">';
        echo '<h3 class="h6 fw-bold text-primary mb-2">'.$news['when'].'</h3>';
        echo '<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">';
        echo '<div><span class="title"><a href="anons_show.php?data='.$news['data'].'">'.$news['tema'].'</a></span></div>';
        echo '<div class="text-muted small">'.$ddttn.' <span class="ms-2"><img src="IMG/views.png" alt="" /> '.$news['views'].'</span></div>';
        echo '</div>';
        echo '<p class="mt-3 mb-0">'.$text.'</p>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
?>
<?php
$padre_all = mysql_query(
    "    SELECT tema, kratko, data, oblozka, link
    FROM host1409556_barysh.news_mitropolia
    WHERE section = 'slovo' AND data >= '2025-11-01 00:00:00'
    ORDER BY data DESC
    LIMIT 2"
);

if ($padre_all && mysql_num_rows($padre_all) > 0) {
    echo '<div class="card card-section">';
    echo '<div class="card-header d-flex align-items-center justify-content-between py-3">';
    echo '<span class="section-title mb-0">Ñëîâî àðõèïàñòûðÿ</span>';
    echo '<a class="btn btn-sm btn-outline-secondary" href="slovo_padre.php">Âñå ìàòåðèàëû</a>';
    echo '</div>';
    echo '<div class="card-body content-stack">';
    for ($t = 0; $t < mysql_num_rows($padre_all); $t++) {
        $news = mysql_fetch_array($padre_all);

        $dtn = $news['data'];
        $yyn = substr($dtn,0,4);
        $mmn = substr($dtn,5,2);
        $ddn = substr($dtn,8,2);

        $months = array(
            "01"=>"ÿíâàðÿ","02"=>"ôåâðàëÿ","03"=>"ìàðòà","04"=>"àïðåëÿ","05"=>"ìàÿ",
            "06"=>"èþíÿ","07"=>"èþëÿ","08"=>"àâãóñòà","09"=>"ñåíòÿáðÿ","10"=>"îêòÿáðÿ",
            "11"=>"íîÿáðÿ","12"=>"äåêàáðÿ"
        );
        $mm1n = $months[$mmn];
        if ($ddn[0] == "0") $ddn = substr($ddn,1);
        $hours = substr($dtn,11,5);
        $ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>';

        $text = $news['kratko'];
        if (preg_match_all("/[^	]{250}/", $text, $massiv_news)) {
            $text = $massiv_news[0][0].'... <a href="'.$news['link'].'" target="_blank">(÷èòàòü äàëåå)</a>';
        }

        echo '<div class="news-card pb-3 mb-3 border-bottom">';
        echo '<div class="d-flex flex-column flex-md-row align-items-start gap-3">';
        if (!empty($news['oblozka'])) {
            echo '<a class="flex-shrink-0" href="'.$news['link'].'" target="_blank">';
            echo '<img class="img-fluid rounded shadow-sm" style="max-width:200px" src="'.$news['oblozka'].'" alt="" />';
            echo '</a>';
        }
        echo '<div>';
        echo '<h3 class="h6 fw-bold mb-2"><a href="'.$news['link'].'" target="_blank">'.$news['tema'].'</a></h3>';
        echo '<div class="text-muted small mb-2">'.$ddttn.'</div>';
        echo '<p class="mb-0">'.$text.'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
?>
<div class="card card-section media-card">
    <div class="card-body text-center">
        <a href="http://ekzeget.ru/" target="_blank" class="d-inline-block">
            <img src="/IMG/ekzeget.png" alt="" class="img-fluid">
        </a>
    </div>
</div>
</div>
                    </aside>
                </div>
                <div class="col-lg-8 order-lg-1">
                    <main id="osnovnoe" class="content-stack">

<div id="new_day">

 <?php   
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

<?php
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

 <?php
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

<?php
$vid_all = mysql_query("SELECT * FROM host1409556_barysh.video ORDER by id DESC LIMIT 2");
if ($vid_all && mysql_num_rows($vid_all) > 0) {
    echo '<div class="card card-section">';
    echo '<div class="card-header d-flex align-items-center justify-content-between py-3">';
    echo '<span class="section-title mb-0">Âèäåî</span>';
    echo '<a class="btn btn-sm btn-outline-secondary" href="video.php">Âñå âèäåî</a>';
    echo '</div>';
    echo '<div class="card-body content-stack">';
    for ($t = 0; $t < mysql_num_rows($vid_all); $t++) {
        $vid = mysql_fetch_array($vid_all);
        $dtn = $vid['data'];
        $yyn = substr($dtn,0,4);
        $mmn = substr($dtn,5,2);
        $ddn = substr($dtn,8,2);

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

        $hours = substr($dtn,11,5);
        $ddttn = '<span class="date">'.$ddn.' '.$mm1n.' '.$yyn.' ã. '.$hours.'</span>';
        $news_all_wer = mysql_query("SELECT * FROM host1409556_barysh.news_eparhia WHERE video = '".$vid['kod']."'");
        $news_wer = mysql_fetch_array($news_all_wer);
        $patterns = array ('/width="46\%"/');
        $replace = array ('width="100%"');
        $vid['kod'] = preg_replace($patterns, $replace, $vid['kod']);

        echo '<div class="news-card pb-3 mb-3 border-bottom">';
        if ($news_wer['data']) {
            echo '<h3 class="h6 fw-bold mb-2"><a href="news_show.php?data='.$news_wer['data'].'">'.$vid['tema'].'</a></h3>';
        } else {
            echo '<h3 class="h6 fw-bold mb-2">'.$vid['tema'].'</h3>';
        }
        echo '<div class="text-muted small mb-3">'.$ddttn.'</div>';
        echo '<div class="video-wrapper">'.$vid['kod'].'</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}
?>

<div class="card card-section">
    <div class="card-body text-center">
        <script language="JavaScript" src="http://www.eparhia.ru/sinfo.asp?i=3"></script>
    </div>
</div>

                    </main>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</div>

</body>
</html>
