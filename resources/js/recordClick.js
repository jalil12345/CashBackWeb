import axios from 'axios';

function recordClick(p_store, p_cashback) {
    axios.post('/api/record-click', {
        p_store: p_store,
        p_cashback: p_cashback
    })
    .then(function(response) {
        console.log(response.data);
    })
    .catch(function(error) {
        console.error("Error recording click:", error);
    });
}

document.addEventListener('click', function(e) {
    let target = e.target;
    while (target && target !== this) {
        if (target.matches('.store-link')) {
            const p_store = target.getAttribute('data-store');
            const p_cashback = target.getAttribute('data-cashback');
            recordClick(p_store, p_cashback);
            return;
        }
        target = target.parentNode;
    }
});
