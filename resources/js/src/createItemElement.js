import itemTemplate from "./itemTemplate";

export default function createItemElement($itemsList, item){
    const HTMLString = itemTemplate(item);
    const itemElement = createTemplate(HTMLString);

    $itemsList.append(itemElement);
}

function createTemplate(HTMLString){
    const html = document.implementation.createHTMLDocument();
    html.body.innerHTML = HTMLString;
    return html.body.children[0];
}
