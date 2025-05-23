<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image/png" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Global Styles -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Cart Page Styles -->
  <link rel="stylesheet" href="../CSS/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
        integrity="sha512-yHhbHhqJl9owqMxg2q7+Qx/XfXUoiVnq0l6v6JZ2Q4eUT7Y7+/2LZYzOw6QqF5q5cSKIYhK1jQBJbg2cJp+h5g==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src ="../JS/cart.js" async></script>
</head>
<body>

<!-- Header and Navigation -->
<?php include "header.php" ?>

<!-- Main Content -->
<section class="h-100 h-custom cart-section">
  <div class="container-fluid h-100 py-5">
    <div class="row h-100">
      <div class="col-12">
        
        

        <div class="cart-table">
          <!-- Header Row -->
          <div class="cart-row header">
            <div class="cart-col col-product">Shopping Cart</div>
            <div class="cart-col col-format">Format</div>
            <div class="cart-col col-quantity">Quantity</div>
            <div class="cart-col col-price">Price</div>
            <div class="cart-col col-remove">Remove</div>
          </div>
          
          <!-- Row 1 -->
          <div class="cart-row">
            <div class="cart-col col-product">
              <div class="d-flex align-items-center">
                <img src="https://i.imgur.com/2DsA49b.webp" class="img-fluid" alt="Book">
                <div class="ms-4 d-flex flex-column justify-content-center">
                  <span class="book-title">Thinking, Fast and Slow</span>
                  <span class="book-author">Daniel Kahneman</span>
                </div>
              </div>
            </div>
            <div class="cart-col col-format">
              <p class="mb-0" style="font-weight: 500;">Digital</p>
            </div>
            <div class="cart-col col-quantity">
              <div class="d-flex flex-row">
                <button class="btn btn-link px-2" title="Decrease quantity" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); updateCartTotal();">
                  <i class="fas fa-minus"></i>
                </button>
                <input min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" title="Enter quantity" placeholder="Quantity" onchange="updateCartTotal();">
                <button class="btn btn-link px-2" title="Increase quantity" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); updateCartTotal();">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="cart-col col-price">
              <p class="mb-0" style="font-weight: 500;" data-unitprice="9.99">$9.99</p>
            </div>
            <div class="cart-col col-remove">
              <button class="btn btn-danger btn-sm">Remove</button>
            </div>
          </div>
          <div class="cart-row">
            <div class="cart-col col-product">
              <div class="d-flex align-items-center">
                <img src="https://i.imgur.com/2DsA49b.webp" class="img-fluid" alt="Book">
                <div class="ms-4 d-flex flex-column justify-content-center">
                  <span class="book-title">Thinking, Fast and Slow</span>
                  <span class="book-author">Daniel Kahneman</span>
                </div>
              </div>
            </div>
            <div class="cart-col col-format">
              <p class="mb-0" style="font-weight: 500;">Paperback</p>
            </div>
            <div class="cart-col col-quantity">
              <div class="d-flex flex-row">
                <button class="btn btn-link px-2" title="Decrease quantity" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); updateCartTotal();">
                  <i class="fas fa-minus"></i>
                </button>
                <input min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" title="Enter quantity" placeholder="Quantity" onchange="updateCartTotal();">
                <button class="btn btn-link px-2" title="Increase quantity" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); updateCartTotal();">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="cart-col col-price">
              <p class="mb-0" style="font-weight: 500;" data-unitprice="10.99">$10.99</p>
            </div>
            <div class="cart-col col-remove">
              <button class="btn btn-danger btn-sm">Remove</button>
            </div>
          </div>
          <!-- Repeat rows as needed -->
        </div>
        

        <!-- PAYMENT CARD SECTION -->
        <div class="card mx-auto shadow-2-strong mb-5" style="width: 100%; border-radius: 16px;">
          <div class="card-body p-4">
            <div class="payment-row">
              
              <!-- LEFT COLUMN: Payment Options -->
              <div class="payment-col left">
                <form>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="paymentOption" id="radioCard" value="card" checked title="Select Credit Card as payment option" />
                      <label for="radioCard" class="visually-hidden">Credit Card</label>
                    </div>
                    <div class="rounded border w-100 p-3 payment-option-box">
                      <p class="d-flex align-items-center mb-0">
                        <img src="icons/mastercard.png" alt="Mastercard" style="width: 2em; height: auto; padding-right: 0.5rem;">
                        Credit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="paymentOption" id="radioDebit" value="debit" title="Select Debit Card as payment option" />
                      <label for="radioDebit" class="visually-hidden">Debit Card</label>
                    </div>
                    <div class="rounded border w-100 p-3 payment-option-box">
                      <p class="d-flex align-items-center mb-0">
                        <img src="icons/visa.png" alt="Visa Card" style="width: 2em; height: auto; padding-right: 0.5rem;">
                        Debit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="paymentOption" id="radioPayPal" value="paypal" title="Select PayPal as payment option" />
                      <label for="radioPayPal" class="visually-hidden">PayPal</label>
                    </div>
                    <div class="rounded border w-100 p-3 payment-option-box">
                      <p class="d-flex align-items-center mb-0">
                        <img src="icons/paypal.png" alt="Paypal" style="width: 2em; height: auto; padding-right: 0.5rem;">
                        PayPal
                      </p>
                    </div>
                  </div>
                </form>
              </div>
              
              <!-- MIDDLE COLUMN: Payment Form -->
              <div class="payment-col middle">
                <!-- Row 1: Name & Card Number side by side -->
                <div class="form-row">
                  <div class="form-group half">
                    <label for="typeName">Name on card</label>
                    <input type="text" id="typeName" class="bigger-box" placeholder="John Smith">
                  </div>
                  <div class="form-group half">
                    <label for="typeText">Card Number</label>
                    <input type="text" id="typeText" class="bigger-box" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19">
                  </div>
                </div>
                <!-- Row 2: Expiration & CVV side by side -->
                <div class="form-row">
                  <div class="form-group half">
                    <label for="typeExp">Expiration</label>
                    <input type="text" id="typeExp" class="bigger-box" placeholder="MM/YY" minlength="7" maxlength="7">
                  </div>
                  <div class="form-group half">
                    <label for="typeCvv">CVV</label>
                    <input type="password" id="typeCvv" class="bigger-box" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
                  </div>
                </div>
              </div>
              
             <!-- RIGHT COLUMN: Totals -->
<div class="payment-col right">
  <div class="price-row d-flex justify-content-between font-weight-500">
    <p class="mb-2">Subtotal:</p>
    <p class="mb-2">$23.49</p>
  </div>
  <div class="price-row d-flex justify-content-between font-weight-500">
    <p class="mb-0">Tax:</p>
    <p class="mb-0">$2.99</p>
  </div>
  <hr class="my-4">
  <div class="price-row d-flex justify-content-between mb-4">
    <p class="mb-2">Total:</p>
    <p class="mb-2">$26.48</p>
  </div>
  <button type="button" class="btn btn-primary btn-block btn-lg">
    <div class="d-flex justify-content-between">
      <span>Checkout</span>
      <span>$26.48</span>
    </div>
  </button>
</div>

              
            </div><!-- end .payment-row -->
          </div><!-- end .card-body -->
        </div><!-- end .card -->
        <!-- END PAYMENT CARD SECTION -->
        
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 SMU Library</p>
</footer>

<!-- External JavaScript -->
</body>
</html>
