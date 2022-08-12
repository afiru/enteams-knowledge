$(function () {
    $('#toc_container').insertAfter('#tocContainerSet');
    //PCヘッダー設定
    $('.jsbtmHeaderPcGnavTopics').on('click',function(){
        $('.jstopicsHeaderPc').fadeIn(500);
        $('.jsuserMenuHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeIn(500);
    });
    $('.jsbtmHeaderPcGnavUsers').on('click',function(){
        $('.jsuserMenuHeaderPc').fadeIn(500);
        $('.jstopicsHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeIn(500);
    });
    
    $('.jsfixedBackBtm').on('click',function(){
        $('.jstopicsHeaderPc').fadeOut(500);
        $('.jsuserMenuHeaderPc').fadeOut(500);
        $('.jsfixedBackBtm').fadeOut(500);
    });
    
    $('.jsbtmHeaderPcGnavSearch').on('click',function(){
        $('.jsheaderSearch').fadeIn(500);
    });
    
    $('.jsbtmClosedSearch').on('click',function(){
        $('.jsheaderSearch').fadeIn(500);
    });
    $('.jsbtmClosedSearch').on('click',function(){
        $('.jsheaderSearch').fadeOut(500);
    });
    
});