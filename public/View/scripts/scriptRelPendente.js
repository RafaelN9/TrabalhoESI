let acessar;
let cortar;

function Marcar(elem){
    console.log(elem)
    $("#"+elem)[0].checked = true;
    $("#linha"+elem).addClass('table-active');
    acessar = $("input[name='relatorio']:checked").val();
    $('input:radio[name="relatorio"]').each(function() {
        //Verifica qual está selecionado
        if (!$(this).is(':checked')){
            remove = $(this).val();
            $("#linha"+remove).removeClass("table-active");
        }
    })
}

function MarcarCortar(elem){
    console.log(elem)
    $("#c_"+elem)[0].checked = true;
    $("#cortar"+elem).addClass('table-active');
    cortar = $("input[name='cortar']:checked").val();
    $('input:radio[name="cortar"]').each(function() {
        //Verifica qual está selecionado
        if (!$(this).is(':checked')){

            remove = $(this).val();
            console.log(remove);
            $("#cortar"+remove).removeClass("table-active");
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




