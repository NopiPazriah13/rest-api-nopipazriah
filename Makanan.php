<?php
require_once "index.php";
$makanan = new Makanan();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id_makanan"]))
         {
            $id_makanan=intval($_GET["id_makanan"]);
            $makanan->getmakananbyid($id_makanan);
         }
         else
         {
            $makanan->getmakanan();
         }
         break;
   case 'POST':
         if(!empty($_GET["id_makanan"]))
         {
            $id_makanan=intval($_GET["id_makanan"]);
            $makanan->update_makanan($id_makanan);
         }
         else
         {
            $makanan->insert_makanan();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id_makanan"]);
            $makanan->delete_makanan($id_makanan);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}
 
 
 
 
?>