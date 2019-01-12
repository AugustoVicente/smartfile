function tipoEstoque()
{
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("/", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon);
    var fimTon2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", fimTon);
    var toneladas2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(fimTon+1, fimTon2-1);
    if(document.getElementById('tipo').value == "0")
    {
        document.getElementById("padrao").style.display = "block";
        document.getElementById("divQuantidade").style.display = "block";
        document.getElementById("quantidade").max = toneladas2-toneladas;
    }
    else if(document.getElementById('tipo').value =="1")
    {
        document.getElementById("padrao").style.display = "none";
        document.getElementById("divQuantidade").style.display = "block";
        document.getElementById("quantidade").max = toneladas;
    }
}
function load()
{
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("/", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon);
    var fimTon2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", fimTon);
    var toneladas2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(fimTon+1, fimTon2-1);
    if(toneladas == 0)
    {
        document.getElementById("saida").style.display = "none";
    }
    else
    {
        document.getElementById("saida").style.display = "block";
    }
    if(toneladas2-toneladas == 0)
    {
        document.getElementById("entrada").style.display = "none";
    }
    else
    {
        document.getElementById("entrada").style.display = "block";
    }
}
function selecionaSilo()
{
    var iniTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("(");
    var fimTon = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("/", iniTon);
    var toneladas = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(iniTon+1, fimTon);
    var fimTon2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.indexOf("t", fimTon);
    var toneladas2 = document.getElementById("silo").options[document.getElementById('silo').selectedIndex].text.substring(fimTon+1, fimTon2-1);
    if(toneladas == 0)
    {
        document.getElementById("saida").style.display = "none";
    }
    else
    {
        document.getElementById("saida").style.display = "block";
    }
    document.getElementById("quantidade").max = toneladas2-toneladas;
}
function verifica()
{
    if(document.getElementById("tipo").value == "")
    {
        alert('Selecione a ocorrência!');
        return false;
    }
    else if(document.getElementById("tipo").value == "0")
    {
        if(document.getElementById("quantidade").value == "")
        {
            alert('Preencha a quantidade!');
            return false;
        }
        else if(document.getElementById("umidade").value == "")
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
            alert('Preencha os ardidos!');
            return false;
        }
        else if(document.getElementById("ph").value == "")
        {
            alert('Preencha o PH!');
            return false;
        }
        else if(document.getElementById("avariado").value == "")
        {
            alert('Preencha os avariados!');
            return false;
        }
        else if(document.getElementById("esverdiado").value == "")
        {
            alert('Preencha os esverdiados!');
            return false;
        }
        else if(document.getElementById("triguilho").value == "")
        {
            alert('Preencha os triguilhos!');
            return false;
        }
        else if(document.getElementById("data").value == "")
        {
            alert('Preencha a data!');
            return false;
        }
    }
    else if(document.getElementById("tipo").value == "1")
    {
        if(document.getElementById("quantidade").value == "")
        {
            alert('Preencha a quantidade!');
            return false;
        }
    }
}