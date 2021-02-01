function resizeFrame(id)
{
    const iframe = document.getElementById(id);

    iframe.onload = function () {
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
}
