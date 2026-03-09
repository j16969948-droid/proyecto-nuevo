let cart = [];

/* listeners reactivos */
const listeners = [];

function notify() {
    listeners.forEach(cb => cb(cart));
}

/* persistencia */

function saveCart() {
    localStorage.setItem("lasso_cart", JSON.stringify(cart));
}

function loadCart() {

    const saved = localStorage.getItem("lasso_cart");

    if (saved) {
        cart = JSON.parse(saved);
    }
}

export function subscribe(callback) {
    listeners.push(callback);
}

export function getCartCount() {
    return cart.reduce((total, item) => total + item.qty, 0);
}

/* agregar */

window.addToCart = function (id, nombre, precio) {

    const item = cart.find(p => p.id === id);

    if (item) {
        item.qty++;
    } else {

        cart.push({
            id,
            nombre,
            precio,
            qty: 1
        });

    }

    saveCart();
    renderCart();
    notify();
}

/* aumentar */

window.increaseQty = function (id) {

    const item = cart.find(p => p.id === id);

    if (!item) return;

    item.qty++;

    saveCart();
    renderCart();
    notify();
}

/* disminuir */

window.decreaseQty = function (id) {

    const item = cart.find(p => p.id === id);

    if (!item) return;

    if (item.qty > 1) {
        item.qty--;
    } else {
        cart = cart.filter(p => p.id !== id);
    }

    saveCart();
    renderCart();
    notify();
}

/* render */

function renderCart() {

    const cartBar = document.getElementById("cartBar");
    const cartItems = document.getElementById("cartItems");
    const cartTotal = document.getElementById("cartTotal");

    if (!cartBar) return;

    if (cart.length === 0) {

        cartBar.classList.add("hidden");

        cartItems.innerHTML = "";
        cartTotal.innerText = "$0";

        return;
    }

    cartBar.classList.remove("hidden");

    cartItems.innerHTML = "";

    let total = 0;

    cart.forEach(item => {

        const subtotal = item.precio * item.qty;
        total += subtotal;

        const div = document.createElement("div");

        div.className =
            "bg-gray-100 rounded-xl px-4 py-3 flex items-center gap-4";

        div.innerHTML = `

        <div class="flex flex-col">

        <div class="font-semibold text-gray-800 text-sm">
        ${item.nombre}
        </div>

        <div class="text-xs text-gray-400">
        Streaming
        </div>

        </div>

        <div class="flex items-center gap-3 bg-gray-100 px-3 py-1 rounded-lg">

        <button onclick="decreaseQty(${item.id})"
        class="w-7 h-7 flex items-center justify-center rounded-md bg-white border hover:bg-gray-200 transition font-bold">
        -
        </button>

        <span class="w-6 text-center font-semibold text-gray-700">
        ${item.qty}
        </span>

        <button onclick="increaseQty(${item.id})"
        class="w-7 h-7 flex items-center justify-center rounded-md bg-white border hover:bg-gray-200 transition font-bold">
        +
        </button>

        </div>

        <div class="font-bold text-indigo-600 text-sm">
        $${subtotal.toLocaleString()}
        </div>

        `;

        cartItems.appendChild(div);

    });

    cartTotal.innerText = "$" + total.toLocaleString();
}

/* cargar carrito al iniciar */

document.addEventListener("DOMContentLoaded", () => {

    loadCart();

    renderCart();

    notify();

});
