function getProfile(){
    fetch('profile')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html);
}
function getFavorites(){
    fetch('favorites')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html);
}
function getShared(){
    fetch('shared')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html)
}
function getFollowers(){
    fetch('followers')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html)
}
function getFollowing(){
    fetch('following')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html)
}



function removeFromFavorites(book_id,id){
    const item = document.querySelector(`#${id}`);
    item.parentNode.parentNode.style.transition = "opacity 0.5s ease-in";

    item.parentNode.parentNode.style.opacity = 0;
    setTimeout(function() {
        item.parentNode.parentNode.remove();
    }, 500);

    fetch('/unfavorite-item',{
        method: "post",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            book_id: book_id

        })
    }).then((response) => response.json()).then((data) => {console.log('Item removed from favorites',data)})
}
