<?php
    function createTable($name, $query)
    {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
    }
?>

<!-- Usage -->
<?php
    createTable(
        'members',
        'user VARCHAR(16),
        pass VARCHAR(16),
        INDEX(user(6))'
    );
?>
