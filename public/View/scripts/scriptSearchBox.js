var ehCCP = false;

if(document.querySelector('#head').children[3] != undefined){
    ehCCP = true;
}

var searchboxElement = document.querySelector("#search-box");
searchboxElement.addEventListener('keyup', ()=>{

    let value = searchboxElement.value;
    value = value.toUpperCase();

    let allRows = document.getElementsByTagName('tr');

    for(element of allRows){
        if(element.id == 'head') continue;
        element.style['display'] = 'none';
        
        let nomeAluno = element.children[1].textContent;
        nomeAluno = nomeAluno.toUpperCase();

        switch (ehCCP) {
            case true:
                let nomeProfessor = element.children[3].textContent;
                nomeProfessor = nomeProfessor.toUpperCase();

                if(nomeAluno.includes(value) || nomeProfessor.includes(value)){
                    element.style['display'] = 'table-row';
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

var checkboxElement = document.querySelector("#searchBarAppendDesliga");
checkboxElement.addEventListener('change', function() {
    if (this.checked) {
        console.log("ligou");
        let allRows = document.getElementsByTagName('tr');
        for(element of allRows){
            if(element.id == 'head') continue;
            element.style['display'] = 'none';

            if(element.children[1].textContent.includes(...possivelCortarList)){ //lista nome aluno
                element.style['display'] = 'table-row';
            }
        }
    } else {
        let allRows = document.getElementsByTagName('tr');
        for(element of allRows){
            element.style['display'] = 'table-row';
        }
        console.log("Checkbox is not checked..");
    }
});