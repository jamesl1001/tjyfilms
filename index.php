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
            <a href="#tjyfilms">TJY FILMS</a>
            <a href="#about">ABOUT</a>
            <a href="#gallery">GALLERY</a>
            <a href="#films">FILMS</a>
            <a href="#references">REFERENCES</a>
            <a href="#contact">CONTACT</a>
        </div>
    </nav>
    <label for="nav-toggle" id="nav-icon" class="force-repaint"></label>
    <div id="nav-overlay" class="force-repaint"></div>

    <header id="tjyfilms" class="section--image" itemscope itemtype="http://data-vocabulary.org/Person">
        <div class="centre">
            <img src="/img/logo.png" alt="TJY Films" id="logo"/>
            <h1 itemprop="affiliation">TJY Films</h1>
            <h2><span itemprop="name">Themos James Yiacoupis</span><br><span itemprop="jobTitle">Video Producer, Editor and Camera Operator</span></h2>
        </div>
    </header>

    <section id="about" class="section--grey">
        <div class="centre">
            <h1>ABOUT</h1>
            <p class="left">Since a young age I have always had a huge passion for all areas of film and television. I graduated with a degree in drama and multimedia, and a Masters in Arts Criticism at the University of Kent to widen my knowledge and expertise in this field. I have worked with people on various arts projects from different positions, educating myself on all the necessary aspects.</p>
            <p class="right">I have experience with filming and editing promotional videos, documentaries, arts performances, showreels, trailers, large corporate events, etc. If you are interested in having a video created for business, personal, or any use at all, please don't hesitate to contact me to discuss things in further detail.</p>
        </div>
    </section>

    <section id="gallery" class="section--image">
        <div class="centre">
            <h1 class="h1--hide">GALLERY</h1>

            <div class="gallery">
                <div class="gallery-page">
                    <?php
                        $directory = 'content/gallery';
                        $images    = array_diff(scandir($directory), array('..', '.'));
                        $i         = 1;

                        foreach($images as $image):
                    ?>

                    <a href="/content/gallery/<?= $image; ?>" class="gallery-image" data-fancybox-group="gallery" style="background-image: url(/content/gallery/<?= $image; ?>);"></a>

                    <?php
                            $i++;
                            if($i % 4 == 1 && !($i + 1 == count($images))):
                    ?>
                </div>
                <div class="gallery-page">
                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>
            </div>

            <div id="prev-page" class="prev-arrow"></div>
            <div id="next-page" class="next-arrow"></div>
        </div>
    </section>

    <section id="films" class="section--grey">
        <div class="centre">
            <h1>FILMS</h1>

            <div class="films">
                <?php
                $feed          = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&fields=nextPageToken,items/snippet(title,description,resourceId/videoId)&maxResults=4&playlistId=PLMXyjfVfVjP_B4QqAVtrZpnuLwT2b1ECf&key=AIzaSyBELBZGR3o2VjqSOSzKYfBLkCliPgWns3U'));
                $nextPageToken = (isset($feed->nextPageToken) ? $feed->nextPageToken : '');

                foreach($feed->items as $film):
                    $title = $film->snippet->title;
                    $desc  = $film->snippet->description;
                    $id    = $film->snippet->resourceId->videoId;
                ?>

                <a href="https://www.youtube.com/watch?v=<?= $id; ?>" target="_blank" class="film">
                    <div class="film-thumb left" style="background-image: url(https://i.ytimg.com/vi/<?= $id; ?>/hqdefault.jpg);"></div>
                    <div class="film-text right">
                        <h2><?= $title; ?></h2>
                        <p><?= $desc; ?></p>
                    </div>
                </a>

                <?php
                    endforeach;
                ?>
            </div>

            <div id="show-more-films" data-nextpagetoken="<?= $nextPageToken; ?>">SHOW MORE FILMS</div>
        </div>
    </section>

    <section id="references" class="section--image">
        <div class="centre">
            <h1 class="h1--hide">REFERENCES</h1>
            <h1 class="h1--references">“</h1>

            <div class="references">
                <?php
                    $directory = 'content/references';
                    $files     = array_diff(scandir($directory), array('..', '.'));

                    foreach($files as $file):
                        $contents = file_get_contents('content/references/' . $file);
                        $text     = nl2br($contents);
                ?>

                <p class="reference"><?= $text; ?></p>

                <?php
                    endforeach;
                ?>
            </div>

            <div id="prev-reference" class="prev-arrow"></div>
            <div id="next-reference" class="next-arrow"></div>
        </div>
    </section>

    <section id="contact" class="section--grey section--contact">
        <div class="centre">
            <h1>CONTACT</h1>
            <div class="contact-bubble">
                <a href="mailto:tj@tjyfilms.co.uk" target="_blank">
                    <i class="icon icon-email"></i>
                    <span>tj@tjyfilms.co.uk</span>
                </a>
            </div>
            <div class="contact-bubble">
                <a href="tel:07990736901" target="_blank">
                    <i class="icon icon-phone"></i>
                    <span>079 907 369 01</span>
                </a>
            </div>
            <div class="contact-bubble">
                <a href="https://www.facebook.com/tjyfilms" target="_blank">
                    <i class="icon icon-facebook"></i>
                    <span>Facebook</span>
                </a>
            </div>
            <div class="contact-bubble">
                <a href="https://www.twitter.com/tjyfilms" target="_blank">
                    <i class="icon icon-twitter"></i>
                    <span>Twitter</span>
                </a>
            </div>
            <div class="contact-bubble">
                <a href="https://www.youtube.com/channel/UCCU48LDPV6iu98KPj3l6wCg" target="_blank">
                    <i class="icon icon-youtube"></i>
                    <span>Youtube</span>
                </a>
            </div>
        </div>
    </section>

    <footer>Site by <a href="http://jalproductions.co.uk" target="_blank">JaL Productions</a></footer>

    <?php if($_SERVER['SERVER_NAME'] == 'tjy.dev'): ?>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/fancybox.js"></script>
        <script src="/js/scripts.js"></script>
    <?php else: ?>
        <script src="/build/jquery.min.js"></script>
        <script src="/build/fancybox.min.js"></script>
        <script src="/build/scripts.min.js"></script>
    <?php endif; ?>

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