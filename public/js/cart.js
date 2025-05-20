// document.addEventListener('DOMContentLoaded', function () {
//     let cart = [];


//     function updateCartDisplay() {
//     // For demonstration, update a count on the cart icon.
//     const cartCountEl = document.getElementById('cart-count');
//     cartCountEl.textContent = cart.reduce((total, item) => total + item.qty, 0);
//     // You can expand this function to render cart details in a modal, etc.
// }


//     document.querySelectorAll('.add-to-cart').forEach(function (button) {
//     button.addEventListener('click', function () {
//         const container = button.closest('.text-center');
//         const itemName = container.querySelector('h5').innerText;
//         const priceText = container.querySelector('.text-danger').innerText;
//         const price = parseFloat(priceText.replace('$', ''));
//         const quantityInput = container.querySelector('.quantity');
//         const quantity = parseInt(quantityInput.value);


//         if (quantity > 0) {
//             // Check if the item already exists in the cart
//             const existingItem = cart.find(item => item.name === itemName);
//             if (existingItem) {
//                 existingItem.qty += quantity;
//             } else {
//                 cart.push({ name: itemName, price: price, qty: quantity });
//             }
//             // Optionally, reset the quantity input
//             quantityInput.value = 0;

//             // Update cart icon/count display
//             updateCartDisplay();
//             alert(itemName + ' added to cart!');
//         } else {
//             alert('Please select a valid quantityhhhh');
//         }
//     });
// });
// });