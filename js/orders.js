/**
 * Created by Vitechechek on 06.03.2017.
 */

$(document).on('ready', function () {

    $('.editbtn').on('click', function () {
        $(this).parent().parent().parent().find('.delbtn').attr('disabled', false);
        $(this).parent().parent().find('.uf').attr('disabled', false);
    })

});