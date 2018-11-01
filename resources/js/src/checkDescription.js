export default function checkDescription(e){
    if (e.srcElement.value.length > 300){
        alert('Maximum allowed size: 300 characters');
        e.srcElement.value = '';
    }
}