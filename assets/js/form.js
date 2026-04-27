$(document).ready(function () {
    $(".form-send").submit(function (e) {
        var prt = $(this);
    	th = $(this);
        e.preventDefault();
        var form_text = $(prt).find("[data-required='true'], [type='checkbox']");
        var count = 0;

        $(form_text).each(function() {
            if ($(this).val() == '') {
                $(this).addClass('error')
            }else{
                count++;
                $(this).removeClass('error');
            }
        });
        if (count == $(form_text).length) {
            $.ajax({
                type: "POST",
                url: "http://bastsite.ru/Christmas-trees/mail.php",
                data: th.serialize()
            }).done(function (data) {
                $(".alert_block").fadeIn("slow");
            })
     
        } 
    });
});
