export default function MonaCreateModuleDefault() {
    $(document).on('click', '.list-tab.cat-tab a.link', function (e) {
        e.preventDefault();
        $('input[name="category"]').val($(this).attr('value'));
        let tagValue = $('.course-list__select a.option.active').attr('value');
        $('input[name="level"]').val(tagValue);
        $('#filter-form').submit();
    });

    $(document).on('click', '.course-list__select a.option', function (e) {
        e.preventDefault();
        $('input[name="level"]').val($(this).attr('value'));
        let catValue = $('.list-tab.cat-tab a.link.active').attr('value');
        $('input[name="category"]').val(catValue);
        $('#filter-form').submit();
    });
    let eventID = $('.title.h4.f-bold .btn-hide.event-id').attr('value');
    // $('.popup.popup-register.book.is-show input[name="event-id"]').attr('value', eventID);
    $('.popup-booking.mona-event-popup input[name="event-id"]').attr('value', eventID);
    //GET DATA EVENT TO FORM
    $(document).on('click', '.calendar button.btn-regis.btn-main.btn-popup', function () {
        let eventID = $('.title.h4.f-bold .btn-hide.event-id').attr('value');
        $('.popup-booking.mona-event-popup input[name="event-id"]').attr('value', eventID);
    });

    //GET DATA COURSE TO FROM
    let courseID = $('.course-id').attr('value');
    $('.booking-form .form-field.mona-course input[name="event-id"]').attr('value', courseID);


    $(document).on('click', '.mona-register-course', function () {

        let courseID = $('.course-id').attr('value');
        $('.form-field.mona-course input[name="course-id"]').attr('value', courseID);

        // let courseName = $('.mona-course-title').text();
        // $('.popup.popup-register.book.is-show input[name="your-course"]').val(courseName);
    });


    document.addEventListener('wpcf7mailsent', function (event) {
        $('.mona-event-popup .popup-content .popup-close').trigger('click');
        $('.btn-regis.btn-main').addClass('btn-success btn-sec');
        $('.btn-regis.btn-main').html('<span class="icon-success">\n' +
            '                                                <iconify-icon icon="clarity:check-line" width="24"></iconify-icon>\n' +
            '                                            </span>Đăng ký thành công');
    }, false);

    document.addEventListener('wpcf7mailsent', function (event) {
        let redirect = $('.course-redirect').val();
        if (redirect) {
            alert("Đăng ký khóa học thành công, hệ thống sẽ chuyển hướng trang web. Nhấn OK để tiếp tục");
            setTimeout(() => {
                window.location.replace(redirect);
            },);
        } else {
            $('.mona-course-popup .popup-content .popup-close').trigger('click');
        }
    });

}