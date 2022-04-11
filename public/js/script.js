$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const ajax = new Ajax(token);
    const apivegpont = "http://localhost:8000";
    let pontNovekvo = "/bejegyzesek/sortbytev?_sort=pontszam";
    let pontCsokkeno = "/bejegyzesek/sortbytev?_sort=pontszam&_order=desc";
    ajax.getAjax(apivegpont+"/bejegyzesek/expand", bejegyzesLista);
    ajax.getAjax(apivegpont+"/tevekenysegek", tevekenysegLista);
    ajax.getAjax(apivegpont+"/osztalyok", osztalyLista);
    

 
 
    function bejegyzesLista(adatok){
        let szulo = $("#tablazat");
        szulo.empty();
        let tablazat = new BejegyzesTablazat(szulo, adatok);
        let tablazat2 = new BejegyzesKisTablazat(szulo, adatok);
    }

    function tevekenysegLista(tevekenysegek){
        let option="";
        tevekenysegek.forEach(function(elem){
            option="<option value='"+elem.id+"'>"+elem.tevekenyseg_nev+"</option>";
            $("#tevekenyseg").append(option);
        });
    }

    function osztalyLista(osztalyok){
        let option="";
        osztalyok.forEach(function(elem){
            option="<option value='"+elem.id+"'>"+elem.nev+"</option>";
            $("#osztaly").append(option);
        });
    }

    function googleChart(adatok){
        let tomb = [['Osztályok', 'Pontszám', { role: 'style' }]];
        adatok.forEach((elem)=>{
            tomb.push([elem.osztaly, parseInt(elem.pontszam), 'green']);
        });
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        window.onresize = drawChart;
        function drawChart() {
        var data = google.visualization.arrayToDataTable(tomb);

        var options = {
            title:'Pontszámok osztályonként',
            hAxis: {
                title: 'Pontszám',
                minValue: 0
            },
            vAxis: {
                title: 'Osztályok'
            },
        
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
    }

    $("#rendezes").on("change",function(){
        let apivp="";
        let kivalasztottszures=$(this, " option:selected").val();
        switch (kivalasztottszures) {
            case "csokkeno":
                apivp=apivegpont+pontCsokkeno;
                break;
        
            case "novekvo":
                apivp=apivegpont+pontNovekvo;
                break;
        }
        ajax.getAjax(apivp,bejegyzesLista);
    });

    $("#submit").on("click",function(){
        let osztaly_id=$("#osztaly option:selected").val();
        let tevekenyseg_id=$("#tevekenyseg option:selected").val();
        let ujAdat={
            "osztaly_id":osztaly_id,
            "tevekenyseg_id":tevekenyseg_id,
            "allapot":"jóváhagyásra vár",
        };
        ajax.postAjax(apivegpont+"/bejegyzes", ujAdat);
        //location.reload();
        ajax.getAjax(apivegpont+"/bejegyzesek/expand", bejegyzesLista);
        ajax.getAjax(apivegpont+"/bejegyzesek/filterbyoszt", googleChart);
    });

    ajax.getAjax(apivegpont+"/bejegyzesek/filterbyoszt", googleChart);

});