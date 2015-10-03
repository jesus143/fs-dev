$(document).ready(function() {


    /*
     set profile minimum width allowed to the server
     */
    var min_width_profile = 200;
    /*
     set timeline minimum width allowed to the server
     */
    var min_width_timeline = 500;

    // NEW PROFILE
    function readImage2(file) {
        var reader = new FileReader();
        var image = new Image();
        reader.readAsDataURL(file);
        reader.onload = function (_file) {
            image.src = _file.target.result;              // url.createObjectURL(file);
            image.onload = function () {
                var w = this.width,
                    h = this.height,
                    t = file.type,                           // ext only: // file.type.split('/')[1],
                    n = file.name,
                    s = ~~(file.size / 1024) + 'KB';



                if (w >= min_width_profile) {
                    $('#upload-profile-pic').submit();
                    $("#avatar-right-uploadprofile").trigger("click");
                }
                else {
                    alert(' sorry minimum required size is ' + min_width_profile + ' x below but you have only ' + w + ' x ' + h + ' please try onother');
                }
            };
            image.onerror = function () {
                alert('Invalid file type: ' + file.type);
            };
        };
    }

    $("#welcome-profile-pic").change(function (e) {

        if (this.disabled) return alert('File upload not supported!');
        var F = this.files;
        if (F && F[0]) for (var i = 0; i < F.length; i++) readImage2(F[i]);
    });

});

function loadSelectedBrand() {
    console.log('load selected brand');
}
