function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
        alert('Preencha o nome!');
        return false;
    }
    if(document.getElementById("dosagemPadrao").value == "")
    {
        alert('Preencha a dosagem padrao!');
        return false;
    }
    if(document.getElementById("unidadeMedida").value == "")
    {
        alert('Selecione a unidade!');
        return false;
    }
}