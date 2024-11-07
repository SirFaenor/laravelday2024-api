/**
 * Agendo sulla quantità di una voce, aggiorno il subtotale
 * della voce stessa e il totale del carrello
 */
const totalElement = document.querySelector('.cart-total');
const formatter = new Intl.NumberFormat('en-EN', {
    style: 'decimal',
    maximumFractionDigits: 2,
    minimumFractionDigits: 2,
});

document.querySelectorAll('.quantity-input').forEach(item => {
    item.addEventListener('change', function() {
        
        /**
         * Calcola subtotale
         */
        const quantity = parseInt(item.value);
        const price = parseFloat(item.dataset.price);
        const subtotal = formatter.format(quantity * price);
        
        /**
         * valorizza il campo subtotale
         */
        const subtotalElement = item.closest('.cart-item').querySelector('.subtotal');
        subtotalElement.value = subtotal;
        
        
        /**
         * aggiorna totale del carrello
         */
        let cartTotal = 0;
        document.querySelectorAll('.subtotal').forEach(element => {
            let value = parseFloat(element.value);
            if (isNaN(value)) {
                value = 0;
            }

            cartTotal += parseFloat(value);
        });

        // output
        console.log(cartTotal);
        totalElement.innerText = cartTotal > 0 ? formatter.format(cartTotal) + ' €' : '-';
    });
});