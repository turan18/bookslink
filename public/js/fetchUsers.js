function fetchUsers(){
    fetch(`/partials/user?username=${requestItem}`)
        .then(response=>response.text())
        .then(html=>{
            document.querySelector('#items-container').innerHTML = html;
            document.querySelector('#usr_link').classList.add('bg-light-purple');
            document.querySelector('#book_link').classList.remove('bg-light-purple');
            document.querySelector('#load').style.display = "none";
        });
}
