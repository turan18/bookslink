let search_toggle = false;
search_bar.addEventListener('keyup',function (e){
    if(e.key === "Escape" && search_toggle){
        search_bar.focus();
        search_toggle = false;
        search_container.classList.add('hidden');
        wrapper.classList.remove('opacity-60');


    }
    else if(search_toggle){
        fetch(`/partials/share?user=${search_bar.value}`, {headers: { 'Accept': 'application/json' }})
            .then(response=>{
                if(response.ok){
                    return response.text()
                }
                else if(response.status === 404){
                    return Promise.reject('User not found.');
                }
                else{
                    return Promise.reject(response.status)
                }
            })
            .then(html=> search_results.innerHTML = html + "<div class=\"flex justify-center my-4\"><button class=\"px-4 py-1 text-white bg-blue-500 rounded-lg\" type=\"submit\">Share</button></div>")
            .catch(error=>{
                search_results.innerHTML = "<p class=\"text-center p-5\">No results found...</p>";
            })
    }
});


function showMore(){

    ellipses.classList.add('hidden');
    show_more_button.classList.add('hidden');
    show_more.classList.remove('hidden');
    show_less.classList.remove('hidden');
    show_less_button.classList.remove('hidden');

}
function showLess(){
    ellipses.classList.remove('hidden');
    show_more_button.classList.remove('hidden');
    show_more.classList.add('hidden');
    show_less.classList.add('hidden');
    show_less_button.classList.add('hidden');

}
