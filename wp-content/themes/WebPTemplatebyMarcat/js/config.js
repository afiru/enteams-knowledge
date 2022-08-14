$(function () {
    $('#toc_container').insertAfter('#tocContainerSet');
    //PCヘッダー設定
    $('.jsbtmHeaderPcGnavTopics').on('click', function () {
        $('.jstopicsHeaderPc').fadeIn(500);
        $('.jsuserMenuHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeIn(500);
    });
    $('.jsbtmHeaderPcGnavUsers').on('click', function () {
        $('.jsuserMenuHeaderPc').fadeIn(500);
        $('.jstopicsHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeIn(500);
    });

    $('.jsfixedBackBtm').on('click', function () {
        $('.jstopicsHeaderPc').fadeOut(500);
        $('.jsuserMenuHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeOut(500);
        $('.jstopicsHeaderSp').fadeOut(500);
        $('.jsuserMenuHeaderSp').fadeOut(500);
    });

    $('.jsbtmHeaderPcGnavSearch').on('click', function () {
        $('.jsheaderSearch').fadeIn(500);
    });

    $('.jsbtmClosedSearch').on('click', function () {
        $('.jsheaderSearch').fadeIn(500);
    });
    $('.jsbtmClosedSearch').on('click', function () {
        $('.jsheaderSearch').fadeOut(500);
    });
    
    //記事追従部分
    if (window.innerWidth > 750) {
        let headerHeight = $('.header').outerHeight(true);
        $('.jsrightBarFx').css('top',headerHeight);
    }


    //Spだけ
    if (window.innerWidth < 750) {
        $('.jsh1sidebarKnowledge').on('click', function () {
            $(this).next('.jsnavSidebarKnowledge').slideToggle();
        });
        $('.jsbtmHeaderSpGnavTopics').on('click', function () {
            $('.jstopicsHeaderSp').fadeIn(500);
            $('.jsfixedBackBtm').fadeIn(500);
        });
        $('.jsbtmHeaderSpGnavUsers').on('click', function () {
            $('.jstopicsHeaderSp').fadeOut(500);
            $('.jsuserMenuHeaderSp').fadeIn(500);
            $('.jsfixedBackBtm').fadeIn(500);
        });
        $('.jsbtmHeaderSpGnavSearch').on('click', function () {
            $('.jsheaderSearch').fadeIn(500);
        });
        
        let windowHeight = $(window).height();
        let headerHeight = $('.header').outerHeight(true);
        let fixedNavHeight = $('.headerSpFixed').outerHeight(true);
        nowHeight = windowHeight-headerHeight-fixedNavHeight;
        $('.jsheaderSearch').css('height',nowHeight);
    }
});

//ページ内リンクのスムーズスクロール
$(function(){
    var headerHeight = 0;
    if (window.innerWidth < 750) {
        var headerHeight = $('.headerSpWap').outerHeight();
    }
    else {
        var headerHeight = $('.headerPcWap').outerHeight();
    }    
    var urlHash = location.hash;
    if(urlHash) {
        $('body,html').stop().scrollTop(0);
        setTimeout(function(){
            var target = $(urlHash);
            var position = target.offset().top - headerHeight;
            $('body,html').stop().animate({scrollTop:position}, 500);
        }, 100);
    }
    $('a[href^="#"]').click(function() {
        var href= $(this).attr("href");
        var target = $(href);
        var position = target.offset().top - headerHeight;
        $('body,html').stop().animate({scrollTop:position}, 500);   
    });
});

//お気に入りを設定
$(function(){
    let bookingids = [];
    bookingids = $.cookie("bookingids");
    $('.jsiconCountBookingsLoop').on('click', function () {
        //console.log($(this).data('postid'));
        bookingids.push($(this).data('postid'));
        console.log(bookingids);
    });    
});