if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
function ready(){
    var removeItemsBtn = document.getElementsByClassName('btn-remove')
    for(var i = 0; i < removeItemsBtn.length; i++){
        var button = removeItemsBtn[i]
        button.addEventListener('click', removeOrderItem)
    }
    

    var addItemsBtn = document.getElementsByClassName('add')
    for(var i =0; i < addItemsBtn.length; i++){
        var button = addItemsBtn[i]
        button.addEventListener('click', addOrderItem)
    }

    
}



function addOrderItem(event){
    var button = event.target
    var orderItem = button.parentElement
    var itemName = orderItem.getElementsByClassName('item-title')[0].innerText
    var itemQuantity = orderItem.getElementsByClassName('item-quantity')[0].value
    addToOrder(itemName , itemQuantity)
}

function addToOrder(itemName, itemQuantity){
    var itemRow = document.createElement('div')
    itemRow.classList.add('order-item')
    var orderForm = document.getElementsByClassName('order-form-f')[0]
    var orderItemNames = orderForm.getElementsByClassName('item')
    for (var i = 0; i < orderItemNames.length; i++) {
        if(orderItemNames[i].innerText == itemName) {
            alert('This item is already added to the order')
            return
        }
    }
    var orderRowContents = `
        <input type="text" name="item" class="item" value="${itemName}">
        <input type="number" max="1000" min="0" name="quantity" class="quantity" value="${itemQuantity}">
        <input class="btn-remove" type="button" value="REMOVE">
    `
    itemRow.innerHTML = orderRowContents
    orderForm.append(itemRow)
    itemRow.getElementsByClassName('btn-remove')[0].addEventListener('click', removeOrderItem)

}

function removeOrderItem(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.remove()
}

