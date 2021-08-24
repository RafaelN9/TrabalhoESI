$("#cadastroAluno").click(function(){
    $("#cadastroAluno").addClass('active'); 
    $("#cadastroProf").removeClass('active'); 
    $("#cadastroCCP").removeClass('active'); 

    $("#formAluno").removeClass('d-none'); 
    $("#formAluno").addClass('d-flex'); 

    $("#formProfessor").removeClass('d-flex'); 
    $("#formProfessor").addClass('d-none');

    $("#formCCP").removeClass('d-flex');  
    $("#formCCP").addClass('d-none'); 
});

$("#cadastroProf").click(function(){
    $("#cadastroProf").addClass('active'); 
    $("#cadastroAluno").removeClass('active'); 
    $("#cadastroCCP").removeClass('active');

    $("#formAluno").removeClass('d-flex'); 
    $("#formAluno").addClass('d-none'); 
    
    $("#formProfessor").removeClass('d-none'); 
    $("#formProfessor").addClass('d-flex');

    $("#formCCP").removeClass('d-flex');  
    $("#formCCP").addClass('d-none'); 
});

$("#cadastroCCP").click(function(){
    $("#cadastroCCP").addClass('active'); 
    $("#cadastroProf").removeClass('active'); 
    $("#cadastroAluno").removeClass('active');

    $("#formAluno").removeClass('d-flex'); 
    $("#formAluno").addClass('d-none'); 
    
    $("#formProfessor").removeClass('d-flex'); 
    $("#formProfessor").addClass('d-none');

    $("#formCCP").removeClass('d-none');  
    $("#formCCP").addClass('d-flex'); 
});