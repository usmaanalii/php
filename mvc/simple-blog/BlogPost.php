<?php
    /**
     *
     */
    class BlogPost
    {
        public $id;
        public $title;
        public $post;
        public $author;
        public $tags;
        public $datePosted;

        function __construct($inId=null, $inTitle=null, $inPost=null, $inPostFull=null, $inAuthorID=null, $inDatePosted=null)
        {
            if (!empty($inId)) {
                $this->id = $inId;
            }

            if (!empty($inTitle)) {
                $this->title = $inTitle;
            }

            if (!empty($inPost)) {
                $this->post = $inPost;
            }

            if (!empty($inDatePosted)) {
                $splitDate = explode("-", $inDatePosted);
                $this->datePosted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
            }

            if (!empty($inAuthorID)) {
                $query = mysql_query("SELECT first_name, last_name FROM people WHERE id = '$inAuthorID'");
                $row = mysql_fetch_assoc($query);
                $this->author = $row["fist_name"] . " " . $row["last_name"];
            }

            $postTags = "No Tags";

            if (!empty($inId)) {
                $query = mysql_query("SELECT tags.* FROM blog_post_tags LEFT JOIN (tags) ON (blog_post_tags.tag_id = tags.id) WHERE blog_post_tags.blog_post_id = " . $inId);

                $tagArray = array();
                $tagIDArray = array();

                while ($row = mysql_fetch_assoc($query)) {
                    array_push($tagArray, $row["name"]);
                    array_push($tagIDArray, $row["id"]);
                }
                if (sizeof($tagArray) > 0) {
                    foreach ($tagArray as $tag) {
                        if ($postTags == "No Tags") {
                            $postTags = $tag;
                        } else {
                            $postTags = $postTags . ", " . $tag;
                        }

                    }
                }
            }

            $this->tags = $postTags;
        }
    }

?>
