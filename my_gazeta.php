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
<title>Äîáàâëåíèå âûïóñêà ãàçåòû</title>

</head>
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';

include 'menu.php';

include 'content.php';

?>
<div id="osnovnoe">

<h1>Äîáàâëåíèå âûïóñêà ãàçåòû</h1>

<?php
 $submit = $_POST['submit'];
if ($submit) {
 $month = $_POST['month'];
 $text = $_POST['text'];
  $new_day_add = $_POST['new_day_add'];
 $data = Date("Y.m.d H:i");
 $year = Date("Y");

    mysql_connect("localhost", "host1409556", "0f7cd928"); 
    mysql_query("SET NAMES 'cp1251'");
	$zz = mysql_query("SELECT * FROM host1409556_barysh.gazeta");
$b = mysql_num_rows($zz);
$b= $b+1;

$xx = mysql_query("SELECT * FROM host1409556_barysh.gazeta WHERE year=$year");
$a = mysql_num_rows($xx);
$a= $a+1;
$no = "$a ($b)";
$tema = '"Ìîÿ åïàðõèÿ" ¹ '.$no.' '.$month;
	   mysql_query("INSERT INTO host1409556_barysh.gazeta VALUES ('', '$data', '$year', '$month', '$no', '$text')");
	   	   if ($new_day_add == 'yes') {
		   $url = 'gazeta_show'; 
		   $kratko = 'Äîáàâëåí î÷åðåäíîé íîìåð ãàçåòû "Ìîÿ åïàðõèÿ".';
	   	   mysql_query("INSERT INTO host1409556_barysh.news VALUES ('$data', '$url', '$tema', '$kratko')");
}
		<TR><TD colspan=2><TEXTAREA NAME='text' data-editor="rich" COLS=55 ROWS=20></TEXTAREA></TD></TR>
}
?>
	<TABLE CELLSPACING=3 CELLPADDING=2 width='400' align='center' border=0>
        <FORM ACTION='<? echo 'my_gazeta.php'; ?>' method='post'>
		<TR><TD VALIGN=top><b>Ìåñÿö:</B></TD><TD></TD></TR>
		<TR><TD colspan=2>
				<select name='month' size=1>
		<option value=ÿíâàðü <? if (Date("m") == '01') echo 'selected';?> >ÿíâàðü</option>
		<option value=ôåâðàëü <? if (Date("m") == '02') echo 'selected';?>>ôåâðàëü</option>
		<option value=ìàðò <? if (Date("m") == '03') echo 'selected';?>>ìàðò</option>
		<option value=àïðåëü <? if (Date("m") == '04') echo 'selected';?>>àïðåëü</option>
		<option value=ìàé <? if (Date("m") == '05') echo 'selected';?>>ìàé</option>
		<option value=èþíü <? if (Date("m") == '06') echo 'selected';?>>èþíü</option>
		<option value=èþëü <? if (Date("m") == '07') echo 'selected';?>>èþëü</option>
		<option value=àâãóñò <? if (Date("m") == '08') echo 'selected';?>>àâãóñò</option>
		<option value=ñåíòÿáðü <? if (Date("m") == '09') echo 'selected';?>>ñåíòÿáðü</option>
		<option value=îêòÿáðü <? if (Date("m") == '10') echo 'selected';?>>îêòÿáðü</option>
		<option value=íîÿáðü <? if (Date("m") == '11') echo 'selected';?>>íîÿáðü</option>
		<option value=äåêàáðü <? if (Date("m") == '12') echo 'selected';?>>äåêàáðü</option>
		</select>
		</TD></TR>
    	<TR><TD VALIGN=top><B>Êîä:</B></TD><TD></TD></TR>
		<TR><TD colspan=2><TEXTAREA NAME='text' COLS=55 ROWS=20></TEXTAREA></TD></TR>
			<TR><TD colspan=2><INPUT TYPE="CHECKBOX" NAME="new_day_add" VALUE ="yes" id="new_day"> <label for="new_day"><b>Âûâîäèòü â íîâîñòÿõ</b></label></TD></TR>

	<TR><TD colspan=2>
	<INPUT TYPE='submit' name='submit' value='Äîáàâèòü' />
        <INPUT TYPE='reset' value='Î÷èñòèòü'></TD></TR>
 </FORM>  

	</TABLE>	

</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>