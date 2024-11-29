function validarFormulario() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const cadastro = document.getElementById('cadastro').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Por favor, preencha todos os campos.');
        return false;
    }

    if (senha.length < 6) {
        alert('A senha deve ter no mínimo 6 caracteres.');
        return false;
    }

    return true;
}
