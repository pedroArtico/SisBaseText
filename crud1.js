function invisibleFields(select)
{
    switch (select.value)
    {
        case "0":
            document.getElementById("divCrud1").style.display = "none";
            document.getElementById("divCrud2").style.display = "none";
            document.getElementById("divCrud3").style.display = "none";
            document.getElementById("divCrud4").style.display = "none";
            document.getElementById("divCrud5").style.display = "none";
            break;
        case "1":
            document.getElementById("divCrud1").style.display = "none";
            document.getElementById("divCrud2").style.display = "block";
            document.getElementById("divCrud3").style.display = "block";
            document.getElementById("divCrud4").style.display = "block";
            document.getElementById("divCrud5").style.display = "none";
			document.getElementById("url_name").readOnly = false;
			document.getElementById("url_register").readOnly = false;
            break;
        case "2":
            document.getElementById("divCrud1").style.display = "block";
            document.getElementById("divCrud2").style.display = "block";
            document.getElementById("divCrud3").style.display = "block";
            document.getElementById("divCrud4").style.display = "none";
            document.getElementById("divCrud5").style.display = "none";
			document.getElementById("url_name").readOnly = true;
			document.getElementById("url_register").readOnly = true;
            break;
        case "3":
            document.getElementById("divCrud1").style.display = "block";
            document.getElementById("divCrud2").style.display = "none";
            document.getElementById("divCrud3").style.display = "none";
            document.getElementById("divCrud4").style.display = "none";
            document.getElementById("divCrud5").style.display = "block";
            break;
        default:
            alert("Houve um problema nos campos, atualize a página!" +
                "Se o erro persistir, contate o suporte com o código de erro: error in method invisibleFields()")

    }
}

function changeSources(select)
{
    if(select.value!=="0")
    {
        document.getElementById("url_register").value = select.value;
        document.getElementById("url_name").value = document.getElementById('sources').options[document.getElementById('sources').selectedIndex].text;
		}
    else
    {
        document.getElementById("url_register").value = "";
        document.getElementById("url_name").value= "";
    }
}