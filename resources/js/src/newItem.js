import createItemElement from "./createItemElement";

/* Function to upload a new item */
export default function newItem(event, $itemsList) {
    event.preventDefault();

    const $form = event.target;
    const url = "/api/items/store";
    let headers = new Headers({'Accept': 'application/json'});
    let body = new FormData();
    let picture = $form.querySelector('input[name="picture"]').files[0];

    body.append('description', $form.querySelector('textarea[name="description"]').value);
    body.append('picture', picture);

    fetch(url, {
        method: 'POST',
        headers: headers,
        body: body
    })
    .then(
        function(response) {
            if (response.status === 201) {
                response.json().then(function(data) {
                    createItemElement($itemsList, data.item);
                    console.info('Item created successful');
                });
            } else {
                console.error('An error occurred');
            }
        });

    $('#newItemModal').modal('hide');

    return false;
}