<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/_header-admin.php';

$articles = getArticles($db);

$i = count($articles);
$j = 0;

while($j<$i){
    $articles[$j]['content'] = substr($articles[$j]['content'],0,100);
    $articles[$j]['title'] = substr($articles[$j]['title'],0,30);
    $j++;
}

echo $twig ->render('admin-article-list.html.twig',[
    'articles' => $articles,
    'connected' => isConnected(),
    'username' => $_SESSION['username'],
]);

require __DIR__.'/_footer.php';
