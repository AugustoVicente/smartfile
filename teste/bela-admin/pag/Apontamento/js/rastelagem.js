function verifica() 
{ 
    if(document.getElementById("silo").value === "")
    {
        alert('Selecione o silo!');
        return false;
    }
    else if(document.getElementById("data").value === "")
    {
        alert('Data não selcionada!');
        return false;
    }
} 