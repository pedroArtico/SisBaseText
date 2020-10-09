function invisibleFields(select)
{
    switch (select.value)
    {
        case "0":
            document.getElementById("div2").style.display = "none";
            document.getElementById("div3").style.display = "none";
            document.getElementById("div4").style.display = "none";
            document.getElementById("div5").style.display = "none";
            document.getElementById("div6").style.display = "none";
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";
            document.getElementById("div9").style.display = "none";			
            document.getElementById("div10").style.display = "none";
			document.getElementById("div11").style.display = "none";
            document.getElementById("div12").style.display = "none";
            break;
        case "1":
            document.getElementById("div2").style.display = "block";
            document.getElementById("div3").style.display = "none";
            document.getElementById("div4").style.display = "none";
            document.getElementById("div5").style.display = "none";
            document.getElementById("div6").style.display = "none";
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";
            document.getElementById("div9").style.display = "none";			
			document.getElementById("div10").style.display = "block";
			document.getElementById("div11").style.display = "block";
            document.getElementById("div12").style.display = "block";
            break;
        case "2":
            document.getElementById("div2").style.display = "none";
            document.getElementById("div3").style.display = "block";
            document.getElementById("div4").style.display = "block";
            document.getElementById("div5").style.display = "block";
            document.getElementById("div6").style.display = "block";
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";			
            document.getElementById("div9").style.display = "none";			
			document.getElementById("div10").style.display = "block";
			document.getElementById("div11").style.display = "block";
            document.getElementById("div12").style.display = "block";
            break;
        case "3":
            document.getElementById("div2").style.display = "none";
            document.getElementById("div3").style.display = "block";
            document.getElementById("div4").style.display = "none";
            document.getElementById("div5").style.display = "none";
            document.getElementById("div6").style.display = "none";
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";
            document.getElementById("div9").style.display = "block";			
			document.getElementById("div10").style.display = "block";
			document.getElementById("div11").style.display = "block";
            document.getElementById("div12").style.display = "block";
            break;
        default:
            alert("Houve um problema nos campos, atualize a página!" +
                "Se o erro persistir, contate o suporte com o código de erro: error in method invisibleFields()")

    }
}


function onChangeOptSource(select) 
{
    if (select.value === "sim")
		{
            document.getElementById("div7").style.display = "block";
            document.getElementById("div8").style.display = "block";
		}
	else
		if(select.value === "não")
		{
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";			
		}
		else 
			if(select.value === "0")
			{
            document.getElementById("div7").style.display = "none";
            document.getElementById("div8").style.display = "none";			
			}
}
