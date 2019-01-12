
function verifica() 
{ 
    if(document.getElementById("silo").value === "")
    {
        alert('Selecione o silo!');
        return false;
    }
    else if(document.getElementById("data").value === "")
    {
        alert('Preencha a data!');
        return false;
    }
    else if(document.getElementById("cb_ocorrencia").value === "")
    {
        alert('Selecione o tipo ocorrência!');
        return false;
    }
    else if(document.getElementById("descricao").value === "")
    {
        alert('Preencha!');
        return false;
    }
}