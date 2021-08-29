
var containerCursoRadio = document.querySelector("#formulario > form > div:nth-child(5)");
containerCursoRadio.addEventListener('change', insereSemestresDeAcordoComOCurso);

function insereSemestresDeAcordoComOCurso(){
    var inputRadioCursoDoutorado = document.querySelector('#q8_2');
    var container = document.querySelector("#semestre");
    var numeroDeSemestres;
    let divHolder = document.createElement('div');

    if(inputRadioCursoDoutorado.checked){
        container.innerHTML = "";
        numeroDeSemestres = 10;
        insereInputRadio(numeroDeSemestres, divHolder);
        container.append(divHolder);
    }else{
        container.innerHTML = "";
        numeroDeSemestres = 5;
        insereInputRadio(numeroDeSemestres, divHolder);
        container.append(divHolder);
    }
}

function insereInputRadio(numeroDeSemestres, divHolder){
    for(i = 1; i <= numeroDeSemestres; i++){
        divHolder.insertAdjacentHTML("beforeend", `
        <div class="form-check">
            <input class="form-check-input" type="radio" name="q8" id="q9_${i}" value="Doutorado">
            <label class="form-check-label" for="q9_${i}">
                ${i}o semestre do curso.
            </label>
        </div>
        `);
    }
}
