function verifica() 
{ 
    if(document.getElementById("silo").value == "")
    {
        alert('Selecione o silo!');
        return false;
    }
    else if(document.getElementById("data").value == "")
    {
        alert('Data não selecionada!');
        return false;
    }
    else if(document.getElementById("Etermometria").checked == false & document.getElementById("Epadrao").checked == false)
    {
        alert('Selecione alguma ação!');
        return false;
    }
    else if(document.getElementById("Etermometria").checked == true)
    {
        if(document.getElementById("tempAmbiente").value == "")
        {
            alert('Preencha a temperatura ambiente!');
            return false;
        }
        else if(document.getElementById("tempMaxima").value == "")
        {
            alert('Preencha a temperatura máxima!');
            return false;
        }
        else if(document.getElementById("numPontosAcima").value == "")
        {
            alert('Preencha o número de pontos acima de 29ºC!');
            return false;
        } 
    }
    else if(document.getElementById("Epadrao").checked == true)
    {
        if(document.getElementById("umidade").value == "")
        {
            alert('Preencha a umidade!');
            return false;
        }
        else if(document.getElementById("impureza").value == "")
        {
            alert('Preencha a impureza!');
            return false;
        }
        else if(document.getElementById("ardido").value == "")
        {
            alert('Preencha o ardido!');
            return false;
        } 
        else if(document.getElementById("ph").value == "")
        {
            alert('Preencha o ph!');
            return false;
        }
        else if(document.getElementById("avariado").value == "")
        {
            alert('Preencha o ardido!');
            return false;
        } 
        else if(document.getElementById("esverdiado").value == "")
        {
            alert('Preencha a impureza!');
            return false;
        }
        else if(document.getElementById("triguilho").value == "")
        {
            alert('Preencha o ardido!');
            return false;
        } 
    }
} 
function selecionaAcao()
{
    if(document.getElementById("Etermometria").checked == true)
    {
        document.getElementById("termometria").style.display = "block";
    }
    else
    {
        document.getElementById("termometria").style.display = "none";
    }
    if(document.getElementById("Epadrao").checked == true)
    {
        document.getElementById("padrao").style.display = "block";
    }
    else
    {
        document.getElementById("padrao").style.display = "none";
    }
}