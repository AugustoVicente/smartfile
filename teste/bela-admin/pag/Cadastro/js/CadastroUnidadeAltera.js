function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
        alert('Preencha o nome!');
        return false;
    }
    else if(document.getElementById("estado").value === "")
    {
        alert('Preencha o estado!');
        return false;
    }
    else if(document.getElementById("telefone1").value === "")
    {
        alert('Preencha o telefone!');
        return false;
    }
    else if(document.getElementById("cep").value === "")
    {
        alert('Preencha o CEP!');
        return false;
    }
    else if(document.getElementById("cidade").value === "")
    {
        alert('Preencha a cidade!');
        return false;
    }
    else if(document.getElementById("endereco").value === "")
    {
        alert('Preencha o endereço!');
        return false;
    }
    else if(document.getElementById("filial").value === "")
    {
        alert('Preencha a filial!');
        return false;
    }
} 