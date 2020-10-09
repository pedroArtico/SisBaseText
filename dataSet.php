<!DOCTYPE html>
<html lang="en">
<head>
	<title>SisBaseText</title>
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="util5.css">
	<link rel="stylesheet" type="text/css" href="css6.css">

    <link href="tableexport.css" rel="stylesheet">
    <link href="tableexport.min.css" rel="stylesheet">
    <!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
						<div class="wrap-contact100-form-btn" >
						<div class="contact100-form-bgbtn" ></div>
						<button style="background-color:black" id="addAttr" name="addAttr" class="contact100-form-btn" type="submit" value="Adicionar atributo">
							<span>
								Adicionar atributo
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
	       <form autocomplete="off" method="post">
				<div class="table100">
					<table id="tableDS">
						<thead>
							<tr class="table100-head" style="background-color:#2f4991">
								<th class="colum1"><a href="#"><img src="delete.png" alt="Delete" height="35" width="35"></a></th>
								<th class="colum2"><a href="#"><img src="delete.png" alt="Delete" height="35" width="35"></a></th>
								<th class="colum3"><a href="#"><img src="delete.png" alt="Delete" height="35" width="35"></a></th>
								<th class="colum4"><a href="#"><img src="delete.png" alt="Delete" height="35" width="35"></a></th>
								<th class="colum5"><a href="#"><img  src="delete.png" alt="Delete" height="35" width="35"></a></th>
                                <th class="colum6"><a href="#"><img  src="delete.png" alt="Delete" height="35" width="35"></a></th>
                                <th class="colum7"><a href="#"><img  src="delete.png" alt="Delete" height="35" width="35"></a></th>
							</tr>
							<tr class="table100-head">
								<th class="column1" contenteditable='false'  spellcheck="false">ID</th>
								<th class="column2"contenteditable='false'  spellcheck="false">Data de coleta</th>
								<th class="column3"contenteditable='false'  spellcheck="false">Conteúdo</th>
								<th class="column4"contenteditable='false'  spellcheck="false">Sumarização</th>
								<th class="column5"contenteditable='false'  spellcheck="false">Tipo de base</th>
                                <th class="column6"contenteditable='false'  spellcheck="false">Tipo de busca</th>
                                <th class="column7"contenteditable='false'  spellcheck="false">URL</th>

                            </tr>
						</thead>
						<tbody>
                        <?php
                        require_once 'DataSetGenerator.php';
                        $showDataset = new DataSetGenerator();
                        $showDataset->generateWordDataSet();
                        $showDataset->generateSentenceDataSet();
                        $showDataset->generateTextDataSet();
                        ?>
						</tbody>
					</table>
               </div>
				</form>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="jquery-3.2.1.min.js"></script>
    <script src="FileSaver.min.js"></script>
    <script src="tableexport.min.js"></script>
    <script src="tableexport.js"></script>



    <script type="text/javascript">
        $(document).ready(function()
        {
            encodeURIComponent($("#tableDS").tableExport({
                headers:true,
                footers:true,
                formats: ["xls","csv","txt"],
                fileName:"data set",
                bootstrap:false,
                position:"top"
        }));
        });

    </script>



	 <script type="text/javascript">
$(document).ready(function(){
    window.onload = function() {
        //considering there aren't any hashes in the urls already
        if(!window.location.hash) {
            //setting window location
            window.location = window.location + '#loaded';
            //using reload() method to reload web page
            window.location.reload();
        }
    }
$("#addAttr").click(function (){
	var trow;
    var number = 1 + Math.floor(Math.random() * 10000);
	trow='<th class="colum6"><a href="#"><img src="delete.png" alt="Delete" height="35" width="35"></a></th>';
	$('#tableDS tr:first').append(trow);
	trow2= '<th class="column6"  spellcheck="false" contenteditable="true">Novo atributo</th>';
	$('#tableDS tr:eq(1)').append(trow2);
	var tdr={};
	var rowleng=$('#tableDS tbody tr').length;
	for(i=0;i<rowleng;i++)
	    {
			$('#tableDS tbody tr').eq(i).append('<td class="column6"  spellcheck="false" contenteditable="true"><input type="hidden" name="append"></td>');
		}
   });
   
   
$('table').delegate('.colum1, .colum2,.colum3, .colum4,.colum5, colum6, .colum7', 'click', function() {
    var index = this.cellIndex;
    $(this).closest('table').find('tr').each(function() {
        this.removeChild(this.cells[ index ]);
    });
});
  });
    </script>


<!--===============================================================================================-->
    <script src="popper.js"></script>
	<script src="bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="select2.min.js"></script>
<!--===============================================================================================-->
	<script src="main5.js"></script>

</body>
</html>