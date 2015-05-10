<?php

$nextPageToken = (isset($_GET['nextPageToken']) ? $_GET['nextPageToken'] : '');
$nextPageToken = ($nextPageToken == 'null' ? '' : "&pageToken=$nextPageToken");

$feed          = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&fields=nextPageToken,items/snippet(title,description,resourceId/videoId)&maxResults=4' . $nextPageToken . '&playlistId=PLMXyjfVfVjP_B4QqAVtrZpnuLwT2b1ECf&key=AIzaSyBELBZGR3o2VjqSOSzKYfBLkCliPgWns3U'));
$nextPageToken = (isset($feed->nextPageToken) ? $feed->nextPageToken : '');

echo "$nextPageToken~~~";

foreach($feed->items as $film):
    $title = $film->snippet->title;
    $desc  = $film->snippet->description;
    $id    = $film->snippet->resourceId->videoId;

?>

<a href="https://www.youtube.com/embed/<?= $id; ?>?autoplay=1" target="_blank" class="film" data-fancybox-type="iframe">
    <div class="film-thumb left" style="background-image: url(https://i.ytimg.com/vi/<?= $id; ?>/hqdefault.jpg);"></div>
    <div class="film-text right">
        <h2><?= $title; ?></h2>
        <p><?= $desc; ?></p>
    </div>
</a>

<?php
    endforeach;
?>