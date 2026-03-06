import './bootstrap';
import './store/cart.js';

import { initCartCounter } from './components/cartCounter';

document.addEventListener("DOMContentLoaded", () => {

    initCartCounter();

});