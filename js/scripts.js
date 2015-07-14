// NAV

var navToggle  = document.querySelector('#nav-toggle');
var navItems   = document.querySelectorAll('nav a');
var navOverlay = document.querySelector('#nav-overlay');

for(var i = 0, l = navItems.length; i < l; i++) {
    navItems[i].addEventListener('click', closeNav);
}

navOverlay.addEventListener('click', closeNav);

function closeNav() {
    navToggle.checked = false;
}

// https://css-tricks.com/snippets/jquery/smooth-scrolling/
$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if(target.length) {
                $('html,body').stop().animate({
                    scrollTop: target.offset().top - 40
                }, 600);
                return false;
            }
        }
    });
});


// GALLERY

$('.gallery-image').fancybox();

var pages       = document.querySelectorAll('.gallery-page');
var noOfPages   = pages.length;
var prevPage    = document.querySelector('#prev-page');
var nextPage    = document.querySelector('#next-page');
var currentPage = 0;

if(noOfPages == 1) {
    prevPage.className += ' arrow--hide';
    nextPage.className += ' arrow--hide';
}

prevPage.addEventListener('click', function() {
    currentPage--;

    if(currentPage < 0) {
        currentPage = noOfPages - 1;
    }

    showImage();
});

nextPage.addEventListener('click', function() {
    currentPage++;

    if(currentPage >= noOfPages) {
        currentPage = 0;
    }

    showImage();
});

function showImage() {
    for(var i = 0; i < noOfPages; i++) {
        pages[i].className = 'gallery-page';
    }

    pages[currentPage].className += ' gallery-page--show';
}

showImage();


// FILMS

$('.film').fancybox({
    width: '90%',
    height: '90%'
});


// REFERENCES

var references       = document.querySelectorAll('.reference');
var noOfReferences   = references.length;
var prevReference    = document.querySelector('#prev-reference');
var nextReference    = document.querySelector('#next-reference');
var currentReference = 0;

if(noOfReferences == 1) {
    prevReference.className += ' arrow--hide';
    nextReference.className += ' arrow--hide';
}

prevReference.addEventListener('click', function() {
    currentReference--;

    if(currentReference < 0) {
        currentReference = noOfReferences - 1;
    }

    showReference();
});

nextReference.addEventListener('click', function() {
    currentReference++;

    if(currentReference >= noOfReferences) {
        currentReference = 0;
    }

    showReference();
});

function showReference() {
    for(var i = 0; i < noOfReferences; i++) {
        references[i].className = 'reference';
    }

    references[currentReference].className += ' reference--show';
}

showReference();