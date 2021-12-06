const recommended_container = document.querySelector('#recommended-container');
window.onload = ()=>{
    fetch('partials/recommend')
        .then((res)=>res.text())
        .then((html)=>{
            if(recommended_container){
                recommended_container.innerHTML = html;
            }
        });
}
