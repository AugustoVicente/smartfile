function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
       alert('Preencha o nome!');
       return false;
    }
    if(document.getElementById("codigo").value === "")
    {
       alert('Preencha o codigo!');
       return false;
    }
} 