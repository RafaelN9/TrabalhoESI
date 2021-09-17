function senha_mostra_esconde(elem){
    var senhaBox = elem.parentNode.parentNode.firstElementChild;
    var show_eye = elem.parentNode.parentNode.querySelector("#show_eye");
    var hide_eye = elem.parentNode.parentNode.querySelector("#hide_eye");
    hide_eye.classList.remove("d-none");
    if (senhaBox.type === "password") {
        senhaBox.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        senhaBox.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}