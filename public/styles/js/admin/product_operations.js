function readURL(input){
    if(input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
                .width(130)
                .height(130);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
