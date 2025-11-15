<?
if (isset($_REQUEST[session_name()])) session_start ();
$auth=$_SESSION['auth'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
include 'head.php';
?>

<div id="osnovnoe" class="calendar-page">
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';

include 'menu.php';

include 'content.php';
include 'function.php';

if ($_POST['submit']) {
 $month = $_POST['month'];
 $year = $_POST['year'];
}
if ($_GET['month']) {
 $month = $_GET['month'];
 $year = Date("Y");
}
?>
<div id="osnovnoe">

<h1>Êàëåíäàðü åïàðõèè</h1>

	<div style="text-align:center;" >
	<TABLE CELLSPACING=3 CELLPADDING=2 width='80%' align='center' border=0>
        <FORM ACTION='<? echo 'kalendar.php'; ?>' method='post'>
		<TR><TD>
						<select name='month' size=1 style="text-align:center; font-size:20px; height: 30px;">
		<option value='01' <? if (($month && $month == '01') || (empty($month) && Date("m") == '01')) echo 'selected';?>>ÿíâàðü</option>
		<option value='02' <? if (($month && $month == '02') || (empty($month) && Date("m") == '02')) echo 'selected';?>>ôåâðàëü</option>
		<option value='03' <? if (($month && $month == '03') || (empty($month) && Date("m") == '03')) echo 'selected';?>>ìàðò</option>
		<option value='04' <? if (($month && $month == '04') || (empty($month) && Date("m") == '04')) echo 'selected';?>>àïðåëü</option>
		<option value='05' <? if (($month && $month == '05') || (empty($month) && Date("m") == '05')) echo 'selected';?>>ìàé</option>
		<option value='06' <? if (($month && $month == '06') || (empty($month) && Date("m") == '06')) echo 'selected';?>>èþíü</option>
		<option value='07' <? if (($month && $month == '07') || (empty($month) && Date("m") == '07')) echo 'selected';?>>èþëü</option>
		<option value='08' <? if (($month && $month == '08') || (empty($month) && Date("m") == '08')) echo 'selected';?>>àâãóñò</option>
		<option value='09' <? if (($month && $month == '09') || (empty($month) && Date("m") == '09')) echo 'selected';?>>ñåíòÿáðü</option>
		<option value='10' <? if (($month && $month == '10') || (empty($month) && Date("m") == '10')) echo 'selected';?>>îêòÿáðü</option>
		<option value='11' <? if (($month && $month == '11') || (empty($month) && Date("m") == '11')) echo 'selected';?>>íîÿáðü</option>
		<option value='12' <? if (($month && $month == '12') || (empty($month) && Date("m") == '12')) echo 'selected';?>>äåêàáðü</option>
		</select>
		<INPUT required pattern="\d{4}" maxlength="4" TYPE="number" value="<? if ($year) echo $year; else echo Date("Y");?>" NAME="year" style="text-align:center; font-size:20px; height: 24px;"  min="<?php echo Date("Y");?>" max="<?php echo Date("Y")+1;?>" step="1"/>

	<INPUT TYPE='submit' name='submit' value='Ïîêàçàòü' style="text-align:center; font-size:20px; height: 30px;" />
    </TD></TR>
 </FORM>  
	</TABLE>	
	<hr /><br />
	</div>
<?php
if ($_POST['submit'] || $_GET['month']) {
 if ($month == '01') {$mon2 = 'ÿíâàðÿ'; $day_all = '31';}
 if ($month == '02') {$mon2 = 'ôåâðàëÿ'; $day_all = '29';}
 if ($month == '03') {$mon2 = 'ìàðòà'; $day_all = '31';}
 if ($month == '04') {$mon2 = 'àïðåëÿ'; $day_all = '30';}
 if ($month == '05') {$mon2 = 'ìàÿ'; $day_all = '31';}
 if ($month == '06') {$mon2 = 'èþíÿ'; $day_all = '30';}
 if ($month == '07') {$mon2 = 'èþëÿ'; $day_all = '31';}
 if ($month == '08') {$mon2 = 'àâãóñòà'; $day_all = '31';}
 if ($month == '09') {$mon2 = 'ñåíòÿáðÿ'; $day_all = '30';}
 if ($month == '10') {$mon2 = 'îêòÿáðÿ'; $day_all = '31';}
 if ($month == '11') {$mon2 = 'íîÿáðÿ'; $day_all = '30';}
 if ($month == '12') {$mon2 = 'äåêàáðÿ'; $day_all = '31';}

	for ($d=1; $d<=$day_all; $d++)
	{
	if (strlen($d) == '1') $dd = '0'.$d; else $dd = $d;
	//ÀÐÕÈÅÐÅÉ
	$arhi_rozd = '12.06';
	$arhi_hiro = '10.28';
	$arhi_postrig = '11.30';
	$arhi_angel = '12.02';
	$arhi_text = '<div style="margin-bottom: 5px"><a href="/arhierei.php" target="_blank">Åïèñêîï Áàðûøñêèé è Èíçåíñêèé Ôèëàðåò</a> - ';
	
if ($month.'.'.$dd == $arhi_rozd) {
	$yy = '1963';
	$res = $year - $yy;
	$text_arhi = 'äåíü ðîæäåíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
	}
if ($month.'.'.$dd == $arhi_hiro) {
	$yy = '2012';
	$res = $year - $yy;
	$text_arhi = 'àðõèåðåéñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
	}
if ($month.'.'.$dd == $arhi_postrig) {
	$yy = '1996';
	$res = $year - $yy;
	$text_arhi = 'ìîíàøåñêèé ïîñòðèã <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
	}
if ($month.'.'.$dd == $arhi_angel) {
	$text_arhi .= 'äåíü àíãåëà</div>';
	}
//ÄÍÈ ÐÎÆÄÅÍÈß
	$klirik_all = mysql_query("SELECT id, name, san, rozd FROM host1409556_barysh.klir WHERE rozd LIKE '%$month.$dd' AND status LIKE 'øòàòíûé' ORDER by name ASC");
while($klirik = mysql_fetch_array($klirik_all))
{
	$yy = substr($klirik['rozd'],0,4); // Ãîä
	$res = $year - $yy;
	$text_cal .= '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü ðîæäåíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
}
	//ÄÈÀÊÎÍÑÊÀß ÕÈÐÎÒÎÍÈß
	$klirik_all = mysql_query("SELECT id, name, san, diak FROM host1409556_barysh.klir WHERE diak LIKE '%$month.$dd' AND status LIKE 'øòàòíûé' ORDER by name ASC");
while($klirik = mysql_fetch_array($klirik_all))
{
	$yy = substr($klirik['diak'],0,4); // Ãîä
	$res = $year - $yy;
	$text_cal .= '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äèàêîíñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
}
	//ÈÅÐÅÉÑÊÀß ÕÈÐÎÒÎÍÈß
	$klirik_all = mysql_query("SELECT id, name, san, presv FROM host1409556_barysh.klir WHERE presv LIKE '%$month.$dd' AND status LIKE 'øòàòíûé' ORDER by name ASC");
while($klirik = mysql_fetch_array($klirik_all))
{
	$yy = substr($klirik['presv'],0,4); // Ãîä
	$res = $year - $yy;
	$text_cal .= '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - èåðåéñêàÿ õèðîòîíèÿ <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
}
	//ÌÎÍÀØÅÑÊÈÉ ÏÎÑÒÐÈÃ
	$klirik_all = mysql_query("SELECT id, name, san, monah FROM host1409556_barysh.klir WHERE monah LIKE '%$month.$dd' AND status LIKE 'øòàòíûé' ORDER by name ASC");
while($klirik = mysql_fetch_array($klirik_all))
{
	$yy = substr($klirik['monah'],0,4); // Ãîä
	$res = $year - $yy;
	$text_cal .= '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - ìîíàøåñêèé ïîñòðèã <b>'.$res.' '.yearRus($res, 'ãîä', 'ãîäà', 'ëåò').'</b></div>';
}	
	//ÄÍÈ ÀÍÃÅËÀ
	$klirik_all = mysql_query("SELECT id, name, san FROM host1409556_barysh.klir WHERE angel LIKE '%$dd.$month%' AND status LIKE 'øòàòíûé' ORDER by name ASC");
while($klirik = mysql_fetch_array($klirik_all))
{
	$text_cal .= '<div style="margin-bottom: 5px"><a href="/klirik.php?id='.$klirik['id'].'" target="_blank">'.$klirik['san'].' '.$klirik['name'].'</a> - äåíü àíãåëà</div>';
}
	//ÏÐÅÑÒÎËÛ
	$prihod_all = mysql_query("SELECT id, name FROM host1409556_barysh.prihods WHERE angel LIKE '%$dd.$month%' ORDER by name ASC");
while($prihod = mysql_fetch_array($prihod_all))
{
	$text_cal_prest .= '<div style="margin-bottom: 5px"><a href="/prihod.php?id='.$prihod['id'].'" target="_blank">'.$prihod['name'].'</a></div>';
}
	if ($text_cal || $text_cal_prest || $text_arhi) {
	echo '<div style="background: #fff; width: 95%; border: 1px solid #D7D7D7;box-shadow:2px 3px 5px #aaa; padding: 5px 10px">';
	echo '<div style="color:#005698;font-size: 130%;text-align: center; ">'.$d.' '.$mon2.'</div>'; 	
	if ($text_arhi) {echo '<br /><div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Àðõèåðåé</h2>'.$arhi_text.$text_arhi.'</div>'; unset($text_arhi);}
	if ($text_cal) {echo '<br /><div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Äóõîâåíñòâî</h2>'.$text_cal.'</div>'; unset($text_cal);}
	if ($text_cal_prest) {echo '<br /><div id="calendar"><h2 style="padding-left: 5px; margin-bottom: 5px">Ïðåñòîëüíûé ïðàçäíèê</h2>'.$text_cal_prest.'</div>'; unset($text_cal_prest);}
	echo '</div><br />';
	}
	}
	}
?>

</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>