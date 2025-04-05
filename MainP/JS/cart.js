var removeCartButton = document.getElementsByClassName("btn btn-danger btn-sm")
console.log(removeCartButton)
for( var i = 0; i< removeCartButton.length; i++){
    var button = removeCartButton[i]
    button.addEventListener('click', function(event){
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.remove()
        updateCartTotal()
    })
}

function updateCartTotal() {
    var cartRows = document.getElementsByClassName("cart-row");
    var overallTotal = 0;
  
    for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i];
  
      // Get the price cell
      var priceCols = cartRow.getElementsByClassName("col-price");
      if (priceCols.length === 0) continue;
      var pricePElements = priceCols[0].getElementsByTagName("p");
      if (pricePElements.length === 0) continue;
      var priceP = pricePElements[0];
  
      // Get the unit price from a data attribute
      var unitPrice = parseFloat(priceP.getAttribute("data-unitprice"));
      if (isNaN(unitPrice)) {
        // Fallback: extract from the text (not recommended if text is updated later)
        unitPrice = parseFloat(priceP.innerText.replace("$", "").trim());
      }
  
      // Get the quantity input
      var quantityCols = cartRow.getElementsByClassName("col-quantity");
      if (quantityCols.length === 0) continue;
      var inputs = quantityCols[0].getElementsByTagName("input");
      if (inputs.length === 0) continue;
      var quantityInput = inputs[0];
      var quantity = parseInt(quantityInput.value, 10);
  
      // Calculate row total and update the price cell
      var rowTotal = unitPrice * quantity;
      overallTotal += rowTotal;
      priceP.innerText = "$" + rowTotal.toFixed(2);
    }
  
    // Optionally, update an overall total display if needed.
    console.log("Overall total: $" + overallTotal.toFixed(2));
  }
  

