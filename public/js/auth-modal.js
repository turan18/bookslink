const register_modal = document.getElementById('register-modal');
const login_modal = document.getElementById('login-modal');

function activateLoginModal(){
    const login_button = document.getElementById('login');
    const close = document.getElementById('login-close');

    if(register_modal.classList.contains('show-modal')){
        register_modal.classList.remove('show-modal')
    }


    login_button.addEventListener('click',()=>{
        login_modal.classList.add('show-modal');
    })
    close.addEventListener('click',()=>{

        login_modal.classList.remove('show-modal');
    })
}
function activateRegisterModal(){
    const register_button = document.getElementById('register');
    const close = document.getElementById('register-close');

    if(login_modal.classList.contains('show-modal')){
        login_modal.classList.remove('show-modal')
    }


    register_button.addEventListener('click',()=>{
        register_modal.classList.add('show-modal');
    })
    close.addEventListener('click',()=>{
        register_modal.classList.remove('show-modal');
    })
}



