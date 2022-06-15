const main = document.getElementById('mainPic');

document.querySelectorAll('.thumbPic').forEach(thumb=>{
    thumb.addEventListener('click', function(){
        main.src=thumb.src
    })
})

