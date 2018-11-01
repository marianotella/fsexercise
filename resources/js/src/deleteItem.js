import $ from "jquery";
import removeItemElement from "./removeItemElement";

/* Function to delete an item */
export default function deleteItem(event, form) {
    event.preventDefault();

    const url = form.action;

    let headers = new Headers({'Accept': 'application/json'});

    fetch(url, {
        method: 'DELETE',
        headers: headers,
    })
        .then(
            function(response) {
                if (response.status === 200) {
                    response.json().then(function(data) {
                        removeItemElement(data.item);
                        console.info('Item deleted successfully');
                    });
                } else {
                    console.error('An error occurred');
                }
            }).then(function(data) {
        //document.getElementById("message").innerHTML = data.encoded;
    }).catch(function(error) {
        //document.getElementById("message").innerHTML = error.message;
    });

    $('#confirmPopup').modal('hide');

    return false;
}