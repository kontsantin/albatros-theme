jQuery(document).ready(function($){
    $('.faq-five-block .item__header').on('click', function(e) {
        let parent = $(e.currentTarget).closest('.items__faq');
        let currentActive = $(e.currentTarget).closest('.items__body').find('.items__faq.active');

        if(!parent.hasClass('active'))
        {            
            currentActive.removeClass('active');
            currentActive.find('.item__content').slideUp();

            parent.addClass('active');
            parent.find('.item__content').slideDown();
        }
    });
});
