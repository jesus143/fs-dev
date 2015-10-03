$(document).ready(function(){
    console.log('postalook.js loaded..');
    $('#cke_1_contents, #cke_1_top, #post-title-url, #postalook-agreement-and-rotate, #cke_editor1').click(function(){
        console.log('table container clicked');
        $('#autocomplete-dropdown-container-occasion-1, #autocomplete-dropdown-container-season-1').css('display', 'none');
    });
});