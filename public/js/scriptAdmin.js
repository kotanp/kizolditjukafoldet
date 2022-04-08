$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const ajax = new Ajax(token);
    const apivegpont = "http://localhost:8000";
    ajax.getAjax(apivegpont+"/bejegyzesek/tanar", bejegyzesLista);

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
        ajax.putAjax(apivegpont+"/bejegyzes",event.detail.id,ujAdat);
        ajax.getAjax(apivegpont+"/bejegyzesek/tanar", bejegyzesLista);
    });

    $("#logout").on("click", (event)=>{
        //event.preventDefault();
        let ujAdat ={
            _token:event.detail._token
        }
        ajax.postAjax(apivegpont+"/logout",ujAdat);
    });

});