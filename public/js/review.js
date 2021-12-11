let liked = false;
let disliked = false;


function likeReview(id,elem,index,alreadyLiked=false,alreadyDisliked=false){
    if(alreadyLiked){
        liked = true;
    }
    if(alreadyDisliked){
        disliked = true;
    }

    console.log(elem.getAttribute('onclick'))

    const dislike_button = document.querySelector(`#dislike-${index}`);
    const dislike_counter = dislike_button.firstElementChild;
    const dislike_icon = dislike_button.firstElementChild.nextElementSibling.nextElementSibling;

    const like_counter = elem.firstElementChild;
    const like_icon = elem.firstElementChild.nextElementSibling.nextElementSibling;
    const type = 'like';

    if(! liked && !disliked){ // have not liked yet or disliked yet
        console.log('Liking, have not liked or disliked before.')
        like_counter.textContent = (parseInt(like_counter.textContent) + 1).toString();
        like_icon.classList.add('text-blue-500');

        elem.setAttribute('onclick',`likeReview(${id},this,${index},true,false)`);
        dislike_button.setAttribute('onclick',`dislikeReview(${id},this,${index},true,false)`);

        liked = true;
    }
    else if(!liked && disliked){ // disliked then clicked liked
        console.log('Liking, you have disliked before.')
        like_counter.textContent = (parseInt(like_counter.textContent) + 1).toString();
        dislike_counter.textContent = (parseInt(dislike_counter.textContent) - 1).toString();
        like_icon.classList.add('text-blue-500');
        dislike_icon.classList.remove('text-red-500');

        elem.setAttribute('onclick',`likeReview(${id},this,${index},true,false)`);
        dislike_button.setAttribute('onclick',`dislikeReview(${id},this,${index},true,false)`);

        liked = true;
        disliked = false;


    }
    else{ // click like again
        console.log('Removing like, you have already liked.')

        like_counter.textContent = (parseInt(like_counter.textContent)  - 1).toString();
        like_icon.classList.remove('text-blue-500');
        elem.setAttribute('onclick',`likeReview(${id},this,${index})`);
        dislike_button.setAttribute('onclick',`dislikeReview(${id},this,${index})`);
        liked = false;

    }


    fetch('/review/like',
        {
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body:JSON.stringify({'id':id,'type':type})
        }).then(res=>res.json())
        .then(data=>console.log(data))

}

function dislikeReview(id,elem,index,alreadyLiked=false,alreadyDisliked = false){
    if(alreadyDisliked){
        disliked = true;
    }
    if(alreadyLiked){
        liked = true;
    }

    const like_button = document.querySelector(`#like-${index}`);
    const like_counter = like_button.firstElementChild;
    const like_icon = like_button.firstElementChild.nextElementSibling.nextElementSibling;

    const dislike_counter = elem.firstElementChild;
    const dislike_icon = elem.firstElementChild.nextElementSibling.nextElementSibling;
    const type = 'dislike';


    if(! disliked && !liked){
        console.log('Disliking, you have not liked or disliked before.');

        dislike_counter.textContent = (parseInt(elem.textContent) + 1).toString();
        dislike_icon.classList.add('text-red-500');

        elem.setAttribute('onclick',`dislikeReview(${id},this,${index},false,true)`);
        like_button.setAttribute('onclick',`likeReview(${id},this,${index},false,true)`);

        disliked = true;
    }
    else if(!disliked && liked){
        console.log('Disliking, you have liked before.')
        dislike_counter.textContent = (parseInt(elem.textContent) + 1).toString();
        like_counter.textContent = (parseInt(like_counter.textContent) - 1).toString();
        like_icon.classList.remove('text-blue-500');
        dislike_icon.classList.add('text-red-500');

        elem.setAttribute('onclick',`dislikeReview(${id},this,${index},false,true)`);
        like_button.setAttribute('onclick',`likeReview(${id},this,${index},false,true)`);

        disliked = true;
        liked = false;
    }
    else{
        console.log('Removing original dislike');
        dislike_counter.textContent = (parseInt(dislike_counter.textContent) - 1).toString();
        dislike_icon.classList.remove('text-red-500');

        elem.setAttribute('onclick',`dislikeReview(${id},this,${index})`);
        like_button.setAttribute('onclick',`likeReview(${id},this,${index})`);
        disliked = false;

    }



    fetch('/review/dislike',
        {
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body:JSON.stringify({'id':id,'type':type})
        }).then(res=>res.json())
        .then(data=>console.log(data))
}
