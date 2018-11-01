import createItemElement from "./createItemElement";

function orderItems(a,b) {
    if (a.order < b.order)
        return -1;
    if (a.order > b.order)
        return 1;
    return 0;
}

export default function loadItems($itemsList){
    fetch('/api/items', {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    })
    .then(
        function(response) {
            if (response.status === 200) {
                response.json()
                    .then(function(data) {
                        data.items.sort(orderItems).forEach(item => {
                            createItemElement($itemsList, item);
                            console.info('Items loaded successfully');
                        });
                    })
            }else{
                console.error('An error occurred');
            }
        }
    );
}