<div>
    <ul>
        <?php
            foreach ($posts as $post) :
        ?>
            <!--  Loop start -->
        <li>
            <h1><?php $post->post_title ?></h1>
            <p><?php $post->post_content ?></p>
        </li>

        <!--  Loop End -->
    <?php endforeach; ?>
    </ul>
</div>
