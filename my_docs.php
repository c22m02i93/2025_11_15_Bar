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
<title>Загрузка документа</title>
</head>

<body>
<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">

<?php
include 'golova.php';
include 'menu.php';
include 'content.php';
?>

<div id="osnovnoe">

<h1>Загрузка документа</h1>

<?php
$submit = $_POST['submit'];

if ($submit) {

    $data = Date("Y.m.d H:i");

#################################################
function rus2translit($string) {
    $converter = array(
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z',
        'и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r',
        'с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'sch',
        'ъ'=>'','ы'=>'y','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',

        'А'=>'A','Б'=>'B','В'=>'V','Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','Ж'=>'Zh','З'=>'Z',
        'И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R',
        'С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ц'=>'C','Ч'=>'Ch','Ш'=>'Sh','Щ'=>'Sch',
        'Ъ'=>'','Ы'=>'Y','Ь'=>'','Э'=>'E','Ю'=>'Yu','Я'=>'Ya'
    );
    return strtr($string, $converter);
}

function str2url($str) {
    $str = rus2translit($str);
    $str = strtolower($str);
    $str = preg_replace('~[^-a-z0-9\._]+~u', '_', $str);
    $str = trim($str, "-");
    return $str;
}
#################################################

$name_doc  = str2url($_FILES['uploadfile']['name']);
$name_time = str2url($data);

$uploadfile = 'TYPE/' . $name_time . '_' . $name_doc;

copy($_FILES['uploadfile']['tmp_name'], $uploadfile);

$size = $_FILES['uploadfile']['size'] / 1024;
$size = round($size, 1);

echo '<p style="color:#135B00; text-align:center">
Документ <b>http://barysh-eparhia.ru/'.$uploadfile.'</b> успешно загружен!
</p><br />';
}
?>

<table cellspacing="3" cellpadding="2" width="400" align="center" border="0">
<form action="my_docs.php" method="post" enctype="multipart/form-data">

<tr>
    <td valign="top">Выберите файл для загрузки:</td>
    <td><input type="file" name="uploadfile" required></td>
</tr>

<tr>
    <td colspan="2" valign="top">
        <input type="submit" name="submit" value="Загрузить" />
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
