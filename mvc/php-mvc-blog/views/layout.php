<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>php_mvc_blog-copy</title>
    </head>
    <body>
        <header>
            <a href="#">Home</a>
            <a href="?controller=posts&action=index">Posts</a>
        </header>

        <?php require_once 'routes.php'; ?>

        <footer>
            Copyright
        </footer>
    </body>
</html>
