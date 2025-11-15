<?php
if (isset($_REQUEST[session_name()])) session_start();
$auth = $_SESSION['auth'];
$name_user = $_SESSION['name_user'];
if ($auth != 1) { Header("Location: my_auth.php"); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'head.php'; ?>
<title>Добавление выпуска газеты</title>
</head>

<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">

<?php
include 'golova.php';
include 'menu.php';
include 'content.php';
?>

<div id="osnovnoe">

<h1>Добавление выпуска газеты</h1>

<?php

$submit = $_POST['submit'];

if ($submit) {

    $month = $_POST['month'];
    $text  = $_POST['text'];
    $new_day_add = $_POST['new_day_add'];

    $data = Date("Y.m.d H:i");
    $year = Date("Y");

    mysql_connect("localhost", "host1409556", "0f7cd928");
    mysql_query("SET NAMES 'cp1251'");

    // Номер по общему счёту
    $zz = mysql_query("SELECT * FROM host1409556_barysh.gazeta");
    $b = mysql_num_rows($zz) + 1;

    // Номер в пределах года
    $xx = mysql_query("SELECT * FROM host1409556_barysh.gazeta WHERE year=$year");
    $a  = mysql_num_rows($xx) + 1;

    // Формат номера — например: 3 (125)
    $no = "$a ($b)";

    // Тема для новости
    $tema = '"Моя епархия" № '.$no.' '.$month;

    mysql_query("INSERT INTO host1409556_barysh.gazeta VALUES ('', '$data', '$year', '$month', '$no', '$text')");

    if ($new_day_add == 'yes') {

        $url = 'gazeta_show';
        $kratko = 'Добавлен очередной номер газеты "Моя епархия".';

        mysql_query("INSERT INTO host1409556_barysh.news VALUES ('$data', '$url', '$tema', '$kratko')");
    }

}
?>

<table cellspacing="3" cellpadding="2" width="400" align="center" border="0">
<form action="<?php echo 'my_gazeta.php'; ?>" method="post">

<tr><td valign="top"><b>Месяц:</b></td><td></td></tr>

<tr><td colspan="2">
<select name="month" size="1">

<option value="январь"   <?php if (Date("m")=='01') echo 'selected'; ?>>январь</option>
<option value="февраль"  <?php if (Date("m")=='02') echo 'selected'; ?>>февраль</option>
<option value="март"     <?php if (Date("m")=='03') echo 'selected'; ?>>март</option>
<option value="апрель"   <?php if (Date("m")=='04') echo 'selected'; ?>>апрель</option>
<option value="май"      <?php if (Date("m")=='05') echo 'selected'; ?>>май</option>
<option value="июнь"     <?php if (Date("m")=='06') echo 'selected'; ?>>июнь</option>
<option value="июль"     <?php if (Date("m")=='07') echo 'selected'; ?>>июль</option>
<option value="август"   <?php if (Date("m")=='08') echo 'selected'; ?>>август</option>
<option value="сентябрь" <?php if (Date("m")=='09') echo 'selected'; ?>>сентябрь</option>
<option value="октябрь"  <?php if (Date("m")=='10') echo 'selected'; ?>>октябрь</option>
<option value="ноябрь"   <?php if (Date("m")=='11') echo 'selected'; ?>>ноябрь</option>
<option value="декабрь"  <?php if (Date("m")=='12') echo 'selected'; ?>>декабрь</option>

</select>
</td></tr>

<tr><td valign="top"><b>Код:</b></td><td></td></tr>

<tr>
    <td colspan="2">
        <textarea name="text" cols="55" rows="20" data-editor="rich"></textarea>
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="checkbox" name="new_day_add" value="yes" id="new_day">
        <label for="new_day"><b>Выводить в новостях</b></label>
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Добавить" />
        <input type="reset" value="Очистить" />
    </td>
</tr>

</form>
</table>

</div>

<?php include 'footer.php'; ?>

</div>
</body>
</html>
