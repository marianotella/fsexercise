export default function itemTemplate(item){
    return (
        `<div id="${item._id}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="row">
                <div class="col-md text-center m-3">
                    <img src="${item.picture}" width="200px">
                </div>
                <div class="col-md text-center m-3">
                    <p class="p-2">${item.description}</p>
                </div>
                <div class="col-md  text-center text-md-right m-3">
                    <button class="btn btn-success btn-sm d-inline-block"
                        type="button" 
                        data-toggle="modal"
                        data-item='${JSON.stringify(item)}'
                        data-target="#editItemModal">
                        Edit item
                    </button>
                    <form class="delete-form d-inline-block" action="/api/items/destroy/${item._id}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger d-inline-flex"
                            type="button"
                            data-toggle="modal"
                            data-target="#confirmPopup">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>`
    );
}