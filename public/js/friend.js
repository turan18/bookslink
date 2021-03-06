function followUser(user,button_index){
    const follow_button = document.querySelector(`#follow_button-${button_index}`);
    follow_button.textContent = 'Unfollow';
    follow_button.classList.remove('bg-blue-500');
    follow_button.classList.add('bg-red-500');
    follow_button.setAttribute('onclick',`unfollowUser(${user},${button_index})`);
    follow_button.id = `unfollow_button-${button_index}`;


    fetch('/follow',{
        method: "post",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            user_id: user

        })
    }).then((response) => response.json()).then((data) => {console.log('Success',data)})


}





function unfollowUser(user,button_index){
    const unfollow_button = document.querySelector(`#unfollow_button-${button_index}`);
    unfollow_button.textContent = 'Follow';
    unfollow_button.classList.remove('bg-red-500');
    unfollow_button.classList.add('bg-blue-500');
    unfollow_button.setAttribute('onclick',`followUser(${user},${button_index})`);
    unfollow_button.id = `follow_button-${button_index}`;


    fetch('/unfollow',{
        method: "post",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            user_id: user

        })
    }).then((response) => response.json()).then((data) => {console.log('Success',data)})
}
