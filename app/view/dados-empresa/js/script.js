$('#i_file').change(function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#img_logo").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));

    $("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>[" + tmppath + "]</strong>");
});