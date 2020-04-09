//function that has to do with the display of images
$(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
    
    $('#mapid').on('shown.bs.collapse', function (e) {
        map.invalidateSize(true);
    })
    

    let selectedTab = window.location.hash;

    $('.nav-link[href="' + selectedTab + '"]' ).trigger('click');
   // $('.nav-item[href="' + selectedTab + '"]' ).trigger('click');
    //$('.nav.active').trigger('click');
    //location.reload();
    //$('.nav-link[href="' + selectedTab + '"]' ).parent().addClass('active');
});

