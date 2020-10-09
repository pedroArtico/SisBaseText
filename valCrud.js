$(document).ready(function()
{
    $("#crudForm").submit(function()
    {
       var option= $("#option").val();
       var cont=0; 
	   if(option=="1")
       {
           if($("#url_name").val()==="")
           {
               alert("O nome da fonte não pode estar em branco!");			   
               ++cont;
           }
           if($("#url_register").val()==="")
           {
               alert("O campo URL não pode estar em branco!");
               ++cont;
           }
		   
		   if(!($("#url_register").val()==="")  && (!(/^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test($("#url_register").val()))))
		   {
				alert("URL inválida!");
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
            if($("#sources").val()==="0")
            {
                alert("Selecione uma fonte para excluir!");
                return false;
            }
			else
				alert("Fonte de pesquisa deletada com sucesso!");
				
		}	
    });
});

