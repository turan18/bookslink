let count = 0;
function fetchBooks(){
    fetch(`/partials/books?item=${requestItem}&index=${count}`)
        .then(response=>response.text())
        .then(html=>{
            document.querySelector('#items-container').innerHTML = html;
            document.querySelector('#book_link').classList.add('bg-light-purple');
            document.querySelector('#usr_link').classList.remove('bg-light-purple');
            document.querySelector('#load').style.display = "flex";
        });
}

function loadBooks(){
    count+=11
    fetch(`/partials/books?item=${requestItem}&index=${count}`)
        .then(response=>response.text())
        .then(html=>{
            document.querySelector('#items-container').innerHTML = document.querySelector('#items-container').innerHTML + html;
        });
}
