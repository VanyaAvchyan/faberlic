$('.faq_title').on('click', function() {
    var faq_id = $(this).data('id');
    $('.faq_description_'+faq_id).toggle();
    var link = $('.faq_title[data-id='+faq_id+']');
    if($('.faq_description_'+faq_id).is(":visible"))
    {
        link.find('span').removeClass('glyphicon-plus');
        link.find('span').addClass('glyphicon-minus');
    } else {
        link.find('span').removeClass('glyphicon-minus');
        link.find('span').addClass('glyphicon-plus');
    }
});

$('#myModal').on('shown.bs.modal', function (e) {
    var $invoker = $(e.relatedTarget);
    var iframe = '<iframe width="420" height="345" src="https://www.youtube.com/embed/'+$invoker.data('youtube_id')+'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $(this).find('.modal-body').html(iframe);
    $(this).find('.modal-header .video_title').text($invoker.data('title'));
});

$("#myModal").on('hidden.bs.modal', function (e) {
    $(this).find('.modal-body').html('');
});

