/**
 * Created by Vitechechek on 05.02.2017.
 */
$(document).on('ready', function () {

    var isChecked = false;
    var isMainChecked = false;

    $('.typeA').on('click', function () {

        if($('.typeA').is(':checked'))
        {
            $('.typeB').attr("disabled", true);
            $('.typeC').attr("disabled", true);
            $('.typeD').attr("disabled", true);

            $('.tA').css('color', 'red');
            isChecked = true;
        }
        else {
            $('.typeB').attr("disabled", false);
            $('.typeC').attr("disabled", false);
            $('.typeD').attr("disabled", false);

            $('.tA').css('color', 'black');
            isChecked = false;
        }
    });

    $('.typeB').on('click', function () {
        if($('.typeB').is(':checked'))
        {
            $('.typeA').attr("disabled", true);
            $('.typeC').attr("disabled", true);
            $('.typeD').attr("disabled", true);

            $('.tB').css('color', 'red');
            isChecked = true;
        }
        else {
            $('.typeA').attr("disabled", false);
            $('.typeC').attr("disabled", false);
            $('.typeD').attr("disabled", false);

            $('.tB').css('color', 'black');
            isChecked = false;
        }
    });

    $('.typeC').on('click', function () {
        if($('.typeC').is(':checked'))
        {
            $('.typeA').attr("disabled", true);
            $('.typeB').attr("disabled", true);
            $('.typeD').attr("disabled", true);

            $('.tC').css('color', 'red');
            isChecked = true;
        }
        else {
            $('.typeA').attr("disabled", false);
            $('.typeB').attr("disabled", false);
            $('.typeD').attr("disabled", false);

            $('.tC').css('color', 'black');
            isChecked = false;
        }
    });

    $('.typeD').on('click', function () {
        if($('.typeD').is(':checked'))
        {
            $('.typeA').attr("disabled", true);
            $('.typeB').attr("disabled", true);
            $('.typeC').attr("disabled", true);

            $('.tD').css('color', 'red');
            isChecked = true;
        }
        else {
            $('.typeA').attr("disabled", false);
            $('.typeB').attr("disabled", false);
            $('.typeC').attr("disabled", false);

            $('.tD').css('color', 'black');
            isChecked = false;
        }
    });

    $('.tc').on('click', function () {
        if(!$(this).is(':checked'))
        {
            $('.cb').attr('disabled', false);
        }
    });

    $('.cb').on('click', function () {
        if($(this).is(':checked'))
        {
            if(isChecked == true)
            {
                $(this).parent().css('background-color', 'green');
            }
            else {
                alert('Выберите группу автомобиля')
                $(this).attr('checked', false);
            }
        }
        else {

            $(this).parent().css('background-color', '#446ED5');
        }

        $(document).on('change', function () {
            if(isChecked == false)
            {
                $('.cb').attr('checked', false);
                $('.cb').parent().css('background-color', '#446ED5');
            }
        });
    });


    $('.main_service').on('click', function () {
        if($(this).is(':checked'))
        {
            isMainChecked = true;
        }
        else
        {
            isMainChecked = false;
        }

        if(isMainChecked == true)
        {
            $('.main_service').attr('disabled', true);
            $(this).attr('disabled', false);
        }
        else
        {
            $('.main_service').attr('disabled', false);
        }
    });

});