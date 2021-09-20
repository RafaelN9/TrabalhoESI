let acessar;
let cortar;
var checkboxElement = document.querySelector("#searchBarAppendDesliga");

function Marcar(elem){
    $("#elem"+elem)[0].checked = true;
    $("#linha"+elem).addClass('table-active');
    acessar = $("input[name='relatorio']:checked").val();
    if(checkboxElement != null && checkboxElement.checked){
        cortar = acessar;
    }
    $('input:radio[name="relatorio"]').each(function() {
        //Verifica qual está selecionado
        if (!$(this).is(':checked')){
            remove = $(this).val();
            $("#linha"+remove).removeClass("table-active");
        }
    })
}

function solicitarRefazer(){
    if(acessar != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?refazer="+acessar;
    }
}

function acessarRelatorio(){
    if(acessar != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?revisao_relatorio="+acessar;
    }
}

function cortarAluno(){
    if(cortar != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?cortar="+cortar;
    }
}

function aceitarRefazer(){
    if(acessar != undefined){
        window.location.href = "http://localhost/trabalhoESI/public/index.php?aceitaRefazer="+acessar;
    }
}




