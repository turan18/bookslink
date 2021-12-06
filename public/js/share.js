function shareSearch(){
    if(!search_toggle){
        search_container.classList.remove('hidden');
        wrapper.classList.add('opacity-60');
        search_bar.focus();
        search_toggle = true;


    }
    else{
        search_container.classList.add('hidden')
        wrapper.classList.remove('opacity-60');
        search_toggle = false;
    }
}

function share(id){
    if (document.readyState === 'complete' && event.target.type !== 'checkbox') {
        const message = document.querySelector(`#${id}`).nextElementSibling;
        const node = document.querySelectorAll('.slidedown')[0];

        if(node === undefined){
            message.classList.add('slidedown');
        }
        else{
            node.classList.remove('slidedown');
            node.classList.add('slideup');
            if(node.previousElementSibling.id !== id){
                setTimeout(()=>{
                    message.classList.add('slidedown');
                },500)
            }

        }
    }
}
