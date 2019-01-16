$( document ).ready(function() {

    $(".passwordToggle").click(function(){
        $(this).toggleText("zonder wachtwoord <i class=\"fas fa-angle-up\"></i>", 'met wachtwoord <i class="fas fa-angle-down"></i>');
        var index =$(".passwordToggle").index($(this));
        console.log(index);
        $(".password").toggle(function() {
            $('.showpanel').slideToggle('fast')
        });
    });
});



jQuery.fn.extend({
    toggleText: function (a, b){
        var that = this;
        if (that.html() != a && that.html() != b){
            that.html(a);
        }
        else
        if (that.html() == a){
            that.html(b);
        }
        else
        if (that.html() == b){
            that.html(a);
        }
        return this;
    }
});