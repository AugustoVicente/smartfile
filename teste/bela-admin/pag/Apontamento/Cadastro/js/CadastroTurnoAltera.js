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
    else if(document.getElementById("turno").value === "")
    {
        alert('Selecione o turno!');
        return false;
    }
} 