$(function(){

    const ELREJT = $(".hideAll");
    const SZURKIT = $(".grayAll");
    const EGYETSZINEZ = $(".colorOnce");
    let osszesKep = document.querySelector("body").querySelectorAll("img");
    let osszesDiv = document.querySelector("body").querySelectorAll("div");
    let hatterElemek = [$(".sun-container"),$(".vizpart"),$(".cloud")];
    let szinezett = 0;

    let kattint = (DOM,callback)=>{
        DOM.on("click",()=>{
            callback();
        });
    }

    let elrejtMindent = () =>{ 
        
        let elrejt = (tomb) =>{
            tomb.forEach(elem=>{
                elem.style.display="none";
            })
        }
        elrejt(osszesKep)
        elrejt(osszesDiv)
    }

    let szurkitMindent = ()=>{
        
        let szurkit = (tomb) =>{
            tomb.forEach(elem=>{
                $(elem).addClass("szurkit");
            })
        }
        $("body").css("backgroundColor","gray");
        szurkit(osszesKep)
        szurkit(hatterElemek);
    }

    let egyetSzinez = ()=>{
        let szinezheto = $(".szurkit");
        let szinez =  (tomb) =>{
            $(tomb[0]).removeClass("szurkit");
            szinezett++;
        }
        $(".badge").text(szinezett)
      
        if(szinezheto.length===0) return $("body").css("backgroundColor","rgba(0, 153, 255, 0.226)");
        szinez(szinezheto)
    }

    kattint(ELREJT,elrejtMindent);
    kattint(SZURKIT,szurkitMindent);
    kattint(EGYETSZINEZ,egyetSzinez);


    //...toltes esemény lesz
    window.addEventListener('load', function () {
        alert("It's loaded!")
      })
    
});

