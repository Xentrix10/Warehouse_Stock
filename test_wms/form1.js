if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){

    var removeOrderItemButtons = document.getElementsByClassName('btn-remove')
    for(var i=0; i < removeOrderItemButtons.length; i++) {
        var button = removeOrderItemButtons[i];
        button.addEventListener('click', removeorderItem)
    }

    var addOrderItemButtons = document.getElementsByClassName('btn-add')
    for(var i = 0; i < addOrderItemButtons.length; i++) {
        var Addbutton = addOrderItemButtons[i];
        Addbutton.addEventListener('click', addOrderItem)
    }

    var quantityInputs = document.getElementsByClassName('order-quantity-input')
    for(var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', itemQuantityChange)
    }
    updateCartTotal()

    document.getElementsByClassName('btn-order')[0].addEventListener('click', orderSubmitClicked)


}

//Order Submit Button Clicked
function orderSubmitClicked() {
    alert('Thank you for your purchase.')

}

function removeorderItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal();
}

function addOrderItem(event) {
    
    var button = event.target
    var orderItem = button.parentElement.parentElement
    var productTitle = orderItem.getElementsByClassName('product-title')[0].innerText
    var productQuantity = orderItem.getElementsByClassName('product-quantity')[0].value
    addItemToOrder(productTitle, productQuantity)

}

function addItemToOrder(productTitle, productQuantity) {
    
    var orderRow = document.createElement('div')
    orderRow.classList.add('order-row')
    var cartItems = document.getElementsByClassName('cartItems')[0]
    var cartItemsNames = cartItems.getElementsByClassName('orderProductTitle')
    var q = cartItemsNames.length
    var w = parseInt(q)
    for(var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].value == productTitle) {
            alert('This product has already been added to the cart.')
            
            return 
        }
    }
    var orderRowContents = `
    <input type="text" class="orderProductTitle" name = "orderProduct[]" id = "orderProduct${w}" value="${productTitle}">
    <input class="order-quantity-input" min="1" max="9999" type="number" name="orderQuantity[]" id = "orderQuantity${w}" value="${productQuantity}" placeholder="Quantity">   
    <button class="btn-remove">REMOVE</button>
    `
    orderRow.innerHTML = orderRowContents
    cartItems.append(orderRow)
    

    orderRow.getElementsByClassName('btn-remove')[0].addEventListener('click', removeorderItem)
    orderRow.getElementsByClassName('order-quantity-input')[0].addEventListener('change', itemQuantityChange)
   updateCartTotal(); 
}

function updateCartTotal(){
    var cartItems = document.getElementsByClassName('cartItems')[0]
    var cartItemsNames = cartItems.getElementsByClassName('orderProductTitle')
    var qTotal = cartItemsNames.length
    var total = parseInt(qTotal)

    var totalProductsOrdered = document.getElementsByClassName('total-order-items')[0]
    
    totalProductsOrdered.value = total
}

function itemQuantityChange(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }

}

//For searching items in search bar and filtering
function searchTable(){
    var inputValue, filter, table, tr, td, i, txtValue , th;

    inputValue = document.getElementById("myInput"); //This is the search bar id
    filter = inputValue.value.toUpperCase(); //to perform a non case-sensitive search
    table = document.getElementById("ProductTable"); //This is the table with products
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for(i=0;i<th.length;i++) {
        th[i].style.display = "none";
    }
    

    //Looping through all the table rows and hiding all which dont match the search query
    for(i=0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; //getting all the table data items one by one
        if(td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                
                
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
