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
}
function mostraQuantidade()
{
    document.getElementById("divQuantidade").style.display = "block";
    var maximo = document.getElementById("quantidade").max;
    var iniTon = document.getElementById("siloDestino").options[document.getElementById('siloDestino').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("siloDestino").options[document.getElementById('siloDestino').selectedIndex].text.indexOf("t", iniTon);
    var toneladas = document.getElementById("siloDestino").options[document.getElementById('siloDestino').selectedIndex].text.substring(iniTon+1, fimTon-1);
    if(maximo > toneladas)
    {
        document.getElementById("quantidade").max = toneladas;
    }

} 