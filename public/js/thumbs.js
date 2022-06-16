const main = document.getElementById('mainPic');

document.querySelectorAll('.thumbPic').forEach(thumb=>{
    thumb.style.cursor = 'pointer';
    thumb.addEventListener('click', function(){
        main.src=thumb.src
    })
})

