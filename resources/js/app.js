/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import deleteItem from "./src/deleteItem";

require('./bootstrap');

// Register $ global var for jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

const $itemsList = document.getElementById('items-list');

import loadItems from './src/loadItems';
import updateItem from "./src/updateItem";
import newItem from './src/newItem';
import reOrderItems from "./src/reOrderItems";
import checkImage from "./src/checkImage";
import checkDescription from "./src/checkDescription";

import sortable from "sortablejs";

/* Load all items stored in database */
loadItems($itemsList);

/* Event listener to create item */
document.getElementById('create-form').addEventListener('submit', function(e){
    newItem(e, $itemsList);
}, true);

/* Event listener to update item */
document.getElementById('update-form').addEventListener('submit', function(e){
    updateItem(e, $itemsList);
}, true);

sortable.create($itemsList, {
    // Element dragging start
    onStart: function (/**Event*/evt) {
        document.body.classList.remove('drag-finish');
        document.body.classList.add('drag-start');
    },
    // Element dragging ended
    onEnd: function (/**Event*/evt) {
        let itemEl = evt.item;  // dragged HTMLElement
        let itemId = itemEl.id;
        let from = evt.oldIndex;  // element's old index within old parent
        let to = evt.newIndex;  // element's new index within new parent

        reOrderItems(itemId, from, to);
        document.body.classList.add('drag-finish');
        document.body.classList.remove('drag-start');
    },
});

document.querySelector('#newItemModal input[name="picture"]').onchange = checkImage;
document.querySelector('#newItemModal textarea[name="description"]').onblur = checkDescription;

document.querySelector('#editItemModal input[name="picture"]').onchange = checkImage;
document.querySelector('#editItemModal textarea[name="description"]').onblur = checkDescription;

/* Create Item Modal */
const $createModal = $('#newItemModal');

$createModal.on('show.bs.modal', function (e) {
    let $form = this.querySelector('form');
    $form.reset();
});

/* Update Item Modal */
const $updateModal = $('#editItemModal');

$updateModal.on('show.bs.modal', function (e) {
    let $form = this.querySelector('form');
    $form.reset();

    let $id = this.querySelector('input[name="itemId"]');
    let $actualPicture = this.querySelector('#actualPicture');
    let $description = this.querySelector('textarea[name="description"]');

    let item = $(e.relatedTarget).data('item');

    $id.value = item._id;
    $actualPicture.setAttribute('src', item.picture);
    $actualPicture.style.width = '200px';

    $description.value = item.description;
});

/* Confirm Modal to delete item*/
const $confirmPopup = $('#confirmPopup');

$confirmPopup.on('show.bs.modal', function (e) {
    let $form = $(e.relatedTarget).closest('form');

    $(this).find('.modal-footer #confirm').data('form', $form);
});

/* Delete item if popup is confirmed */
$confirmPopup.find('.modal-footer #confirm').on('click', function(e){
    deleteItem(e, $(this).data('form')[0]);
});