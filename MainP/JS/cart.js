document.addEventListener('DOMContentLoaded', function() {
  setupRemoveButtons();
});

// Function to set up Remove buttons
function setupRemoveButtons() {
  const removeButtons = document.querySelectorAll(".btn.btn-danger.btn-sm");

  removeButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          const cartRow = this.closest('.cart-row');

          // Find the book title of the row to delete
          const bookTitle = cartRow.querySelector('.book-title').innerText.trim();
          const bookAuthor = cartRow.querySelector('.book-author').innerText.trim();

          let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

          // Remove from cartItems array based on title + author
          cartItems = cartItems.filter(item => !(item.title === bookTitle && item.author === bookAuthor));

          // Save updated cart
          localStorage.setItem('cartItems', JSON.stringify(cartItems));

          // Remove visually from screen
          cartRow.remove();

          // Update cart totals
          updateCartTotal();
          updatePaymentSummary();
      });
  });
}

// Your original functions
function updateCartTotal() {
  var cartRows = document.getElementsByClassName("cart-row");
  var overallTotal = 0;
  for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i];
      var priceCols = cartRow.getElementsByClassName("col-price");
      if (priceCols.length === 0) continue;
      var pricePElements = priceCols[0].getElementsByTagName("p");
      if (pricePElements.length === 0) continue;
      var priceP = pricePElements[0];

      var unitPrice = parseFloat(priceP.getAttribute("data-unitprice"));
      if (isNaN(unitPrice)) {
          unitPrice = parseFloat(priceP.innerText.replace("$", "").trim());
      }

      var quantityCols = cartRow.getElementsByClassName("col-quantity");
      if (quantityCols.length === 0) continue;
      var inputs = quantityCols[0].getElementsByTagName("input");
      if (inputs.length === 0) continue;
      var quantityInput = inputs[0];
      var quantity = parseInt(quantityInput.value, 10);

      var rowTotal = unitPrice * quantity;
      overallTotal += rowTotal;
      priceP.innerText = "$" + rowTotal.toFixed(2);
  }
}

function updatePaymentSummary() {
  var cartRows = document.getElementsByClassName("cart-row");
  var overallTotal = 0;

  for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i];
      var priceCols = cartRow.getElementsByClassName("col-price");
      if (priceCols.length === 0) continue;
      var pElements = priceCols[0].getElementsByTagName("p");
      if (pElements.length === 0) continue;
      var priceText = pElements[0].innerText;
      var rowTotal = parseFloat(priceText.replace("$", ""));
      if (!isNaN(rowTotal)) {
          overallTotal += rowTotal;
      }
  }

  var taxRate = 0.1;
  var taxAmount = overallTotal * taxRate;
  var finalTotal = overallTotal + taxAmount;

  document.getElementById("subtotal-amount").innerText = "$" + overallTotal.toFixed(2);
  document.getElementById("tax-amount").innerText = "$" + taxAmount.toFixed(2);
  document.getElementById("total-amount").innerText = "$" + finalTotal.toFixed(2);
  
  const checkoutTotal = document.getElementById("checkout-total");
  if (checkoutTotal) {
      checkoutTotal.innerText = "$" + finalTotal.toFixed(2);
  }
  

  var checkoutTotalEl = document.getElementById("checkout-total");
  if (checkoutTotalEl) {
      checkoutTotalEl.innerText = "$" + finalTotal.toFixed(2);
  }

  const summarySection = document.querySelector('.payment-col.right');
summarySection.classList.remove('invisible-on-load');
summarySection.classList.add('visible-now');


}
