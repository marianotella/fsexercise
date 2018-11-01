import updateItemElement from "./updateItemElement";

/* Function to update an existing item */
export default function updateItem(event, $itemsList) {
    event.preventDefault();

    const $form = event.target;
    const url = "/api/items/update/" + $form.querySelector('input[name="itemId"]').value;
    let headers = new Headers({'Accept': 'application/json'});
    let body = new FormData();
    let picture = $form.querySelector('input[name="picture"]').files[0];

    body.append('description', $form.querySelector('textarea[name="description"]').value);
    if (typeof picture !== 'undefined'){
        body.append('picture', picture);
    }

    fetch(url, {
        method: 'POST',
        headers: headers,
        body: body
    })
        .then(
            function(response) {
                if (response.status === 200) {
                    response.json().then(function(data) {
                        updateItemElement($itemsList, data.item);
                        console.info('Item updated successfully');
                    });
                } else {
                    console.error('An error occurred');
                }
        });

    $('#editItemModal').modal('hide');

    return false;
}