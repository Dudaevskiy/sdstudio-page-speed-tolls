//https://flatpickr.js.org/examples/


jQuery(document).ready(function ($) {

    // Все классы body
    var classes = $('body').attr('class');

// И выдергиваем ID страницы из SDStudio-ID
    var PageID = classes.split('SDStudio-ID-');
    var PageID = PageID[1].split(' ');
    var PageID = PageID[0];
    // ID
    //  console.log(PageID);



    $('body').on("click", "[href='#sdstudio-date-this-post']", function (event) {
        console.log('Клик был');
// Отменяем повидение при клике по линку по умолчанию
        event.preventDefault();

        var PageDataPublish = $('body').attr('data-sdstudio-data-publish');
        var PageDataPublishFromMarkdownFile = $('body').attr('data-sdstudio-data-publish-from-markdown-file');
        // Data Publish This Post
        console.log(PageDataPublish);

        // Вставляем дату публикации из markdown файла в инпут даты
        // if ($('pre.PageDataPublishFromMarkdownFile').langht){
            $('body').on('click','pre.PageDataPublishFromMarkdownFile',function(){
                var GetData = $('body').attr('data-sdstudio-data-publish-from-markdown-file');
                console.log(GetData);
                $('input.PageDataPublish').val(GetData);
            });


        var IDPost = PageID;
        //console.log(IDPost);

        var data = {
            action: 'ChangeDataPublichPost',
            IDPost: IDPost,
            PageDataPublish: PageDataPublish,
        };

//         var check_in = flatpickr("#swal-input-flatpickr");
//         check_in.config.onChange = function(dateObj, dateStr){
//             console.info(dateobj, datestr);
// //                     PageDataPublish;
//             // use check_in.input or check_in.element
//         }
        console.log(data);
        //////////////////////////////
        /// sweetalert2 START
        let timerInterval
        /////////////////////////////
        /// sweetalert2 IF ELSE START
        var aJaxRemovTranInvestPostWPRECALL = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            showCloseButton: true,
            scrollbarPadding: false,
            className: "SDStudio_POPUP"
        })

        flatpickr.localize(flatpickr.l10ns.ru);
        var HTML_for_popup = '';
        if ($('body').is('[data-sdstudio-data-publish-from-markdown-file]')){
//data-sdstudio-data-publish-from-markdown-file="🔴 00:00:00"
//data-sdstudio-data-publish-from-markdown-file=" 00:00:00"
            if ($('body').attr('data-sdstudio-data-publish-from-markdown-file').indexOf('🔴') < -1){
                HTML_for_popup = "<p style=\"margin-bottom: 0px;\"><b>Текущая дата публикации:</b></p><pre><code>"+PageDataPublish+"</code></pre><p style=\"margin-bottom: -15px;\"><b>Сменить дату:</b></p><input data-toggle=\"datepicker\" type=\"text\" id=\"swal-input-flatpickr\" class=\"swal2-input PageDataPublish\" style=\"text-align: center;\">";
            } else {
                HTML_for_popup = "<p style=\"margin-bottom: 0px;\"><b>Текущая дата публикации:</b></p><pre><code>"+PageDataPublish+"</code></pre><p style=\"margin-bottom: 0px;\"><b>Дата публикации Markdown файла:</b></p><pre class=\"PageDataPublishFromMarkdownFile\" style=\"cursor: pointer;\"><code>"+PageDataPublishFromMarkdownFile+"<br>кликните для применения</code></pre><p style=\"margin-bottom: -15px;\"><b>Сменить дату:</b></p><input data-toggle=\"datepicker\" type=\"text\" id=\"swal-input-flatpickr\" class=\"swal2-input PageDataPublish\" style=\"text-align: center;\">";
            }


        } else {
            // console.log('Да есть');

            HTML_for_popup = "<p style=\"margin-bottom: 0px;\"><b>Текущая дата публикации:</b></p><pre><code>"+PageDataPublish+"</code></pre><p style=\"margin-bottom: -15px;\"><b>Сменить дату:</b></p><input data-toggle=\"datepicker\" type=\"text\" id=\"swal-input-flatpickr\" class=\"swal2-input PageDataPublish\" style=\"text-align: center;\">";

        }
        aJaxRemovTranInvestPostWPRECALL.fire({
            title: 'Дата публикации',
            icon: 'info',
            type: 'info',
            html: HTML_for_popup,
            showCancelButton: true,
            confirmButtonText: 'Изменить!',
            cancelButtonText: 'Стоп, отмена!',
//               reverseButtons: true
            showCloseButton: true,
            onOpen: function() {
                $('[data-toggle="datepicker"]').flatpickr({
                    //altInput: true,
                    //                             "locale": Russian, // locale for this instance only
                    Date: "today",
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    zIndex: 999999,
                    onChange: function(rawdate, altdate, FPOBJ) {
                        FPOBJ.close(); // Close datepicker on date select
                        FPOBJ._input.blur(); // Blur input field on date select
                    }
                });
            },
        }).then((result) => {
            if (result.value) {
//console.log(value);
//                 var calendars = flatpickr(".flatpickr"); // multiple instances
//                 calendars.byID("swal-input-flatpickr").config.onChange = function(dateobj, datestr){
//                     console.info(dateobj, datestr);
//                 }
//                 var check_in = flatpickr("#swal-input-flatpickr");
//                 check_in.config.onChange = function(dateObj, dateStr){
//                     console.info(dateobj, datestr);
// //                     PageDataPublish;
//                     // use check_in.input or check_in.element
//                 }

                var PageDataPublish = jQuery('body').find('[data-toggle="datepicker"]').val();
                PageDataPublish = PageDataPublish+':00';
                console.log('📌📌📌 Отправляем - '+PageDataPublish );
                /////////////////////////////
                /// sweetalert2 IF START
                $.ajax({
                    type: "POST", // use $_POST method to submit data
                    url: '/wp-admin/admin-ajax.php?action=ChangeDataPublichPost', // where to submit the data
                    data: {
                        IDPost: IDPost, // PHP: $_POST['last_name']
                        PageDataPublish: PageDataPublish,
                    },
                    success: function (data) {
                        // Удаляем блок
                        console.log(data);

                        //ParrentRemov.remove();
                        //////////////////////////////
                        /// sweetalert2 START
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            icon: 'success',
                            title: 'Готово!',
                            text: 'Запись успешно обновлена',
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            timer: 1600
                        });
                        /// sweetalert2 END
                        //////////////////////////////
                        // Обновляем Descriptions
                        $(function () { // dom ready
                            //var $meta = $('meta[name=description]').attr('content', DescriptionsPost);
//                             $('body').text($meta.attr('content'));
                        });
                        //$('[name="description"]').attr('content') = DescriptionsPost;
                    },

                    error: function (errorThrown) {
                        //////////////////////////////
                        /// sweetalert2 START
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            type: 'error',
                            title: 'Ошибка',
                            text: 'Что-то пошло не так.',
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            timer: 3000
                        });
                        /// sweetalert2 END
                        //////////////////////////////
                    }
                })
                /////////////////////////////
                /// sweetalert2 IF END

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                aJaxRemovTranInvestPostWPRECALL.fire(
                    'Отмена',
                    'Запись не изменина',
                    'error'
                )
            }
        });

    });
});