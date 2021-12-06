function uploadAvatar(elem){
    const file = elem.files[0];
    const formData = new FormData()
    formData.append('avatar',file);

    fetch('/avatar',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    }).then(response => response.json())
        .then(data => {
            document.querySelector('#avatar_pic').src = `storage/${data}`;
        })
        .catch(error => {
            console.error(error)
        })
}

function aboutMe(){
    const about_me = document.querySelector('#about_me');

    const formData = new FormData();
    formData.append('about_me',about_me.value);

    fetch('/aboutme',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    }).then(response=>response.json())
        .then(data=>{
            console.log(data);
            about_me.value = data;
        })
        .catch(error=>{
            console.error(error);
        })
}
