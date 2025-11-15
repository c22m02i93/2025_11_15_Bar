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
<title> </title>

</head>
<body>

<div style="box-shadow: 0 0 20px rgba(0,0,0,0.5);">
<?
include 'golova.php';
$new = yes;
include 'menu.php';
include 'function.php';
require_once __DIR__.'/includes/table_functions.php';

include 'content.php';

?>
<div id="osnovnoe">

<h1> </h1>
<?
$perPage = 10;
if (!isset($_GET['page'])) {
  $p = 1;
} else {
  $p = (int)$_GET['page'];
  if ($p < 1) $p = 1;
}

$total = count_combined_news();
$num_pages = $total > 0 ? ceil($total / $perPage) : 1;
if ($p > $num_pages) $p = $num_pages;
$items = fetch_combined_news($p, $perPage);

$sectionTitles = array(
  'barysh_tag' => ' ',
  'arhipastry' => ' ',
  'slovo' => '  '
);

echo GetNav($p, $num_pages, "news").'<hr style="width: 100%" />';

if (!empty($items)) {
  foreach ($items as $item) {
    $isLocal = ($item['source'] === 'local');
    $title = htmlspecialchars($item['tema'], ENT_QUOTES, 'cp1251');
    $dateLabel = format_russian_datetime($item['published_at']);
    if ($isLocal) {
      $preview = transform_legacy_markup($item['kratko']);
    } else {
      $previewText = htmlspecialchars($item['kratko'], ENT_QUOTES, 'cp1251');
      $preview = '<p>'.nl2br($previewText).'</p>';
    }

    if ($isLocal) {
      $link = 'news_show.php?data='.urlencode($item['legacy_key']);
      $linkAttr = '';
    } else {
      $link = $item['external_link'];
      $linkAttr = ' target="_blank" rel="noopener"';
    }

    $imageHtml = '';
    if (!empty($item['oblozka'])) {
      if ($isLocal) {
        $imgSrc = 'FOTO_MINI/'.htmlspecialchars($item['oblozka'], ENT_QUOTES, 'cp1251').'.jpg';
      } else {
        $imgSrc = htmlspecialchars($item['oblozka'], ENT_QUOTES, 'cp1251');
      }
      $imageHtml = '<img class="img-fluid rounded shadow-sm me-3 mb-3" src="'.$imgSrc.'" alt="'.$title.'" />';
    }

    $viewsInfo = '';
    if ($isLocal) {
      $viewsInfo = '<span class="views">: '.(int)$item['views'].'.</span>';
    }

    $badge = '';
    if (!$isLocal && !empty($item['section_label'])) {
      $section = $item['section_label'];
      $label = isset($sectionTitles[$section]) ? $sectionTitles[$section] : $section;
      $badge = '<span class="badge bg-secondary ms-2">'.htmlspecialchars($label, ENT_QUOTES, 'cp1251').'</span>';
    }

    echo '<article class="card shadow-sm border-0 mb-4">';
    echo '<div class="card-body d-flex flex-column flex-md-row">';
    if ($imageHtml) {
      echo '<div class="flex-shrink-0">'.$imageHtml.'</div>';
    }
    echo '<div>';
    echo '<h2 class="h4 card-title"><a class="text-decoration-none" href="'.$link.'"'.$linkAttr.'>'.$title.'</a>'.$badge.'</h2>';
    echo '<div class="mb-2">'.$dateLabel.'</div>';
    echo '<div class="card-text">'.$preview.'</div>';
    echo '<div class="mt-3">'.$viewsInfo;
    if (!$isLocal && $item['external_link']) {
      echo ' <a class="btn btn-sm btn-outline-primary" href="'.$link.'" target="_blank" rel="noopener">  </a>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</article>';
  }
} else {
  echo '<div class="alert alert-info">  .</div>';
}

echo '<div style="width: 100%">'.GetNav($p, $num_pages, "news").'</div><hr style="width: 100%" />';
?>

</div>

<?
include 'footer.php';
?>

 </div>
</body>
</html>
