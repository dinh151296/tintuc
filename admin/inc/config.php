<?php

$root = 'http://news.local/admin/';
// $prefixAdmin = $root . 'admin/';
$prefixAdmin = $root;

$admin = [
    'link' => [
        'index'         => $prefixAdmin . 'index.php',
        'category'      => $prefixAdmin . 'category.php',
        'category_add'  => $prefixAdmin . 'category-add.php',
        'category_edit' => $prefixAdmin . 'category-edit.php?id=',
        'category_del'  => $prefixAdmin . 'category-delete.php?id=',
        'news'          => $prefixAdmin . 'news.php',
        'news_add'      => $prefixAdmin . 'news-add.php',
        'news_edit'     => $prefixAdmin . 'news-edit.php?id=',
        'news_del'      => $prefixAdmin . 'news-delete.php?id=',
    ]
];

