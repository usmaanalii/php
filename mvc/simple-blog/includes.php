<?php
    include 'blogpost.php';

    $connection = mysql_connect('localhost', 'username', 'password') or die("<p class='error'>Sorry, we were unable to connect to the database server</p>");

    $database = "nettuts_blog";

    mysql_select_db($database, $connection) or die("<p class='error'>Sorry, we were unable to connect to the database</p>");

    function GetBlogPosts($inId=null, $inTagId = null)
    {
        if (!empty($inId)) {
                $query = mysql_query("SELECT * FROM blog_posts WHERE id = $inId ORDER BY id DESC");
            }
        elseif (!empty($inTagID)) {
                $query = mysql_query("SELECT blog_posts.* FROM blog_post_tags LEFT JOIN (blog_posts) ON (blog_post_tags.postID = blog_posts.id) WHERE blog_post_tags.tagID = $inTagID ORDER BY blog_posts.id DESC");
        }
        else {
                $query = mysql_query("SELECT * FROM blog_posts ORDER BY id DESC");
        }

        $postArray = array();

        while ($row = mysql_fetch_assoc($query)) {
            $myPost = new BlogPost($row["id"], $row["title"], $row["post"], $row["author_id"]);
            array_push($postArray, $myPost);
        }

        return $postArray;
    }
?>
