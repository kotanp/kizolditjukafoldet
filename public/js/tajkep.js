$(function () {

    const token = $('meta[name="csrf-token"]').attr("content");
    let ajax = new Ajax(token);
    
    ajax.getAjax("/islogged",(adat)=>{
        if (JSON.parse(adat)) {
            ajax.getAjax("/osztaly/tanar",(adat)=>{
                $(".logged-osztaly-nev").text("Üdvözöllek "+adat);
                $(".login-button").hide();
            });
        }
        else{
            $(".logged-osztaly-nev").hide();
            $(".login-button").show();
        }
    });

    $(document).click(function (event) {
        $(".nav").slideUp(500, () => {
            $(".navopen").show();
        });
    });
    
    $("main").click(function (event) {
        event.stopPropagation();
    });
    $(".navopen").click(function (event) {
        event.stopPropagation();
    });

    $(".navopen").on("click", (event) => {
        $(".nav").slideDown(500);
        $(".navopen").hide();
    });

    $(".navclose").on("click", (event) => {
        $(".nav").slideUp(500, () => {
            $(".navopen").show();
        });
    });

    $("body").children().hide();

    let megnyit = () => {
        $("body").children().css("display", "block");
        $(".nav").css("display", "none");
        $("body").css("backgroundColor", "gray");
        $(".loading").hide();
    };

    let toltes = () => {
        $("body").css("backgroundColor", "white");
        $(".loading").css("display", "");
    };

    toltes();
   
    $(window).on("load",()=>{
        megnyit();
    })
  
});
