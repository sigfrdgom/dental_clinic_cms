window.addEventListener('load', listener);

function listener(){
    document.getElementById('btn-cambiar-video').addEventListener('click', changeUrl);
}

function changeUrl(){
    var inputUrl= document.getElementById('input-url').value;
    inputUrl=inputUrl.replace("watch?v=", "embed/");
    document.getElementById('div-video').innerHTML = `
    <iframe class="embed-responsive-item" id="iframe-video" src="${inputUrl}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" style=""></iframe>
    `;
}