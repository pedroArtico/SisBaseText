<!DOCTYPE html>
<html lang="en">
   <head>
      <title>SisBaseText</title>
      <meta charset="UTF-8">
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
      <link rel="stylesheet" type="text/css" href="hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="animsition.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="daterangepicker.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="util.css">
      <link rel="stylesheet" type="text/css" href="main.css">
      <!--===============================================================================================-->
   </head>
   <body>
      <div class="container-contact100">
         <div class="wrap-contact100">
            <form id="searchP" name="searchP" autocomplete="off" method="post"  action="">
               <span class="contact100-form-title">
               Área de busca
               </span>
               <div id="div1" class="wrap-input100 input100-select">
                  <span class="label-input100">Busca</span>
                  <div>
                     <select class="selection-2" id="optionS" name="optionS" onchange="invisibleFields(this)">
                        <option value="0">Escolha uma busca</option>
                        <option value="1">Busca por URL</option>
                        <option value="2">Busca com/sem fonte</option>
                        <option value="3">Busca em rede social</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>					
               </div>
               <div id="div2" class="wrap-input100 validate-input" style="display:none">
                  <span class="label-input100">URL</span>
                  <input id="url" name="url" class="input100" type="text" maxlength="255" value="" placeholder="Digite uma URL">
                  <span class="focus-input100"></span>
               </div>
               <div id="div3" class="wrap-input100 validate-input" style="display:none">
                  <span class="label-input100">Perfil</span>
                  <input id="key" name="key" class="input100" type="text" maxlength="255" value="" placeholder="Digite um perfil">
                  <span class="focus-input100"></span>
               </div>
               <div id="div4" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Buscador</span>
                  <div>
                     <select class="selection-2" id="websearch" name="websearch" >
                        <option value="0">Escolha um buscador</option>
                        <option value="google">Google</option>
                        <option value="google noticias">Google Notícias</option>
                        <option value="bing">Bing</option>
                        <option value="bing noticias">Bing Notícias</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="div5" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Ano</span>
                  <div>
                     <select class="selection-2" id="year" name="year">
                        <option value="0">Escolha um ano</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                         <option value="">Não especificar</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="div6" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Busca por fonte?</span>
                  <div>
                     <select class="selection-2" name="sourceSearch" id="sourceSearch" onchange="onChangeOptSource(this)">
                        <option value="0">Escolha uma opção</option>
                        <option value="sim">Sim</option>
                        <option value="não">Não</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="div7" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Fonte</span>
                  <div>
                     <select class="selection-2"  id="source" name="source" >
                        <option  value="0">Escolha uma fonte</option>
                         <?php
                         require_once 'SearchWindow.php';
                         $GUI= new SearchWindow();
                         $GUI->reloadSourceFile();
                         $GUI->cleanTemporaryFiles();
                         ?>
                     </select>
                  </div>
               </div>
               <div id="div8" class="container-contact100-form-btn" style="display:none">
                  <span class="label-input100">Gerenciamento de fontes</span>
                  <br/>
                  <div class="wrap-contact100-form-btn">
                     <div class="contact100-form-bgbtn"></div>
                     <button id="register" class="contact100-form-btn" type="button" name="register" value="Abrir gerenciador de fontes" onclick="window.open('crud.php')">
                     <span>
                     Abrir gerenciador de fontes
                     <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                     </span>
                     </button>
                  </div>
                  <span class="focus-input100"></span>
                  <br/>
               </div>
               <div id="div9" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Rede Social</span>
                  <div>
                     <select class="selection-2" name="socialNetwork" id="socialNetwork">
                        <option value="0">Escolha uma rede social</option>
                        <option value="twitter">Twitter</option>
                        <option value="instagram">Instagram</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
                <div id="div12" class="wrap-input100 input100-select" style="display:none">
                    <span class="label-input100">Tipo de atributo</span>
                    <div>
                        <select class="selection-2" name="baseType" id="baseType">
                            <option value="0">Selecione um tipo de atributo principal</option>
                            <option value="textBase">Base de textos</option>
                            <option value="sentenceBase">Base de sentenças</option>
                            <option value="wordBase">Base de palavras</option>
                        </select>
                    </div>
                </div>
               <div id="div10" class="wrap-input100 input100-select" style="display:none">
                  <span class="label-input100">Sumarização Extrativa</span>
                  <div>
                     <select class="selection-2" id="summarization" name="summarization">
                        <option value="0">Escolha uma opção</option>
						<option value="não">Não sumarizar</option>
                        <option value="0.90">90%</option>
                        <option value="0.80">80%</option>
                        <option value="0.70">70%</option>
                        <option value="0.60">60%</option>
                        <option value="0.50">50%</option>
                        <option value="0.40">40%</option>
                        <option value="0.30">30%</option>
                        <option value="0.20">20%</option>
                        <option value="0.10">10%</option>
                     </select>
                  </div>
                  <span class="focus-input100"></span>
               </div>
               <div id="div11" class="container-contact100-form-btn" style="display:none">
                  <div class="wrap-contact100-form-btn">
                     <div class="contact100-form-bgbtn"></div>
                     <button id="submit" name="submit" class="contact100-form-btn" type="submit" value="Buscar">
                     <span>
                     Buscar
                     <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                     </span>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
      <!--===============================================================================================-->
      <script src="jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
      <script src="animsition.min.js"></script>
      <!--===============================================================================================-->
      <script src="popper.js"></script>
      <script src="bootstrap.min.js"></script>
      <!--===============================================================================================-->
      <script src="select2.min.js"></script>
      <script>
         $(".selection-2").select2({
         	minimumResultsForSearch: 20,
         	dropdownParent: $('#dropDownSelect1')
         });
      </script>
      <!--===============================================================================================-->
      <script src="moment.min.js"></script>
      <script src="daterangepicker.js"></script>
      <!--===============================================================================================-->
      <script src="countdowntime.js"></script>
      <!--===============================================================================================-->
      <script src="main.js"></script>
      <script src="searchField.js"></script>
      <script src="jqueryValidationSearchs.js"></script>
      <script src="validationFields.js"></script>
   </body>
</html>

<?php
require_once 'URLSearch.php';
require_once 'GenericSearch.php';
require_once 'SpecificSearch.php';
require_once 'SocialNetworkSearch.php';

$urlSearch = new URLSearch();
$genericSearch = new GenericSearch();
$specificSearch = new SpecificSearch();
$socialNetworkSearch = new SocialNetworkSearch();
$urlSearch->searching();
$genericSearch->searching();
$specificSearch->searching();
$socialNetworkSearch->searching();
?>