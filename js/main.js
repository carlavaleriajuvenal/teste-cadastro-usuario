// validando o nome
function validateName(name) {
    if (name.trim() === '') {
        alert('O nome não pode estar vazio!');
        return false;
    }
    if (name.length < 3) {
        alert('O nome deve ter pelo menos 3 caracteres!');
        return false;
    }
    return true;
}

// validando o e-mail
function validateEmail(email) {
	if (email.trim() === '') {
        alert('O mail não pode estar vazio!');
        return false;
    }return true;

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('O e-mail fornecido não é válido!');
        return false;
    }
    return true;
}

//  validando a senha
function validatePassword(senha) {
    if (senha.length < 8) {
        alert('A senha deve ter pelo menos 8 caracteres!');
        return false;
    }
    return true;
}


// Função para lidar com o envio do formulário
function handleSubmit(event) {
    event.preventDefault(); // Impede o envio do formulário para verificar os campos

    const nameInput = document.getElementById('nome').value;
    const emailInput = document.getElementById('email').value;
    const passwordInput = document.getElementById('senha').value;

    const isNameValid = validateName(nameInput);
    const isEmailValid = validateEmail(emailInput);
    const isPasswordValid = validatePassword(passwordInput);


    if (isNameValid && isEmailValid && isPasswordValid) {
        alert('Formulário enviado com sucesso!');
        // Aqui você enviar o formulário,
        
    }
}

document.getElementById('form').addEventListener('submit', handleSubmit);


