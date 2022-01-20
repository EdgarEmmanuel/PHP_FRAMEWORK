<?php
$renderer->withHeader("src/Views/header.php");
?>

<h1>WELCOME HERE</h1>

<ul>
    <li>
        <a href="<?= $router->generateURI('blog.show', ['slug' => 'edgar'])?>">
            Article Edgar
        </a>
    </li>
</ul>

<?php
$renderer->withFooter("src/Views/footer.php");
?>