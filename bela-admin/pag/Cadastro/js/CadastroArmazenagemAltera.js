function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
       alert('Preencha o nome!');
       return false;
    }
    if((document.getElementById("numCabos").value == "") || (document.getElementById("numCabos").value == "0"))
    {
       alert('Insira a quantidade de cabos de termometria!');
       return false;
    }
} 