jQuery(document).ready(function ($) {




    // Все классы body
    var classes = $('body').attr('class');

// И выдергиваем ID страницы из SDStudio-ID
    var PageID = classes.split('SDStudio-ID-');
    var PageID = PageID[1].split(' ');
    var PageID = PageID[0];
    // ID
    //  console.log(PageID);




    $('body').on("click", "[href='#sdstudio-title-this-post']", function (event) {
        console.log('Клик был');
// Отменяем повидение при клике по линку по умолчанию
        event.preventDefault();

        var NamePost = $('title').text();
        console.log(NamePost);

        var IDPost = PageID;
        //console.log(IDPost);

        var data = {
            action: 'ChangeTitlePost',
            IDPost: IDPost,
        };
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

        aJaxRemovTranInvestPostWPRECALL.fire({
            title: 'SEO Title',
            icon: 'info',
            type: 'info',
            html: "<textarea id=\"SDStudio-content-assistant-TITILE\" style=\"min-width:100%\">" + NamePost + "</textarea>",
            showCancelButton: true,
            confirmButtonText: 'Изменить!',
            cancelButtonText: 'Стоп, отмена!',
//               reverseButtons: true
            showCloseButton: true
        }).then((result) => {
            if (result.value) {
                var TitilePost = jQuery('textarea#SDStudio-content-assistant-TITILE').val();
                console.log('📌📌📌 Отправляем - '+TitilePost );
                /////////////////////////////
                /// sweetalert2 IF START
                $.ajax({
                    type: "POST", // use $_POST method to submit data
                    url: '/wp-admin/admin-ajax.php?action=ChangeTitlePost', // where to submit the data
                    data: {
                        IDPost: IDPost, // PHP: $_POST['last_name']
                        TitilePost: TitilePost,
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
                        // Обновляем title
                        $('title').text(TitilePost);
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