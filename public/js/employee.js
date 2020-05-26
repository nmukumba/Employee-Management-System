Webcam.set({
    width: 320,
    height: 240,
    crop_width: 240,
    crop_height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
});

Webcam.attach( '#my_camera' );

function take_snapshot() {
    Webcam.snap( function(data_uri) {
        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        //console.log($('#image').val());
        $("#image").val(data_uri);
        //document.getElementById('image').value = raw_image_data;
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
}