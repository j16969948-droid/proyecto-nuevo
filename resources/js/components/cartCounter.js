import { subscribe, getCartCount } from "../store/cart"

export function initCartCounter() {

    const counter = document.getElementById("cart-count")

    if (!counter) return

    function update() {

        const count = getCartCount()

        counter.innerText = count

        if (count === 0) {
            counter.classList.add("hidden")
        } else {
            counter.classList.remove("hidden")
        }
    }

    subscribe(update)

    update()
}