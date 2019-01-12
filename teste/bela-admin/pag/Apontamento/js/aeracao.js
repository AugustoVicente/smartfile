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
    else if(document.getElementById("numHoraDia").value === "")
    {
        alert('Preencha a quantidade de horas!');
        return false;
    }
    else if(document.getElementById("temperatura").value === "")
    {
        alert('Preencha a temperatura!');
        return false;
    }
    else if(document.getElementById("umidade").value === "")
    {
        alert('Preencha a umidade!');
        return false;
    }
} 
function load() 
{ 
}