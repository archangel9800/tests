     $(document).ready(function(){
        $("#header .buttons").on("click", function (event) {
            event.preventDefault();
            var id  = $(this).attr('data-go'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1000);
        });
    });