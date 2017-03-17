<?php
    // function for adding content to the posts table
    function add_post($userid, $body){
    $sql = "insert into posts (user_id, body, stamp)
            values ($userid, '". mysql_real_escape_string($body). "',now())";

    $result = mysql_query($sql);
}

    // show all the posts for a particular user ID
    function show_posts($userid, $limit=0)
    {
        $posts = array();

        $user_string = implode(',', $userid);
        $extra = " AND id IN ($user_string)";

        if ($limit > 0) {
            $extra = "limit $limit";
        } else {
            $extra = '';
        }

        $sql = "SELECT user_id, body, stamp FROM posts
                WHERE user_id IN ($user_string)
                ORDER BY stamp DESC $extra";

        echo $sql;

        $result = mysql_query($sql);

        while ($data = mysql_fetch_object($result)) {
            $posts[] = array(
                'stamp' => $data->stamp,
                'user_id' => $data->userid,
                'body' => $data->body
            );
        }

        return $posts;

    }

    // show users function
    function show_users($user_id=0)
    {
        if ($user_id > 0) {
            $follow = array();
            $fsql = "SELECT user_id FROM following
                    WHERE follower_id = '$user_id'";

            $fresult = mysql_query($fsql);

            while ($f = mysql_fetch_object($fresult)) {
                array_push($follow, $f->user_id);
            }

            if (count($follow)) {
                $id_string = implode(',', $follow);
                $extra = " AND id IN ($id_string)";
            }
            else {
                return array();
            }
        }

        $users = array();
        $sql = "SELECT id, username FROM users
                WHERE status = 'active' ORDER BY username";

        $result = mysql_query($sql);

        while ($data = mysql_fetch_object($result)) {
            $users[$data->id] = $data->username;
        }

        return $users;
    }

    // get back every user followed
    function following($userid)
    {
        $users = array();

        $sql = "SELECT DISTINCT user_id FROM following
                WHERE follower_id = '$userid'";

        $result = mysql_query($sql);

        while ($data = mysql_fetch_object($result)) {
            array_push($users, $data->user_id);
        }

        return $users;
    }

    // used to simplify the follow unfollow choice
    function check_count($first, $second)
    {
        $sql = "SELECT COUNT(*) FROM following WHERE user_id = '$second' AND follower_id = '$first'";

        $result = mysql_query($sql);

        $row = mysql_fetch_row($result);

        return $row[0];
    }

    function follow_user($me, $them)
    {
        $count = check_count($me, $them);

        if ($count == 0) {
            $sql = "INSERT INTO following (user_id, follower_id)
                    VALUES ($them, $me)";

            $result = mysql_query($sql);
        }
    }

    function unfollow_user($me, $them)
    {
        $count = check_count($me, $them);

        if ($count != 0) {
            $sql = "DELETE FROM following WHERE user_id = '$them' AND follower_id = '$me' LIMIT 1";

            $result = mysql_query($sql);
        }
    }
?>
