<?php
/**
 *  -   ,     .
 */

function legacy_mysqli()
{
    static $link = null;

    if ($link instanceof mysqli) {
        return $link;
    }

    $link = @mysqli_connect('localhost', 'host1409556', '0f7cd928', 'host1409556_barysh');
    if (!$link) {
        trigger_error(' : ' . mysqli_connect_error(), E_USER_WARNING);
        return null;
    }

    mysqli_set_charset($link, 'cp1251');
    return $link;
}

function count_combined_news()
{
    $link = legacy_mysqli();
    if (!$link) {
        return 0;
    }

    $sql = "SELECT\n                (SELECT COUNT(*) FROM news_eparhia) +\n                (SELECT COUNT(*) FROM news_mitropolia) AS total";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        trigger_error(' : ' . mysqli_error($link), E_USER_WARNING);
        return 0;
    }

    $row = mysqli_fetch_assoc($result);
    return isset($row['total']) ? (int)$row['total'] : 0;
}

function fetch_combined_news($page, $perPage)
{
    $link = legacy_mysqli();
    if (!$link) {
        return array();
    }

    $page = (int)$page;
    $perPage = (int)$perPage;

    if ($page < 1) {
        $page = 1;
    }
    if ($perPage < 1) {
        $perPage = 10;
    }

    $offset = ($page - 1) * $perPage;

    $sql = "(SELECT\n                STR_TO_DATE(data, '%Y.%m.%d %H:%i') AS published_at,\n                data AS legacy_key,\n                tema,\n                kratko,\n                oblozka,\n                video,\n                views,\n                '' AS external_link,\n                'local' AS source,\n                '' AS section_label\n            FROM news_eparhia)\n            UNION ALL\n            (SELECT\n                data AS published_at,\n                DATE_FORMAT(data, '%Y.%m.%d %H:%i') AS legacy_key,\n                tema,\n                kratko,\n                oblozka,\n                NULL AS video,\n                NULL AS views,\n                link AS external_link,\n                'mitropolia' AS source,\n                section AS section_label\n            FROM news_mitropolia)\n            ORDER BY published_at DESC\n            LIMIT ?, ?";

    $stmt = mysqli_prepare($link, $sql);
    if (!$stmt) {
        trigger_error(' : ' . mysqli_error($link), E_USER_WARNING);
        return array();
    }

    mysqli_stmt_bind_param($stmt, 'ii', $offset, $perPage);

    if (!mysqli_stmt_execute($stmt)) {
        $error = mysqli_error($link);
        mysqli_stmt_close($stmt);
        trigger_error(' : ' . $error, E_USER_WARNING);
        return array();
    }

    if (!mysqli_stmt_bind_result(
        $stmt,
        $publishedAt,
        $legacyKey,
        $tema,
        $kratko,
        $oblozka,
        $video,
        $views,
        $externalLink,
        $source,
        $sectionLabel
    )) {
        mysqli_stmt_close($stmt);
        trigger_error(' : ' . mysqli_error($link), E_USER_WARNING);
        return array();
    }

    $items = array();
    while (mysqli_stmt_fetch($stmt)) {
        $items[] = array(
            'published_at' => $publishedAt ? $publishedAt : '1970-01-01 00:00:00',
            'legacy_key' => $legacyKey,
            'tema' => $tema,
            'kratko' => $kratko,
            'oblozka' => $oblozka,
            'video' => $video,
            'views' => $views,
            'external_link' => $externalLink,
            'source' => $source,
            'section_label' => $sectionLabel
        );
    }

    mysqli_stmt_close($stmt);
    return $items;
}

function format_russian_datetime($datetime)
{
    if (!$datetime) {
        return '';
    }

    $ts = strtotime($datetime);
    if (!$ts) {
        return $datetime;
    }

    $months = array(
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '',
        6 => '',
        7 => '',
        8 => '',
        9 => '',
        10 => '',
        11 => '',
        12 => ''
    );

    $day = (int)date('j', $ts);
    $month = (int)date('n', $ts);
    $year = date('Y', $ts);
    $time = date('H:i', $ts);

    $month_label = isset($months[$month]) ? $months[$month] : '';

    return '<span class="date">' . $day . ' ' . $month_label . ' ' . $year . ' . ' . $time . '</span>';
}

function transform_legacy_markup($text)
{
    $patterns = array(
        '/(?:\/{3})(.+)(?:\/{3})/U',
        '/(?:\|{3})(.+)(?:\|{3})/U',
        '/(?:\{{3})(http[s]*:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i',
        '/(?:\{{3})(http[s]*:\/\/[^\s\[<\(\)\|]+)(?:\}{3})/i',
        '/(?:\{{3})([_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3}))(?:\}{3})/',
        '/\n/',
        '/@R(\d+)[-]?([^@]*)@/',
        '/@L(\d+)[-]?([^@]*)@/',
        '/(?:\[{3})(([0-9]*[^\]{3}]*)*)(?:\]{3})/'
    );

    $replace = array(
        '<i>${1}</i>',
        '<b>${1}</b>',
        '<a href="${1}" target="_blank">${2}</a>',
        '<a href="${1}" target="_blank">${1}</a>',
        '<a href="mailto:${1}">${1}</a>',
        '</p><p>',
        '<span class="photos"><a href="FOTO/${1}.jpg" alt="${2}" title="${2}"><img class="news-photo float-end" src="FOTO_MINI/${1}.jpg" /></a></span>',
        '<span class="photos"><a href="FOTO/${1}.jpg" alt="${2}" title="${2}"><img class="news-photo float-start" src="FOTO_MINI/${1}.jpg" /></a></span>',
        '<div class="text-center fw-bold" style="width:100%; color:#743C00">${1}</div>'
    );

    $text = trim($text);
    if ($text === '') {
        return '';
    }

    $html = preg_replace($patterns, $replace, $text);
    return '<p>' . $html . '</p>';
}
