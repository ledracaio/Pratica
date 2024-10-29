// Validação básica e funcionalidades adicionais
document.querySelector('form').addEventListener('submit', function(e) {
    // Você pode adicionar validações adicionais aqui
    // Exemplo: verificar se todas as perguntas foram respondidas
});


function validateForm() {
    let valid = true;
    const inputs = document.querySelectorAll('input[type="number"]');
    inputs.forEach(input => {
        const value = parseInt(input.value);
        if (value < 0 || value > 10) {
            alert('Por favor, insira uma pontuação entre 0 e 10.');
            valid = false;
        }
    });
    return valid;
}

