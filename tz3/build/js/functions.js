$(document).ready(function () {
	svg4everybody({});
});
    $(document).ready(function(){
        $("#filter .buttons").on("click", function (event) {
            event.preventDefault();
            $('#filter .buttons').removeClass('activeBtn');
            $(this).addClass('activeBtn');
            var claSs  = $(this).attr('data-show');
            $('#filter .imgBl .imgCont').removeClass('visible');
            $('#filter .imgBl [class~="'+claSs+'"]').addClass('visible');
        });     
    });
     $(document).ready(function(){
        $("#header .buttons").on("click", function (event) {
            event.preventDefault();
            var id  = $(this).attr('data-go'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1000);
        });
    });