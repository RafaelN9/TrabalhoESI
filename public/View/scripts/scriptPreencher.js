$(document).ready(function () {

    function templateInputRadio(num){
        let inputRadioTemplate =`<div class="form-check">
                                    <input class="form-check-input" type="radio" name="q9" id="q9_${num}" value="${num}° semestre do curso" required>
                                    <label class="form-check-label" for="q9_${num}">
                                    ${num}° semestre do curso
                                    </label>
                                 </div>`;
        let divContainerInputRadio = document.createElement('div');
        divContainerInputRadio.className = 'form-check';
        divContainerInputRadio.insertAdjacentHTML('beforeend', inputRadioTemplate);

        return divContainerInputRadio;
    }

    $('input[type=radio][name=q8]').change(function () {
        if (this.value == '1') {
            $("#semestre").html('');
            for(i = 1; i <= 5 ; i++){
                let content = templateInputRadio(i);
                $("#semestre").append(content);
            }

        } else if (this.value == '2') {
            $("#semestre").html('');
            for(i = 1; i <= 8 ; i++){
                let content = templateInputRadio(i);
                $("#semestre").append(content);
            }

        }
    });


    $('#confirmar').click(function () {
        $('.modal').modal('show')
    })
});