function verifica() 
{ 
    if(document.getElementById("nome").value === "")
    {
       alert('Preencha o nome!');
       return false;
    }
    if(document.getElementById("capacidade").value === "")
    {
       alert('Preencha a capacidade!');
       return false;
    }
    if(document.getElementById("unidade").value == "")
    {
       alert('Selecione a unidade!');
       return false;
    }
    if(document.getElementById("tipo").value == "")
    {
       alert('Selecione o tipo da armazenagem!');
       return false;
    }
    // if((document.getElementById("tipo").value == "1") && ((document.getElementById("numCabos").value == "") || (document.getElementById("numCabos").value == "0")))
    // {
    //    alert('Insira a quantidade de cabos de termometria!');
    //    return false;
    // }
    if(document.getElementById("tipo").value != "1")
    {
        document.getElementById("numCabos").value = "";
    }
} 
function filtraSilo()
{
    if(document.getElementById("tipo").value === "1")
    {
        document.getElementById("divCabo").style.display = "block";
    }
    else
    {
        document.getElementById("divCabo").style.display = "none";
        document.getElementById("divCabo").value = "0";
    }
}