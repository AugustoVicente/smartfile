function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
        alert('Preencha o nome!');
        return false;
    }
    else if(document.getElementById("codigo").value == "")
    {
        alert('Preencha o código!');
        return false;
    }
    else if(document.getElementById("dosagemPadrao").value == "")
    {
        alert('Preencha a dosagem padrao!');
        return false;
    }
    else if(document.getElementById("unidadeMedida").value == "")
    {
        alert('Selecione a unidade!');
        return false;
    }
}