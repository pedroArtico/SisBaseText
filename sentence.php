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
      <link rel="stylesheet" type="text/css" href="select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="util4.css">
      <link rel="stylesheet" type="text/css" href="main4.0.css">
      <!--===============================================================================================-->
       <script type="text/javascript">
           self.opener.close();
       </script>
   </head>
   <body>
      <div class="bg-contact2">
         <div class="container-contact2">
            <div class="wrap-contact2">
               <form class="contact2-form validate-form" autocomplete="off" method="post">
                  <span class="contact2-form-title">
                  Área de seleção de conteúdo
                  </span>
                  <div class="container-contact100-form-btn" style="padding-left:480px;">
                     <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button id="sentenceEditButton" name="sentenceEditButton" class="contact100-form-btn" type="button" value="Editar" hidden="true">
                        <span>
                        Editar
                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                        </button>
                     </div>
                  </div>
                   <?php
                   require_once 'ContentSelectionWindow.php';
                   $show = new ContentSelectionWindow();
                   $show->defineTextualDatabaseType();
                   $show->getSelectedContent();
                   ?>
                  <div class="container-contact100-form-btn">
                     <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button id="createButton" name="createButton" class="contact100-form-btn" type="submit" value="Exportar" onclick="window.open('dataSet.php')">
                        <span>
                        Criar Base
                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--===============================================================================================-->
      <script src="jquery-3.2.1.min.js"></script>
      <script src="main4.js"></script>
      <!--===============================================================================================-->
      <script src="popper.js"></script>
      <script src="bootstrap.min.js"></script>
      <!--===============================================================================================-->
      <script src="select2.min.js"></script>
   </body>
</html>