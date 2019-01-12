function submitInicio() 
{ 
    if(document.getElementById("data").value == "")
    {
        alert('Data não selecionada!');
        return false;
    }
    else if(document.getElementById("produto").value == "")
    {
        alert('Selecione o produto!');
        return false;
    }
    else if(document.getElementById("nome").value == "")
    {
        alert('Preencha o nome da safra!');
        return false;
    }
} 
function submitAlterar() 
{ 
    if(document.getElementById("data").value == "")
    {
        alert('Data não selecionada!');
        return false;
    }
    else if(document.getElementById("nomeSafra").value == "")
    {
        alert('Preencha o nome da safra!');
        return false;
    }
} 