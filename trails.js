document.addEventListener('DOMContentLoaded', function () {
    // A1 & A10: Header search & primary search elements
    var searchBox = document.getElementById('search-box');
    var headerSearch = document.getElementById('main-search') || document.querySelector('input[placeholder*="Search homepage"]');
    var categorySelect = document.getElementById('category');
    var cards = document.querySelectorAll('.trail-card');
    var emptyMsg = document.getElementById('trails-no-results') || document.getElementById('no-results');

    function filterTrails() {
        var query = (searchBox ? searchBox.value : '').toLowerCase().trim();
        var selectedCat = (categorySelect ? categorySelect.value : '').toLowerCase().trim();
        var shown = 0;

        cards.forEach(function (card) {
            var text = card.textContent.toLowerCase();
            var cardCat = (card.getAttribute('data-category') || '').toLowerCase();

            var matchesQuery = !query || text.includes(query);
            var matchesCategory = !selectedCat || selectedCat === 'all' || cardCat === selectedCat;

            if (matchesQuery && matchesCategory) {
                card.style.display = '';
                shown++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyMsg) {
            emptyMsg.hidden = shown > 0;
            emptyMsg.style.display = shown > 0 ? 'none' : 'block';
        }
    }

    // A1: Search box input
    if (searchBox) {
        searchBox.addEventListener('input', function () {
            if (headerSearch && headerSearch.value !== searchBox.value) {
                headerSearch.value = searchBox.value;
            }
            filterTrails();
        });
    }

    // A10: Header search synchronizes with main search and filters
    if (headerSearch) {
        headerSearch.addEventListener('input', function () {
            if (searchBox && searchBox.value !== headerSearch.value) {
                searchBox.value = headerSearch.value;
            }
            filterTrails();
        });
    }

    // A2: Category dropdown filter
    if (categorySelect) {
        categorySelect.addEventListener('change', filterTrails);
    }

    // A11: Flat rate pricing live calculations
    var totalDisplay = document.getElementById('booking-total');
    var planRadios = document.querySelectorAll('input[name="plan_type"]');

    planRadios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            if (this.value === 'daily') {
                totalDisplay.textContent = 'RM 350';
            } else if (this.value === 'monthly') {
                // RM 350 * 30 * 0.8 = RM 8,400
                totalDisplay.textContent = 'RM 8,400';
            }
        });
    });

    // A12: Booking submit handler with confirmation message
    var bookingForm = document.getElementById('booking-form');
    var confirmationMsg = document.getElementById('booking-confirmation');

    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!bookingForm.checkValidity()) {
                bookingForm.reportValidity();
                return;
            }

            if (confirmationMsg) {
                confirmationMsg.style.display = 'block';
                confirmationMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }

            bookingForm.reset();
            if (totalDisplay) {
                totalDisplay.textContent = '-';
            }
        });
    }
});
