function verifica() 
{ 
    if(document.getElementById("silo").value === "")
    {
        alert('Selecione o silo!');
        return false;
    }
    else if(document.getElementById("data").value === "")
    {
        alert('Data não selecionada!');
        return false;
    }
    else if(document.getElementById("ocorrencia").value === "")
    {
        alert('Selecione a ocorrência!');
        return false;
    }
    else if(document.getElementById("Toneladas").value === "")
    {
        alert('Preencha as toneladas!');
        return false;
    }
} 