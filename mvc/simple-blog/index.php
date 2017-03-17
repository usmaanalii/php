<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <title>OOP Blog</title>
    </head>
    <body>
        <div id="main">
            <h1>My Simple Blog</h1>
            <div id="blogPosts">
                <?php
                    include 'includes.php';

                    $blogPosts = GetBlogPosts();

                    foreach ($blogPosts as $post) {
                        echo "<div class='post'";
                        echo "<h2>$post->title</h2>";
                        echo "<p>$post->post</p>";
                            echo "<span class='footer'>Posted By: $post->author Posted On: $post->datePosted Tags: $post->tags </span>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
