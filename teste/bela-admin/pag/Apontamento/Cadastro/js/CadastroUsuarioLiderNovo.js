function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
        alert('Preencha o nome!');
        return false;
    }
    else if(document.getElementById("cpf").value === "")
    {
        alert('Preencha o CPF!');
        return false;
    }
    else if(document.getElementById("login").value === "")
    {
        alert('Preencha o login!');
        return false;
    }
    else if(document.getElementById("email").value === "")
    {
        alert('Preencha o email!');
        return false;
    }
    else if(document.getElementById("tipo").value === "")
    {
        alert('Selecione o tipo de usuário!');
        return false;
    }
    else if(document.getElementById("telefone").value === "")
    {
        alert('Preencha o telefone!');
        return false;
    }
    else if(document.getElementById("celular").value === "")
    {
        alert('Preencha o celular!');
        return false;
    }
    else if(document.getElementById("cep").value === "")
    {
        alert('Preencha o CEP!');
        return false;
    }
    else if(document.getElementById("endereco").value === "")
    {
        alert('Preencha o endereço!');
        return false;
    }
    else if(document.getElementById("estado").value === "")
    {
        alert('Preencha a UF!');
        return false;
    }
    else if(document.getElementById("cidade").value === "")
    {
        alert('Preencha a cidade!');
        return false;
    }
    else if(document.getElementById("dataNasc").value === "")
    {
        alert('Preencha a data de nascimento!');
        return false;
    }
    else if(document.getElementById("unidade").value === "")
    {
        alert('Selecione a unidade!');
        return false;
    }
    else if(document.getElementById("status").value === "")
    {
        alert('Selecione o status!');
        return false;
    }
} 