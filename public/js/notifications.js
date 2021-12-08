function showNotifications(){
    const notif = document.querySelector('#toggleNotifications');
    if(notif.classList.contains('hidden')){
        notif.classList.remove('hidden');
    }
    else {
        notif.classList.add('hidden');
    }
}
function showOptions(id){
    const options = document.querySelector(`#${id}`);
    if(options.classList.contains('hidden')){
        options.classList.remove('hidden');
    }
    else {
        options.classList.add('hidden');
    }
}
