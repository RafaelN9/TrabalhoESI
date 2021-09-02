let valor;

function Marcar(elem){
    $("#"+elem)[0].checked = true;
    $("#linha"+elem).addClass('table-active');
    valor = $("input[name='relatorio']:checked").val();
    $('input:radio[name="relatorio"]').each(function() {
        //Verifica qual está selecionado
        if (!$(this).is(':checked')){
            remove = $(this).val();
            $("#linha"+remove).removeClass("table-active");
        }
    })
}

function acessarRelatorio(){
    if(valor != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?revisao_relatorio="+valor;
    }

}
