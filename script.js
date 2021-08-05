const urlField = document.querySelector(".field input");
const previewWindow = document.querySelector(".preview-window");
const imgTag = previewWindow.querySelector(".thumbnail");
const hiddenInput = document.querySelector(".hidden-input");

urlField.onkeyup = () => {
    let imgUrl = urlField.value;
    // console.log(imgUrl);
    previewWindow.classList.add("active");

    if (imgUrl.indexOf("https://www.youtube.com/watch?v") != -1) {
        let vidId = imgUrl.split("v=")[1].substring(0, 11);
        // console.log(vidId);
        let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        // console.log(ytThumnbnailUrl);
        imgTag.src = ytThumbnailUrl;
    }
    else if (imgUrl.indexOf("https://youtu.be/") != -1) {
        let vidId = imgUrl.split("be/")[1].substring(0, 11);
        let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytThumbnailUrl;
    }
    else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
        imgTag.src = imgUrl;
    }
    else {
        imgTag.src = "";
        previewWindow.classList.remove("active");

    }
    hiddenInput.value = imgTag.src;
}