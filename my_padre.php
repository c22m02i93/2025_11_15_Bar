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
<title>Äîáàâëåíèå ñëîâà àðõèïàñòûðÿ</title>

</head>
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';

include 'menu.php';

include 'content.php';

?>
<div id="osnovnoe">

<h1>Äîáàâëåíèå ñëîâà àðõèïàñòûðÿ</h1>

<?php
 $submit = $_POST['submit'];
if ($submit) {
 $news = $_POST['news'];
 $tema = $_POST['tema'];
 $data = Date("Y.m.d H:i");

if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))  {
#######3
function imageresize($outfile,$infile,$neww,$newh,$quality) {
    $im=imagecreatefromjpeg($infile);
    $k1=$neww/imagesx($im);
    $k2=$newh/imagesy($im);
    $k=$k1>$k2?$k2:$k1;

    $w=intval(imagesx($im)*$k);
    $h=intval(imagesy($im)*$k);

    $im1=imagecreatetruecolor($w,$h);
    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }	
################

 $b = Date("Y.m.d-H:i");
preg_match_all ("/(\.\w+)$/", $_FILES['uploadfile']['name'], $massiv_uploadfile);
$massiv_uploadfile[0][0]=strtolower($massiv_uploadfile[0][0]);
if ($massiv_uploadfile[0][0] == ".jpeg") $massiv_uploadfile[0][0] = ".jpg";
if ($massiv_uploadfile[0][0] == ".jpg") {

$uploadfile = 'IMG/'.$b.$massiv_uploadfile[0][0];

copy($_FILES['uploadfile']['tmp_name'], $uploadfile);

	############## íîâîñòü äíÿ
	
	function removedir ($directory){
$dir = opendir($directory);
while($file = readdir($dir))
{if ( is_file ($directory."/".$file))
{unlink ($directory."/".$file);}
else if ( is_dir ($directory."/".$file) && ($file != ".") && ($file != ".."))
{removedir ($directory."/".$file);}}
closedir ($dir);
rmdir ($directory);
return TRUE;}

removedir ('DAY');
mkdir('DAY', 0755, true);

$uploadfile_day = 'DAY/'.$b.'.jpg';
imageresize($uploadfile_day,$uploadfile,200,200,100);
	imageresize($uploadfile,$uploadfile,150,150,100);

}
}
else $uploadfile =NULL;

#     Çàïèñü â áàçó

    mysql_connect("localhost", "host1409556", "0f7cd928"); 
		   mysql_query("SET NAMES 'cp1251'");
	$patterns = array ('/(^\/)\/(^\/)/');
	$replace = array ('${1}&#047;${2}');
	$news = preg_replace($patterns, $replace, $news);
   mysql_query("INSERT INTO host1409556_barysh.padre VALUES ('$data', '$b', '$tema', '$news', '0')");
	   
	$patterns = array ('/(?:\/)/', '/(?:\|)/', '/\n/', '/(?:\{)/', '/(?:\})/', '/\[/', '/\]/');
	$replace = array ('', '', '</p><p>', '', '', '', '');
	$news = preg_replace($patterns, $replace, $news);


	   if (preg_match_all ("/^[^\t]{350}/", $news, $massiv_news)) {
		<TR><TD colspan=2><TEXTAREA NAME='news' data-editor="rich" COLS=55 ROWS=20></TEXTAREA></TD></TR>
	   else $kratko = $news;
	   	   mysql_query("UPDATE host1409556_barysh.news_day SET data='$data', oblozka='$b', tema='$tema', text='$kratko', page='slovo_padre'");

$url = 'slovo_padre_show';
	   
	   	   mysql_query("INSERT INTO host1409556_barysh.news VALUES ('$data', '$url', '$tema', '$kratko')");
		   

echo '<p style="color:#135B00; text-align: center"><b>Çàïèñü óñïåøíî äîáàâëåíà!</b></p><br />';
}
?>
	<TABLE CELLSPACING=3 CELLPADDING=2 width='500' align='center' border=0>
        <FORM ACTION='<? echo 'my_padre.php'; ?>' method='post' enctype=multipart/form-data>
				<TR><TD VALIGN=top><b>Êàðòèíêà:</B></TD><TD></TD></TR>
		<TR><TD colspan=2><input type=file name=uploadfile></TD></TR>

		<TR><TD VALIGN=top><b>Òåìà:</B></TD><TD></TD></TR>
		<TR><TD colspan=2><INPUT TYPE="TEXT" NAME="tema" SIZE=70/></TD></TR>
    	<TR><TD VALIGN=top><B>Òåêñò:</B></TD><TD></TD></TR>
		<TR><TD colspan=2><TEXTAREA NAME='news' COLS=55 ROWS=20></TEXTAREA></TD></TR>
	<TR><TD colspan=2>
	<INPUT TYPE='submit' name='submit' value='Äîáàâèòü' />
        <INPUT TYPE='reset' value='Î÷èñòèòü'></TD></TR>
 </FORM>  

	</TABLE>	
	<hr />
	<p><b>Ïðàâèëà îôîðìëåíèÿ:</b></p>
	<p><b>|||ñëîâî|||</b> - âûäåëèòü òåêñò æèðíûì.</p>
	<p><b>///ñëîâî///</b> - âûäåëèòü òåêñò êóðñèâîì.</p>
	<p><b>[[[ñëîâî]]]</b> - òåêñò ïî öåíòðó.</p>
	<p><b>{{{Ìô. 1:1}}}</b> - Áèáëåéñêàÿ ññûëêà.</p>
	<p><b>http://ññûëêà</b> - àêòèâíàÿ ññûëêà. Ââîä <b>http://</b> ïåðåä ññûëêîé îáÿçàòåëåí. </p>

</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>