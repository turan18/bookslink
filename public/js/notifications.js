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

function markRead(id,index){

    const item = document.querySelector(`#notification-${index}`);
    const indicator = document.querySelector(`#unread-indicator-${index}`);
    const options = document.querySelector(`#show-more-${index}`);
    const notifications_container = document.querySelector('#notifications-container');

    notifications_container.appendChild(item);
    options.classList.add('hidden');
    indicator.remove();
    item.classList.remove('bg-blue-100');

    fetch('notification/read',{
        method: "post",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body:JSON.stringify(id)
    }).then(res=>res.json())
        .then(data=>console.log(data))

}

function removeNotification(id,index){
    const item = document.querySelector(`#notification-${index}`);
    const notification_count = document.querySelector('#notification-count');
    const inner_count = document.querySelector('#inner_counter');

    notification_count.setAttribute('data-count',(parseInt(notification_count.getAttribute('data-count')) - 1).toString());

    notification_count.innerHTML = notification_count.getAttribute('data-count') !== '0' ? notification_count.getAttribute('data-count') : '';
    inner_count.innerHTML = notification_count.getAttribute('data-count') !== '0' ? notification_count.getAttribute('data-count') : '0';

    item.transition = "opacity 0.5s ease-in";

    item.opacity = 0;
    setTimeout(function() {
        item.remove();
    }, 200);



    fetch('notification/remove',{
        method: "post",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body:JSON.stringify(id)
    }).then(res=>res.json())
        .then(data=>console.log(data))

}
