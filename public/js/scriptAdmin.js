$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const ajax = new Ajax(token);
    ajax.getAjax("/bejegyzesek/tanar", bejegyzesLista);

    ajax.getAjax("/osztaly/tanar",(adat)=>{
       $(".osztaly-nev").text(adat);
    })

    function bejegyzesLista(adatok){
        let szulo = $("#tablazat");
        szulo.empty();
        let tablazat = new BejegyzesAdminTablazat(szulo, adatok);
        
    }

    $(window).on("elfogadas",(event)=>{
        let ujAdat = {
            tevekenyseg_id:event.detail.tevekenyseg_id,
            osztaly_id:event.detail.osztaly_id,
            allapot:"elfogadva",
        };
        ajax.putAjax("/bejegyzes",event.detail.id,ujAdat);
        ajax.getAjax("/bejegyzesek/tanar", bejegyzesLista);
    });

    $(window).on("elutasitas",(event)=>{
        ajax.deleteAjax("/bejegyzes",event.detail.id);
        ajax.getAjax("/bejegyzesek/tanar", bejegyzesLista);
    });

    $("#logout").on("click", (event)=>{
        //event.preventDefault();
        let ujAdat ={
            _token:event.detail._token
        }
        ajax.postAjax("/logout",ujAdat);
    });

});