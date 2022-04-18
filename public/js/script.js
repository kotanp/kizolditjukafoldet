$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const ajax = new Ajax(token);
    let pontNovekvo = "/bejegyzesek/sortbytev?_sort=pontszam";
    let pontCsokkeno = "/bejegyzesek/sortbytev?_sort=pontszam&_order=desc";
    ajax.getAjax("/bejegyzesek/expand", bejegyzesLista);
    ajax.getAjax("/tevekenysegek", tevekenysegLista);
    ajax.getAjax("/osztalyok", osztalyLista);

    let osszesKep = document.querySelector("body").querySelectorAll("img");
    let hatterElemek = [$(".sun-container"), $(".vizpart"), $(".cloud")];
    szurkitMindent();

    function bejegyzesLista(adatok) {
        let szulo = $("#tablazat");
        szulo.empty();
        let tablazat = new BejegyzesTablazat(szulo, adatok);
        let tablazat2 = new BejegyzesKisTablazat(szulo, adatok);
    }

    function tevekenysegLista(tevekenysegek) {
        let option = "";
        tevekenysegek.forEach(function (elem) {
            option =
                "<option value='" +
                elem.id +
                "'>" +
                elem.tevekenyseg_nev +
                "</option>";
            $("#tevekenyseg").append(option);
        });
    }

    function osztalyLista(osztalyok) {
        let option = "";
        osztalyok.forEach(function (elem) {
            option =
                "<option value='" + elem.id + "'>" + elem.nev + "</option>";
            $("#osztaly").append(option);
        });
    }

    function googleChart(adatok) {
        let tomb = [["Osztályok", "Pontszám", { role: "style" }]];
        adatok.forEach((elem) => {
            tomb.push([elem.osztaly, parseInt(elem.pontszam), "green"]);
        });
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
        window.onresize = drawChart;

        function drawChart() {
            var data = google.visualization.arrayToDataTable(tomb);

            var options = {
                title: "Pontszámok osztályonként",
                hAxis: {
                    title: "Pontszám",
                    minValue: 0,
                },
                vAxis: {
                    title: "Osztályok",
                },
            };

            var chart = new google.visualization.BarChart(
                document.getElementById("chart_div")
            );
            chart.draw(data, options);
        }
    }

    $("#rendezes").on("change", function () {
        let apivp = "";
        let kivalasztottszures = $(this, " option:selected").val();
        switch (kivalasztottszures) {
            case "csokkeno":
                apivp = pontCsokkeno;
                break;

            case "novekvo":
                apivp = pontNovekvo;
                break;
        }
        ajax.getAjax(apivp, bejegyzesLista);
    });

    function szurkitMindent() {
        let szurkit = (tomb) => {
            tomb.forEach((elem) => {
                $(elem).addClass("szurkit");
            });
        };

        szurkit(osszesKep);
        szurkit(hatterElemek);
    }

    let egyetSzinez = (pontszam) => {
        let szinezett = 0;
        let szinezheto = $(".szurkit");
        let progress = $(".progress1");
        $(".badge").text("0");
        let szinez = (tomb) => {
            for (let index = 0; index < pontszam; index++) {
                $(tomb[index]).removeClass("szurkit");
                szinezett++;
            }
            szinezett += 2;
            progress.css("width", szinezett + "%");
            $(".badge").text(pontszam);
            if (szinezheto.length !== 0 ) {
                $("body").css("backgroundColor", "gray"); 
                
            }

            if (pontszam >= 100) {
                $("body").css("backgroundColor", "rgba(0, 153, 255, 0.226)"); 
                
                $(".badge").text("100%");
                progress.css("width", 100 + "%");
                
            }
        };

        console.log(pontszam);
        szinez(szinezheto);
    };

    $("#osztaly").on("change", () => {
        let id = $("#osztaly option:selected").val();
        if (id !== "") {
            ajax.getAjax("/bejegyzesek/listbyoszt/" + id, bejegyzesLista);
        } else {
            ajax.getAjax("/bejegyzesek/expand", bejegyzesLista);
        }

        getOsztalyPontszam();
        osztalyFelirat();
    });

    function osztalyFelirat() {
        let osztaly_felirat = $("#osztaly option:selected").text();
        $(".felirat").text(osztaly_felirat);
    }

    function getOsztalyPontszam() {
        let osztaly_id = $("#osztaly option:selected").val();
        szurkitMindent();
        ajax.getAjax("/bejegyzesek/filterbyoszt/" + osztaly_id, (adat) => {
            egyetSzinez(adat.pontszam);
        });
    }

    $("#submit").on("click", function () {
        let osztaly_id = $("#osztaly option:selected").val();
        let tevekenyseg_id = $("#tevekenyseg option:selected").val();
        let diak = $("#nev").val();
        let ujAdat = {
            osztaly_id: osztaly_id,
            diak: diak,
            tevekenyseg_id: tevekenyseg_id,
            allapot: "jóváhagyásra vár",
        };
        if (osztaly_id !== "" && tevekenyseg_id !== "") {
            ajax.postAjax("/bejegyzes", ujAdat);
            ajax.getAjax(
                "/bejegyzesek/listbyoszt/" + osztaly_id,
                bejegyzesLista
            );
        } else {
            ajax.getAjax("/bejegyzesek/expand", bejegyzesLista);
        }
        ajax.getAjax("/bejegyzesek/filterbyoszt", googleChart);
        getOsztalyPontszam();
    });

    ajax.getAjax("/bejegyzesek/filterbyoszt", googleChart);

    $("#logout").on("click", (event) => {
        let ujAdat = {
            _token: event.detail._token,
        };
        ajax.postAjax("/logout", ujAdat);
    });
});
