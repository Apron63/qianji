$(document).ready(function(){
    var val = $("#promo-active").val();
    setDisplay(val);
});

$("#promo-active").on("change", function(){
    var val = $("#promo-active").val();
    setDisplay(val);
});

function setDisplay (e) {
    if (e == 1 ) {
        $("input.form-control").removeAttr("disabled");
        $("#promo-city_id").removeAttr("disabled");
    } else {
        $("input.form-control").attr("disabled", "disabled");
        $("#promo-city_id").attr("disabled", "disabled");
    }
};

