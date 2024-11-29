document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', (e) => {
            const inputs = form.querySelectorAll('input[type="range"]');
            let valid = true;
            inputs.forEach(input => {
                if (input.value === '') {
                    valid = false;
                }
            });

            if (!valid) {
                alert('Por favor, preencha todas as perguntas antes de enviar.');
                e.preventDefault();
            }
        });
    }
});
