$(function () {
    const ELREJT = $(".hideAll");
    const SZURKIT = $(".grayAll");
    const EGYETSZINEZ = $(".colorOnce");
    const TAJKEP = $(".tajkep");

    let osszesKep = document.querySelector("body").querySelectorAll("img");
    let hatterElemek = [$(".sun-container"), $(".vizpart"), $(".cloud")];

    let szinezett = 0;
    let isLoading = true;


    

    let kattint = (DOM, callback) => {
        DOM.on("click", () => {
            callback();
        });
    };

    let szurkitMindent = () => {
        let szurkit = (tomb) => {
            tomb.forEach((elem) => {
                $(elem).addClass("szurkit");
            });
        };
        $("body").css("backgroundColor", "gray");
        szurkit(osszesKep);
        szurkit(hatterElemek);
    };

    //pontszámig színez
    let egyetSzinez = () => {
        let szinezheto = $(".szurkit");
        let progress = $(".progress1");
        console.log(progress);
        let pontszam = 3;
        let szinez = (tomb) => {
            for (let index = 0; index < pontszam; index++) {
                $(tomb[index]).removeClass("szurkit");
                szinezett++;
            }
            szinezett += 2;
            progress.css("width", szinezett + "%");
        };
        $(".badge").text(szinezett);

        if (szinezheto.length === 0)
            return $("body").css("backgroundColor", "rgba(0, 153, 255, 0.226)");
        szinez(szinezheto);
    };

    

    let megnyit = () =>{
        $("body").children().css("display","block");
        $(".nav").css("display","none");
        $("body").css("backgroundColor", "gray");
        $(".loading").hide();
        EGYETSZINEZ.attr("disabled",false);
    }    

    $(".navopen").on("click",(event)=>{
       $(".nav").slideDown(500);
       $(".navopen").hide();
    })

    $(".navclose").on("click",(event)=>{
        $(".nav").slideUp(500,()=>{
            $(".navopen").show();
        });
       
    })

    kattint(SZURKIT, szurkitMindent);
    kattint(EGYETSZINEZ, egyetSzinez);
    $("body").children().hide();
    szurkitMindent();
    
    let toltes = () =>{
        
        $("body").css("backgroundColor", "white");
        $(".loading").css("display","");
        EGYETSZINEZ.attr("disabled",true);
    }
    if (isLoading) {
        toltes();
        setTimeout(()=>{megnyit()},5500);
    }
    

});
