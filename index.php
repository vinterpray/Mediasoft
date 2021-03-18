<?php
$text = "Пупа и Лупа пошли работать электриками.
         Настало время включать свет.
         Лупа должен был дернуть за рубильник, но его ударило током.
         И Пупе пришлось дергать его за Лупу.
         Пупа и Лупа пошли в экспедицию с ребятами из школы.
         Они забрались на гору,и вот начался сильный ураган.
         Миша держится за Катю,Катя за Игоря,а Пупа за Лупу.
         Пупа и Лупа были фотографами.
         Но они перепутали заказы.
         И Лупа фоткал за Пупу, а Пупа за Лупу.";

$text = mb_strtolower($text);

$words = str_word_count($text, 1, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
$words = array_unique($words);

$count = count($words);

$words_count = [];

foreach ($words as $word) {
    if ($word != '-') {
        preg_match_all("~\b{$word}\b~iu", $text, $words_count[$word]);
    }
}

arsort($words_count);

foreach ($words_count as $word => $word_count) {
    $entry_count = count($word_count[0]);
    echo "{$word}: {$entry_count}" . PHP_EOL;
}

echo "Всего слов: {$count}";