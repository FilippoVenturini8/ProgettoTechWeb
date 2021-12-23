$(document).ready(function () {
    $(".dropdown-menu li a").click(function(){
        $(".dropDown").text($(this).text());
        $(".dropDown").val($(this).text());
    });

    copertina.onchange = evt => {
        const [file] = copertina.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
      }
});

