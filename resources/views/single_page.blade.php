<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FS Exercise</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md m-4 text-sm-center">
                    <h1 class="float-left">FS Exercise</h1>
                    <button type="button" class="btn btn-primary float-md-right mt-1" data-toggle="modal" data-target="#newItemModal">
                        Upload new item
                    </button>
                </div>
            </div>

            <div id="items" class="row mx-3">
                <div id="items-list" class="list-group">
                </div>
            </div>
        </div>

        <!-- New Item Modal -->
        <div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="create-form" action="#" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="picture">Upload Picture</label>
                                <input type="file" id="picture" name="picture" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description <small>min 10 characters - max 300 characters</small></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                            <button id="uploadItem" class="btn btn-primary" type="submit">Upload Item</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="update-form" action="#" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="itemId">
                            <div class="form-group">
                                <h4>Actual Picture</h4>
                                <img id="actualPicture" src="" alt="">
                            </div>
                            <div class="form-group">
                                <label for="editPicture">Upload New Picture</label>
                                <input type="file" id="editPicture" name="picture">
                            </div>
                            <div class="form-group">
                                <label for="editDescription">Description <small>min 10 characters - max 300 characters</small></label>
                                <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer float-left">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                            <button id="updateItem" class="btn btn-primary" type="submit">Update Item</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Confirm Modal -->
        <div class="modal fade" id="confirmPopup" role="dialog" aria-labelledby="confirmLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Alert!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" id="confirm">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="/js/app.js"></script>
</html>
