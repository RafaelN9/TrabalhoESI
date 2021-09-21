function toggleDisplayNotifications() {
    $("#notificationsCard").toggle();

}

function dismissNotificationCard(){
    $("#notificationsCard").hide();
}

function deleteNotify(id){
    $.post( "View/deleteNotify.php", { notify: id} , function (data){
        if(data == 1){
            let parent = document.querySelector('#notifications');
            $(`#${id}`).remove();
            if(parent.children.length == 0){
                parent.innerHTML = '<p class="p-5 mx-auto my-auto">Sem notificações</p>';
            }
        }
    });
}

function Redireciona(link, codNotificacao, elem){
    $.post("View/changeNotify.php", { codNotifica: codNotificacao}, function (data){
        elem.parentElement.className= 'd-flex dropdown-item alert-secondary';
    });

    window.location.href = "http://localhost/trabalhoESI/public/"+link;
}