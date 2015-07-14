<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Themos James Yiacoupis. Video Producer, Editor and Camera Operator"/>
    <meta name="author" content="JaL Productions"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>TJY Films</title>
    <?php if($_SERVER['SERVER_NAME'] == 'tjy.dev'): ?>
        <link rel="stylesheet" type="text/css" href="/css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="/css/fancybox.css"/>
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="/build/styles.min.css"/>
        <link rel="stylesheet" type="text/css" href="/build/fancybox.min.css"/>
    <?php endif; ?>
    <link rel="shortcut icon" href="/img/favicon.ico"/>
    <link rel="apple-touch-icon-precomposed" href="/img/touchicon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/touchicon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/touchicon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/touchicon-144.png">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400">

    <!--[if lt IE 9]>
    <style>
    #ie {
        width: 100%;
        height: 24px;
        background: #C00;
        position: fixed;
        top: 40px;
        color: #FFF;
        font-size: 12px;
        text-align: center;
        text-decoration: underline;
        line-height: 20px;
        z-index: 4;
    }
    </style>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="/build/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--[if lt IE 9]>
    <a href="http://browsehappy.com/" target="_blank" id="ie">Please upgrade to a modern browser.</a>
    <![endif]-->
    <input type="checkbox" name="nav-toggle" id="nav-toggle">
    <nav id="nav" class="force-repaint" role="navigation">
        <div class="centre">
            <a href="/#films" class="nav-a--back">&lt; BACK</a>
        </div>
    </nav>
    <label for="nav-toggle" id="nav-icon" class="force-repaint"></label>
    <div id="nav-overlay" class="force-repaint"></div>

    <section id="films" class="section--grey section--last">
        <div class="centre">
            <h1>ALL FILMS</h1>

            <div class="films">
                <?php
                function getAllFilms($nextPageToken) {
                    $feed          = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&fields=nextPageToken,items/snippet(title,description,resourceId/videoId)&maxResults=50&pageToken=' . $nextPageToken . '&playlistId=PLMXyjfVfVjP_B4QqAVtrZpnuLwT2b1ECf&key=AIzaSyBELBZGR3o2VjqSOSzKYfBLkCliPgWns3U'));
                    $nextPageToken = (isset($feed->nextPageToken) ? $feed->nextPageToken : '');

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

                        if(!empty($nextPageToken)) {
                            getAllFilms($nextPageToken);
                        }
                    }

                    getAllFilms('');
                ?>
            </div>
        </div>
    </section>

    <footer>Site by <a href="http://jalproductions.co.uk" target="_blank">JaL Productions</a></footer>

    <?php if($_SERVER['SERVER_NAME'] == 'tjy.dev'): ?>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/fancybox.js"></script>
    <?php else: ?>
        <script src="/build/jquery.min.js"></script>
        <script src="/build/fancybox.min.js"></script>
    <?php endif; ?>

    <script>$('.film').fancybox({width: '90%',height: '90%'});</script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-28297381-4', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>