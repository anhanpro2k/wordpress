export default function MonaCreateModuleMentor() {
    $(document).on('click', '.btn-loadmore.btn-event-ajax', function (e) {
        let defaultNumberPage = $(this).attr('data-default-number');
        let paged = $(this).attr('data-current-page');
        let loading = $('.btn-main.btn-loadmore.btn-event-ajax');
        LoadBoss(defaultNumberPage, paged, loading);
    });

    function LoadBoss(defaultNumberPage, paged, loading) {
        if (!loading.hasClass('loading')) {
            $.ajax({
                url: mona_ajax_url.ajaxURL,
                type: 'post',
                data: {
                    action: 'mona_ajax_loadmentor',
                    defaultNumberPage: defaultNumberPage,
                    paged: paged,
                },
                error: function (request) {
                    loading.removeClass('loading');
                },
                beforeSend: function (response) {
                    loading.addClass('loading');
                },
                complete: function () {
                    loading.removeClass('loading');
                },
                success: function (result) {
                    if (result.success) {
                        loading.remove();
                        if (result.data.mentor) {
                            $('.mentor-page .sc-mentor .row.gy-1').append(result.data.mentor);
                        }
                        loading.removeClass('loading');
                    }
                }
            });
        }
    }
}
