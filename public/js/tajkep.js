$(function () {

    const token = $('meta[name="csrf-token"]').attr("content");
    const apivegpont = "http://localhost:8000";
    let isLoading = true;
    new Ajax(token).getAjax(apivegpont+"/osztaly/tanar",(adat)=>{
        console.log(adat)
    })

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

    let megnyit = () => {
        $("body").children().css("display", "block");
        $(".nav").css("display", "none");
        $("body").css("backgroundColor", "gray");
        $(".loading").hide();
    };

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

    let toltes = () => {
        $("body").css("backgroundColor", "white");
        $(".loading").css("display", "");
    };
    if (isLoading) {
        toltes();
        setTimeout(() => {
            megnyit();
        }, 5500);
    }
});
