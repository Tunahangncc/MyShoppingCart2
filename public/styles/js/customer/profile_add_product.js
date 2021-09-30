function readURL(input){
    if(input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
                .width(128)
                .height(128);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
