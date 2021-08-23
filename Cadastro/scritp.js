$("#cadastroAluno").click(function(){
    $("#cadastroAluno").addClass('active'); 
    $("#cadastroProf").removeClass('active'); 
    $("#cadastroCCP").removeClass('active'); 
});

$("#cadastroProf").click(function(){
    $("#cadastroProf").addClass('active'); 
    $("#cadastroAluno").removeClass('active'); 
    $("#cadastroCCP").removeClass('active');
});

$("#cadastroCCP").click(function(){
    $("#cadastroCCP").addClass('active'); 
    $("#cadastroProf").removeClass('active'); 
    $("#cadastroAluno").removeClass('active');
});