<?php
require "dbconnection.php";
$dbcon = createDbConnection();

$artist_id = 1;
$album_id = array(1, 4);
$track_id = array(1, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22);

try {

    $dbcon->beginTransaction();

    $statement = $dbcon->prepare("DELETE FROM invoice_items WHERE TrackId=?");
    foreach($track_id as $id) {
        $statement->execute(array($id));
    }

    $statement = $dbcon->prepare("DELETE FROM playlist_track WHERE TrackId=?");
    foreach($track_id as $id) {
        $statement->execute(array($id));
    }

    $statement = $dbcon->prepare("DELETE FROM tracks WHERE AlbumId=?");
    foreach($album_id as $id2) {
        $statement->execute(array($id2));
    }
    
    $statement = $dbcon->prepare("DELETE FROM albums WHERE ArtistId=?");
    $statement->execute(array($artist_id));

    $statement = $dbcon->prepare("DELETE FROM artists WHERE ArtistId=?");
    $statement->execute(array($artist_id));

    $dbcon->commit();

} catch(Exception $e) {

    $dbcon->rollBack();
    echo $e->getMessage();

}