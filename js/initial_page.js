autofitIframe = (id) => {
    if (!window.opera && document.all && document.getElementById) {
        id.style.height = id.contentWindow.document.body.scrollHeight;
    } else if (document.getElementById) {
        id.style.height = id.contentDocument.body.scrollHeight + "px";
    }
}


