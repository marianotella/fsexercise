import itemTemplate from "./itemTemplate";

export default function createItemElement($itemsList, item){
    const HTMLString = itemTemplate(item);
    const itemElement = createTemplate(HTMLString);
    let $itemElement = document.getElementById(item._id);

    $itemsList.replaceChild(itemElement, $itemElement);
}

function createTemplate(HTMLString){
    const html = document.implementation.createHTMLDocument();
    html.body.innerHTML = HTMLString;
    return html.body.children[0];
}