document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            const inputs = this.querySelectorAll('input[type="text"], input[type="number"], input[type="date"], input[type="password"]');
            let valid = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    valid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '#ccc';
                }
            });

            if (!valid) {
                event.preventDefault();
                alert('Please fill out all fields.');
            }
        });
    });
});

