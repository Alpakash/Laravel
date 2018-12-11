
$(document).ready(function(){
    var highestBox =0;
    $('.account-card', this).each(function(){


        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
            highestBox = $(this).height();
        }

    });

    // Set the height of all those children to whichever was highest
    $('.account-card',this).height(highestBox);

    $(document).on('click', '.toggle-nav',function(e){
        var idsArr = ['#sidebar', '#sidebar-user', '.list-group a', '.toggle-text'];
        if ($('#toggle-input').is(':checked')){
            // toggle on
            $(idsArr).each(function(k, v){
                if(idsArr[k].indexOf('.' > -1)){
                    $(idsArr[k]).each(function(k,v){
                        $(this).addClass('toggle-dark')
                    });
                }else{
                    $(idsArr[k]).addClass('toggle-dark')
                }
            });
        }else{
            // toggle off
            $(idsArr).each(function(k, v){
                if(idsArr[k].indexOf('.' > -1)){
                    $(idsArr[k]).each(function(k,v){
                        $(this).removeClass('toggle-dark')
                    });
                }else{
                    $(idsArr[k]).removeClass('toggle-dark')
                }
            });
        }

    });

    $(document).on('click', '#toggle-modus', function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var toggleValue;
        if ($('#toggle-input').is(':checked')) toggleValue = 1;
        else toggleValue = 0;
        var data = {
            _token: CSRF_TOKEN,
            value: toggleValue
        };

        $.ajax({

        });
    } );

    // Basic example

    // Setup - add a text input to each footer cell
    $('#userTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#userTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
            },
            "pageLength": 7,
            "lengthMenu": [ 5,6,7, 10, 25, 50, 75, 100 ]
        });

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( '#userTable input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    if($(".message-wrap").length){
        $(".message-wrap").css({"right": '0', "transition": "all .7s"})
        setTimeout(function(){
            $(".message-wrap").fadeOut('slow');
        }, 5000);

    }


});

