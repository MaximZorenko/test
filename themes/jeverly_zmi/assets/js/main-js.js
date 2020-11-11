/////////////////////like
let like_counter = $('.like_counter');
let like_btn = $('.like_btn');

like_btn.each(function(i,elem){
    $(elem).on('click', function(event){
        event.preventDefault();
        let url = $(elem).data('href');
        let id = $(elem).data('id');
        $.ajax({
            url: url,
            data: {
                action: 'like_zmi',
                id: id,
            },
            type: 'GET',
            success: function(res){
                $(like_counter[i]).text(res);
            },
            error: function(){
                alert('Ошибка попробуйте позже!');
            },
        });
    });
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
(()=>{
    let wrap_search = document.querySelector('.navbar .wrap_search');
    let wrap_search_img = document.querySelectorAll('.navbar .wrap_search img');
    let ajaxsearchlite = document.querySelector('div[id*="ajaxsearchlite"].wpdreams_asl_container');
    wrap_search.addEventListener('click', (e)=>{
        wrap_search_img[0].classList.toggle('clos');
        wrap_search_img[1].classList.toggle('clos');
        ajaxsearchlite.classList.toggle('clos');
    });
})();
