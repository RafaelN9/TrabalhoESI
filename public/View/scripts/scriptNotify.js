function toggleDisplayNotifications() {
    $("#notificationsCard").toggle();

}

function dismissNotificationCard(){
    $("#notificationsCard").hide();
}

function deleteNotify(id){

    let parent = document.querySelector('#notifications');
    $(`#${id}`).remove();
    if(parent.children.length == 0){
        parent.innerHTML = '<p class="p-5 mx-auto my-auto">Sem notificações</p>';
    }
    
}
