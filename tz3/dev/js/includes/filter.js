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