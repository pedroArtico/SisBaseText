$(document).ready(function()
{
    $("#searchP").submit(function()
    {		
       var option= $("#optionS").val();
       var cont=0;
	   if(option=="1")
       {
           if($("#url").val()==="")
           {
               alert("A URL não pode estar em branco!");			   
               ++cont;
           }
		   if(!($("#url").val()==="") && (!(/^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test($("#url").val()))))
		   {
				alert("URL inválida!");
				++cont;
			}
           if($("#baseType").val()==="0")
           {
               alert("Selecione um tipo de base válido!");
               ++cont;
           }
           if($("#summarization").val()==="0")
           {
               alert("Selecione uma opção para a sumarização!");
               ++cont;
           }
           if(cont==0)
           {
               return true;
           }
			else
				return false;		   
		
       }

        if(option==="2")
       {
           if($("#key").val()==="")
           {
               alert("O campo de palavras-chave não pode estar em branco!");			   
               ++cont;
           }
           if($("#websearch").val()==="0")
           {
               alert("Selecione um buscador válido!");
               ++cont;
           }
           if($("#year").val()==="0")
           {
               alert("Selecione um ano válido!");			   
               ++cont;
           }
           if($("#sourceSearch").val()==="0")
           {
               alert("Selecione uma opção!");			   
               ++cont;
           }		   
           if($("#sourceSearch").val()==="sim")
           {
				if($("#source").val()==="0")
				{
					alert("Selecione uma fonte!");			   
					++cont;
				}		   		   
           }
           if($("#baseType").val()==="0")
           {
               alert("Selecione um tipo de base válido!");
               ++cont;
           }
           if($("#summarization").val()==="0")
           {
               alert("Selecione uma opção para a sumarização!");
               ++cont;
           }
           if(cont==0)
           {
               return true;
           }
			else
				return false;		   
		
       }
	   if(option==="3")
       {
           if($("#key").val()==="")
           {
               alert("O campo de palavras-chave não pode estar em branco!");			   
               ++cont;
           }
           if($("#socialNetwork").val()==="0")
           {
               alert("Selecione uma rede social!");			   
               ++cont;
           }
           if($("#baseType").val()==="0")
           {
               alert("Selecione um tipo de base válido!");
               ++cont;
           }
           if($("#summarization").val()==="0")
           {
               alert("Selecione uma opção para a sumarização!");
               ++cont;
           }
           if(cont==0)
           {
               return true;
           }
			else
				return false;		   
		
       }	   
    });
});

