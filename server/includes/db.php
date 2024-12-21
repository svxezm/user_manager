<?php
function connectDb() {
    $dbPath = __DIR__ . '/../../db/database.db';
    return new SQLite3($dbPath);
}
?>
