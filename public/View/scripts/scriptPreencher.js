$(document).ready(function () {
    $('input[type=radio][name=q8]').change(function () {
        if (this.value == '1') {
            $("#q9").removeClass('d-none');
            $("#q9_1").prop('required',true);
            $("#q9_2").prop('required',true);
            $("#q9_3").prop('required',true);
            $("#q9_4").prop('required',true);
            $("#q9_5").prop('required',true);

            $("#q10_1").prop('required',false);
            $("#q10_2").prop('required',false);
            $("#q10_3").prop('required',false);
            $("#q10_4").prop('required',false);
            $("#q10_5").prop('required',false);
            $("#q10_6").prop('required',false);
            $("#q10_7").prop('required',false);
            $("#q10_8").prop('required',false);

            $("#q10").addClass('d-none');
        } else if (this.value == '2') {
            $("#q10").removeClass('d-none');
            $("#q10").prop('required',true);
            $("#q10_1").prop('required',true);
            $("#q10_2").prop('required',true);
            $("#q10_3").prop('required',true);
            $("#q10_4").prop('required',true);
            $("#q10_5").prop('required',true);
            $("#q10_6").prop('required',true);
            $("#q10_7").prop('required',true);
            $("#q10_8").prop('required',true);

            $("#q9_1").prop('required',false);
            $("#q9_2").prop('required',false);
            $("#q9_3").prop('required',false);
            $("#q9_4").prop('required',false);
            $("#q9_5").prop('required',false);
            $("#q9").addClass('d-none');

        }
    });


    $('#confirmar').click(function () {
        $('.modal').modal('show')
    })
});