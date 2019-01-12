function verifica() 
{ 
    if(document.getElementById("qtdToneladas").value == "")
    {
        alert('Preencha corretamente a quantidade de toneladas!');
        return false;
    }
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
    if(document.getElementById('um').checked)
    {
        if(document.getElementById("inseticidaUm").value == "")
        {
            alert('Preencha o inseticida!');
            return false;
        }
        else if(document.getElementById("DosagemUm").value == "")
        {
            alert('Preencha a dosagem!');
            return false;
        }
        document.getElementById("inseticidaDois").value = "";
        document.getElementById("dosagemDois").value = "";
        document.getElementById("inseticidaTres").value = "";
        document.getElementById("dosagemTres").value = "";
    }
    else if(document.getElementById('dois').checked)
    {
        if(document.getElementById("inseticidaUm").value == "")
        {
            alert('Preencha o inseticida!');
            return false;
        }
        else if(document.getElementById("DosagemUm").value == "")
        {
            alert('Preencha a dosagem!');
            return false;
        }
        else if(document.getElementById("inseticidaDois").value == "")
        {
            alert('Preencha o inseticida 2!');
            return false;
        }
        else if(document.getElementById("DosagemDois").value == "")
        {
            alert('Preencha a dosagem!');
            return false;
        }
        document.getElementById("inseticidaTres").value = "";
        document.getElementById("dosagemTres").value = "";
    }
    else if(document.getElementById('tres').checked)
    {
        if(document.getElementById("inseticidaUm").value == "")
        {
            alert('Preencha o inseticida!');
            return false;
        }
        else if(document.getElementById("DosagemUm").value == "")
        {
            alert('Preencha a dosagem!');
            return false;
        }
        else if(document.getElementById("inseticidaDois").value == "")
        {
            alert('Preencha o inseticida 2!');
            return false;
        }
        else if(document.getElementById("DosagemDois").value == "")
        {
            alert('Preencha a dosagem 2!');
            return false;
        }
        else if(document.getElementById("inseticidaTres").value == "")
        {
            alert('Preencha o inseticida 3!');
            return false;
        }
        else if(document.getElementById("DosagemTres").value == "")
        {
            alert('Preencha a dosagem 3!');
            return false;
        }
    }
    
} 
function spawnInseticida()
{
    if(document.getElementById('um').checked)
    {
        document.getElementById("divinseticidaDois").style.display = "none";
        document.getElementById("divinseticidaTres").style.display = "none";
    }
    else if(document.getElementById('dois').checked)
    {
        document.getElementById("divinseticidaDois").style.display = "block";
        document.getElementById("divinseticidaTres").style.display = "none";
    }
    else if(document.getElementById('tres').checked)
    {
        document.getElementById("divinseticidaDois").style.display = "block";
        document.getElementById("divinseticidaTres").style.display = "block";
    }
}
function qtdTratado()
{
    if(document.getElementById("totalparcial").value == "Parcial")
    {
        document.getElementById("qtdToneladas").readOnly = false;
    }
    else
    {
        var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
        var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", iniTon);
        var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon-1);
        document.getElementById("qtdToneladas").value = toneladas;
        document.getElementById("qtdToneladas").readOnly = true;
    }
}
function selecionaSilo()
{
    document.getElementById("fatores").style.display = "block";
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon-1);
    document.getElementById("qtdToneladas").value = toneladas;
    document.getElementById("qtdToneladas").max = toneladas;
}
function escolheInseticidaUm()
{ 
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon-1);
    var iniDP = parseInt(document.getElementById("inseticidaUm").options[document.getElementById('inseticidaUm').selectedIndex].text.indexOf("("));
    var fimDP = parseInt(document.getElementById("inseticidaUm").options[document.getElementById('inseticidaUm').selectedIndex].text.indexOf(" ", iniDP));
    var dosagemPadrao = parseInt(document.getElementById("inseticidaUm").options[document.getElementById('inseticidaUm').selectedIndex].text.substring(iniDP+1, fimDP));
    var fimUM = parseInt(document.getElementById("inseticidaUm").options[document.getElementById('inseticidaUm').selectedIndex].text.indexOf("/"));
    var unidadeMedida = document.getElementById("inseticidaUm").options[document.getElementById('inseticidaUm').selectedIndex].text.substring(fimDP+1, fimUM);
    document.getElementById("DosagemUm").value = (dosagemPadrao * toneladas) + " " + unidadeMedida;
}
function escolheInseticidaDois()
{
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon-1);
    var iniDP = parseInt(document.getElementById("inseticidaDois").options[document.getElementById('inseticidaDois').selectedIndex].text.indexOf("("));
    var fimDP = parseInt(document.getElementById("inseticidaDois").options[document.getElementById('inseticidaDois').selectedIndex].text.indexOf(" ", iniDP));
    var dosagemPadrao = parseInt(document.getElementById("inseticidaDois").options[document.getElementById('inseticidaDois').selectedIndex].text.substring(iniDP+1, fimDP));
    var fimUM = parseInt(document.getElementById("inseticidaDois").options[document.getElementById('inseticidaDois').selectedIndex].text.indexOf("/"));
    var unidadeMedida = document.getElementById("inseticidaDois").options[document.getElementById('inseticidaDois').selectedIndex].text.substring(fimDP+1, fimUM);
    document.getElementById("DosagemDois").value = (dosagemPadrao * toneladas) + " " + unidadeMedida;
}
function escolheInseticidaTres()
{
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon-1);
    var iniDP = parseInt(document.getElementById("inseticidaTres").options[document.getElementById('inseticidaTres').selectedIndex].text.indexOf("("));
    var fimDP = parseInt(document.getElementById("inseticidaTres").options[document.getElementById('inseticidaTres').selectedIndex].text.indexOf(" ", iniDP));
    var dosagemPadrao = parseInt(document.getElementById("inseticidaTres").options[document.getElementById('inseticidaTres').selectedIndex].text.substring(iniDP+1, fimDP));
    var fimUM = parseInt(document.getElementById("inseticidaTres").options[document.getElementById('inseticidaTres').selectedIndex].text.indexOf("/"));
    var unidadeMedida = document.getElementById("inseticidaTres").options[document.getElementById('inseticidaTres').selectedIndex].text.substring(fimDP+1, fimUM);
    document.getElementById("DosagemTres").value = (dosagemPadrao * toneladas) + " " + unidadeMedida;
}