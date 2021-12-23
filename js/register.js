$(document).ready(function () {
    changeImg.onchange = evt => {
        const [file] = changeImg.files
        if (file) {
            profileImage.src = URL.createObjectURL(file)
        }
    }
});