document.addEventListener('DOMContentLoaded', function() {
  var removeCartButtons = document.querySelectorAll(".btn.btn-danger.btn-sm");
  console.log("Remove buttons found:", removeCartButtons);

  removeCartButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      // Use this.closest() to locate the parent element with class "cart-row"
      var cartRow = this.closest('.cart-row');
      if (cartRow) {
        console.log("Removing cart row:", cartRow);
        cartRow.remove();
      } else {
        console.error("cart-row not found for the clicked remove button", this);
      }
      updateCartTotal();
      updatePaymentSummary();
    });
  });
});



function updateCartTotal() {
    var cartRows = document.getElementsByClassName("cart-row");
    var overallTotal = 0;
    var  TotalPrice = 0;
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
  
}
function updatePaymentSummary() {
  var cartRows = document.getElementsByClassName("cart-row");
  var overallTotal = 0;

  // Loop through each cart row to sum the updated row totals.
  for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i];
      var priceCols = cartRow.getElementsByClassName("col-price");
      if (priceCols.length === 0) continue;
      var pElements = priceCols[0].getElementsByTagName("p");
      if (pElements.length === 0) continue;
      // Assuming your original code updates the price in the first <p>
      var priceText = pElements[0].innerText;
      var rowTotal = parseFloat(priceText.replace("$", ""));
      if (!isNaN(rowTotal)) {
          overallTotal += rowTotal;
      }
  }

  // Example tax calculation (using a 10% tax rate here)
  var taxRate = 0.1;
  var taxAmount = overallTotal * taxRate;
  var finalTotal = overallTotal + taxAmount;

  // Update the payment summary section.
  // Your HTML has three .price-row divs inside the payment container:
  //   1. Subtotal row
  //   2. Tax row
  //   3. Total row
  var summaryRows = document.querySelectorAll(".payment-col.right .price-row");
  if (summaryRows.length >= 3) {
      // Update Subtotal (first row, second <p> element)
      var subtotalP = summaryRows[0].getElementsByTagName("p")[1];
      subtotalP.innerText = "$" + overallTotal.toFixed(2);

      // Update Tax (second row, second <p> element)
      var taxP = summaryRows[1].getElementsByTagName("p")[1];
      taxP.innerText = "$" + taxAmount.toFixed(2);

      // Update Total (third row, second <p> element)
      var totalP = summaryRows[2].getElementsByTagName("p")[1];
      totalP.innerText = "$" + finalTotal.toFixed(2);
  }
  var checkoutTotalEl = document.getElementById("checkout-total");
  if (checkoutTotalEl) {
    checkoutTotalEl.innerText = "$" + finalTotal.toFixed(2);
  }
}