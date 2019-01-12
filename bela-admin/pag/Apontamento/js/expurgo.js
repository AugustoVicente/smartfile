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
    else if(document.getElementById("numReceituario").value === "")
    {
       alert('Preencha o número do receituário!');
       return false;
    }
} 