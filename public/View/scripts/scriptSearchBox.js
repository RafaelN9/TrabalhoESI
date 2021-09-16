var ehCCP = false;
var allRows = document.getElementsByTagName('tr');
var checkboxElement = document.querySelector("#searchBarAppendDesliga");
var searchboxElement = document.querySelector("#search-box");

if(document.querySelector('#head').children[3] != undefined){
    ehCCP = true;
}

searchboxElement.addEventListener('keyup', ()=>{
    
    let value = searchboxElement.value;
    value = value.toUpperCase();
    
    for(element of allRows){
        if(element.id == 'head') continue;
        element.style['display'] = 'none';
        
        let nomeAluno = element.children[1].textContent;
        nomeAluno = nomeAluno.toUpperCase();

        switch (ehCCP) {
            case true:
                let nomeProfessor = element.children[3].textContent;
                nomeProfessor = nomeProfessor.toUpperCase();
                if(checkboxElement.checked){
                    possivelCortarList.forEach(function (possivelCortar) {
                        if((nomeAluno.includes(value) && nomeAluno.includes(possivelCortar.toUpperCase())) || nomeProfessor.includes(value)){
                            element.style['display'] = 'table-row';
                        }
                    })
                }else{
                    if(nomeAluno.includes(value) || nomeProfessor.includes(value)){
                        element.style['display'] = 'table-row';
                    }
                }
                break;
        
            default:
                if(nomeAluno.includes(value)){
                    element.style['display'] = 'table-row';
                }
                break;
        }
    }
});


checkboxElement.addEventListener('change', function() {
    $("#buttonCortar").toggle();
    if (this.checked){
        var saveRows = [];
        for(element of allRows){
            if(element.id == 'head') continue;
            element.style['display'] = 'none';
            possivelCortarList.forEach(possivelCortar => {
                if(element.children[1].textContent.includes(possivelCortar)){ //lista nome aluno
                    saveRows.push(element);
                    element.style['display'] = 'table-row';
                }
            });
        }
        allRows = saveRows;
    } else {
        cortar = undefined;
        allRows = document.getElementsByTagName('tr');
        for(element of allRows){
            element.style['display'] = 'table-row';
        }
    }
});