@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h2 class="menu-section-title">Our Menu</h2>
<!-- <div class="row row-cols-1 row-cols-md-4 g-4 menu-section">
    @foreach($foods as $food)
        <div class="col">
            <div class="text-center">
                <img src="{{ asset('storage/' . $food->img_path) }}" class="menu-img mb-3" alt="{{ $food->name }}">
                <h5>{{ $food->name }}</h5>
                <p>{{ $food->description }}</p>
                <p>{{ $food->category ? $food->category->name : 'N/A' }}</p>
                <p class="text-danger">${{ number_format($food->price, 2) }}</p>
                <p><input type="number" class="form-control quantity" min="0" value="0"></p>
                <p><button class="btn btn-danger add-to-cart">Add to Cart</button></p>
            </div>
        </div>
    @endforeach
</div> -->


@if($activeOrder)
    <div class="alert alert-info">
        @if($activeOrder->status == 'placed')
            You placed an order! Items:
            <ul>
                @foreach($activeOrder->items as $item)
                    <li>{{ $item->name }} (x{{ $item->pivot->quantity }})</li>
                @endforeach
            </ul>
            Status: <strong>Waiting for kitchen</strong>
        @elseif($activeOrder->status == 'prepared')
            Your order is being prepared. Please wait...
        @elseif($activeOrder->status == 'paid')
            Order completed! Thank you 🥳
        @endif
    </div>
@endif



@foreach($categories as $category)
    <h2 class="menu-section-title">{{ $category->name }}</h2>

    <div class="row row-cols-1 row-cols-md-4 g-4 menu-section">
        @foreach($category->foods as $food)
            <div class="col">
                <div class="text-center">
                    <!-- <img src="{{ asset(str_replace('public/', '', $food->img_path)) }}" class="menu-img mb-3" alt="{{ $food->name }}"> -->
                    <!-- <img src="{{ asset($food->img_path) }}" class="menu-img mb-3" alt="{{ $food->name }}"> -->
                    <img src="{{ asset('storage/' . $food->img_path) }}" class="menu-img mb-3" alt="{{ $food->name }}">
                    <h5>{{ $food->name }}</h5>
                    <p>{{ $food->description }}</p>
                    <p class="text-danger">${{ number_format($food->price, 2) }}</p>
                    <p><input type="number" class="form-control quantity" min="0" value="0"></p>
                    <p><button class="btn btn-danger add-to-cart">Add to Cart</button></p>
                </div>
            </div>
        @endforeach
    </div>
@endforeach





<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ route('orders.store') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody id="cart-items"></tbody>
          <tfoot>
            <tr>
              <th colspan="2">Total</th>
              <th id="cart-total">$0.00</th>
            </tr>
          </tfoot>
        </table>

        <div class="mb-3">
          <label for="table_id">Table ID</label>
          <input type="text" name="table_id" class="form-control" required placeholder="Enter table ID">
        </div>

        <input type="hidden" name="cart_data" id="cart-data">
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Confirm Order</button>
      </div>
    </form>
  </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    </section>

    @endsection

    <script src="{{ asset('js/cart.js') }}"></script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    let cart = [];

    function updateCartDisplay() {
        // Update cart icon count
        const cartCountEl = document.getElementById('cart-count');
        cartCountEl.textContent = cart.reduce((total, item) => total + item.qty, 0);

        // Update modal table body
        const cartItemsEl = document.getElementById('cart-items');
        cartItemsEl.innerHTML = ''; // Clear previous

        let total = 0;

        cart.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>${item.qty}</td>
                <td>$${(item.price * item.qty).toFixed(2)}</td>
            `;
            cartItemsEl.appendChild(row);

            total += item.price * item.qty;
        });

        // Update total price
        const totalEl = document.getElementById('cart-total');
        totalEl.textContent = '$' + total.toFixed(2);

        // Update hidden input for form submission
        const cartDataInput = document.getElementById('cart-data');
        cartDataInput.value = JSON.stringify(cart);
    }

    document.querySelectorAll('.add-to-cart').forEach(function (button) {
        button.addEventListener('click', function () {
            const container = button.closest('.text-center');
            const itemName = container.querySelector('h5').innerText;
            const priceText = container.querySelector('.text-danger').innerText;
            const price = parseFloat(priceText.replace('$', ''));
            const quantityInput = container.querySelector('.quantity');
            const quantity = parseInt(quantityInput.value);

            if (quantity > 0) {
                const existingItem = cart.find(item => item.name === itemName);
                if (existingItem) {
                    existingItem.qty += quantity;
                } else {
                    cart.push({ name: itemName, price: price, qty: quantity });
                }

                quantityInput.value = 0;

                updateCartDisplay();
                alert(itemName + ' added to cart!');
            } else {
                alert('Please select a valid quantity');
            }
        });
    });

    // Optional: if you want to show the modal after click on cart icon
    const cartIcon = document.getElementById('cart-icon');
    if (cartIcon) {
        cartIcon.addEventListener('click', function () {
            const modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        });
    }
});
</script>

