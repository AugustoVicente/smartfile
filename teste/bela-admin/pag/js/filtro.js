function carregaSelect()
{
    document.getElementById('divInputPeriodo').innerHTML = "";
    if(document.getElementById("cb_periodo").value=="Diario")
    {
        var input = document.createElement("input");
        input.setAttribute('type', 'date');
        input.setAttribute('name', 'dataDiario');
        var parent = document.getElementById("divInputPeriodo");
        document.getElementById("divSafra").style.display = "none";
        document.getElementById("divSemestre").style.display = "none";
        parent.appendChild(input);
    }
    else if(document.getElementById("cb_periodo").value=="Mensal")
    {
        var input = document.createElement("input");
        input.setAttribute('type', 'Month');
        input.setAttribute('name', 'dataMes');
        var parent = document.getElementById("divInputPeriodo");
        document.getElementById("divSemestre").style.display = "none";
        document.getElementById("divSafra").style.display = "none";
        parent.appendChild(input);
    }
    else if(document.getElementById("cb_periodo").value=="Anual")
    {
        var input = document.createElement("input");
        input.setAttribute('type', 'Month');
        input.setAttribute('name', 'dataAnual');
        var parent = document.getElementById("divInputPeriodo");
        document.getElementById("divSemestre").style.display = "none";
        document.getElementById("divSafra").style.display = "none";
        parent.appendChild(input);
    }
    else if(document.getElementById("cb_periodo").value=="Safra")
    {
        document.getElementById("divSafra").style.display = "block";
    }
    
}
function tipoSafra()
{
    var cond = document.getElementById("cb_safra").options[document.getElementById('cb_safra').selectedIndex].value.substring(0, 1);                
    if(cond =="d")
    {
        document.getElementById("inSafra").value = '1';
    }
    else
    {

        document.getElementById("inSafra").value = '0';
    }
}
