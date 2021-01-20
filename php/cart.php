<!DOCTYPE html>
<html>
<head>
<script src="../js/cart.js"></script>
<link rel="stylesheet" href="../css/cart.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h1 class="title">Shopping Cart</h1><br/>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="../photos/idli.jfif">
    </div>
    <div class="product-title">Idli</div>
    <div class="product-price">&#8377 80</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-total">&#8377 160</div>
  </div>
  <div class="product">
    <div class="product-image">
      <img src="../photos/dish.jpg">
    </div>
    <div class="product-title">Alfredo Pasta</div>
      
    <div class="product-price">&#8377 250</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-total">&#8377 250</div>
  </div>

  <div class="totals">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">&#8377 410</div>
  </div>
  <div class="checkout"> 
   <button class="checkout-btn">Checkout</button>
  </div>

</div>
</body>
</html>