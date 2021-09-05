let valor;

function Marcar(elem){
    console.log(elem)
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

function solicitarRefazer(){
    if(valor != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?refazer="+valor;
    }
}

function acessarRelatorio(){
    if(valor != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?revisao_relatorio="+valor;
    }
}

function cortarAluno(){
    if(valor != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?cortar="+valor;
    }
}




