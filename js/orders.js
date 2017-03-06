/**
 * Created by Vitechechek on 06.03.2017.
 */

$(document).on('ready', function () {

    $('.editbtn').on('click', function () {
        $(this).parent().parent().find('.uf').attr('disabled', false);
    })

});