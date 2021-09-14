function toggleDisplayNotifications() {
    $("#notificationsCard").toggle();

}

function dismissNotificationCard(){
    $("#notificationsCard").hide();
}

function deleteNotify(id){
    
    var parent = document.querySelector('#notifications');
    if(parent.children.length == 1){
        parent.innerHTML = '<p class="text-white p-5 mx-auto my-auto">Sem notificações</p>';
    }
}