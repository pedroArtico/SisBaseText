<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Gerenciamento de Fontes</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->
      <link rel="icon" type="image/png" href="register.ico"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="icon-font.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="animate.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="util2.css">
      <link rel="stylesheet" type="text/css" href="main2.0.css">
      <!--===============================================================================================-->
   </head>
   <body onload="self.opener.location.reload();">
      <div class="container-contact100">
         <div class="wrap-contact100">
            <form id="crudForm" autocomplete="off" method="post" action="">
               <span class="contact100-form-title" style="text-align:center">
               Área de Gerenciamento de Fontes
               </span>
               <div id="optionCrud" class="wrap-input100 input100-select">
                  <span class="label-input100">Escolha uma opção</span>
                  <div>
                     <select class="selection-2" id="option" name="option" onchange="invisibleFields(this)">
                        <option value="0">Selecione</option>
                        <option value="1">Cadastrar fonte</option>
                        <option value="2">Consultar fonte</option>
                        <option value="3">Excluir fonte</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="divCrud1" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Fontes de pesquisa</span>
                  <div>
                     <select class="selection-2"  id="sources" name="sources" title="" onchange="changeSources(this)">
                        <option value="0">Lista de Fontes</option>
                        <?php
                           error_reporting(E_ERROR | E_WARNING | E_PARSE);
                           require_once 'SourceManagement.php';
                           $a = new SourceManagement();
                           $a->addSource();
                           $a->deleteSource();
                           $a->listSources();
                           ?>							
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="divCrud2" class="wrap-input100 rs1-wrap-input100 validate-input" style="display:none">
                  <span class="label-input100">Nome da fonte</span>
                  <input class="input100" type="text" id="url_name" name="url_name" maxlength="255" value="" title="" placeholder="Insira o nome da fonte">
               </div>
               <div id="divCrud3" class="wrap-input100" style="display:none">
                  <span class="label-input100">URL</span>
                  <input id="url_register" name="url_register" class="input100" type="text" maxlength="255" value="" title="" placeholder="Insira a URL da fonte">
               </div>
               <div id="divCrud4"class="container-contact100-form-btn" style="display:none">
                  <div class="wrap-contact100-form-btn">
                     <div class="contact100-form-bgbtn"></div>
                     <button id="add" name="add" class="contact100-form-btn" type="submit" value="Cadastrar">
                     Cadastrar
                     </button>
                  </div>
               </div>
               <div id="divCrud5" class="container-contact100-form-btn" style="display:none">
                  <div class="wrap-contact100-form-btn">
                     <div class="contact100-form-bgbtn"></div>
                     <button id="delete" name="delete" class="contact100-form-btn" type="submit" value="Excluir">
                     Excluir
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
      <!--===============================================================================================-->
      <script src="jquery-3.2.1.min.js"></script>
      <script src="crud1.js"></script>	
      <script src="crudJquery.js"></script>
      <script src="valCrud.js"></script>
      <!--===============================================================================================-->
      <script src="popper.js"></script>
      <script src="bootstrap.min.js"></script>
      <!--===============================================================================================-->
      <script src="select2.min.js"></script>
      <!--===============================================================================================-->
      <script src="select2.min.js"></script>
      <script>
         $(".selection-2").select2({
         	minimumResultsForSearch: 20,
         	dropdownParent: $('#dropDownSelect1')
         });
      </script>
   </body>
</html>