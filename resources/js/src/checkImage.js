export default function checkImage(e){
    let fr = new FileReader;
    let errors = '';

    fr.onload = function() {
        let img = new Image;

        img.onload = function() {
            if (img.height !== 350 && img.width !== 350){
                errors += ' Incorrect size, size must be 350px x 350px';
            }

            if (errors){
                error(errors);
            }
        };

        img.src = fr.result; // is the data URL because called with readAsDataURL

        let extension = this.result.substring("data:image/".length, img.src.indexOf(";base64"));
        let extensions = ["jpg", "jpeg", "gif", "png"];

        if (extensions.indexOf(extension) < 0) {
            error('Invalid file type');
        }
    };

    fr.readAsDataURL(this.files[0]);

    function error(str){
        alert(str);

        e.srcElement.value = '';
    }
}