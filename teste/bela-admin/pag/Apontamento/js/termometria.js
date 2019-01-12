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
    else if(document.getElementById("tempAmbiente").value === "")
    {
        alert('Preencha a temperatura ambiente!');
        return false;
    }
    else if(document.getElementById("tempMaxima").value === "")
    {
        alert('Preencha a temperatura máxima!');
        return false;
    }
    else if(document.getElementById("numPontosAcima").value === "")
    {
        alert('Preencha a quantidade de pontos acima de 29!');
        return false;
    }
} 