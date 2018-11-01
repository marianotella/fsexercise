/* Function to reOrder items */
export default function reOrderItems(id, from, to) {
    event.preventDefault();

    const url = "/api/items/reorder";
    let headers = new Headers({'Accept': 'application/json'});
    let body = new FormData();

    body.append('id', id);
    body.append('from', from);
    body.append('to', to);

    fetch(url, {
        method: 'POST',
        headers: headers,
        body: body
    })
    .then(
        function(response) {
            if (response.status === 200) {
                response.json()
                    .then(function() {
                        console.info('Update order successfully');
                    });
            } else {
                console.error('An error occurred');
            }
        });

    $('#confirmPopup').modal('hide');

    return false;
}