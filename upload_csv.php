<?php
include_once "connection.php";
session_start();
ob_start();
$file =$_FILES['file_csv'];

$row_first = true;
$not_import_row = 0;
$import_row = 0;
$not_import_user = 0;

if($file['type'] == "text/csv"){
   $data_file = fopen($file['tmp_name'], "r");
   while ($row = fgetcsv($data_file,1000, ";")){
       if($row_first){
           $row_first = false;
           continue;
       }
       array_walk_recursive($row, "convert");
      // var_dump($row);

     $query_user =  "INSERT INTO usuarios (cpf, nome, email, endereco) VALUES (:cpf, :nome, :email, :endereco )";
       $registration_user = $conn->prepare($query_user);
       $registration_user->bindValue(':cpf', ($row[0] ?? "NULL"));
       $registration_user->bindValue(':nome', ($row[1] ?? "NULL"));
       $registration_user->bindValue(':email', ($row[2] ?? "NULL"));
       $registration_user->bindValue(':endereco', ($row[3] ?? "NULL"));

       $registration_user->execute();
       if($registration_user->rowCount()){
           $import_row++;
       }else{
           $not_import_row;
           $not_import_user = $not_import_user .", " . ($row[0] ?? "NULL");
       }

   }
   if (!empty($not_import_user)){
       $not_import_user ="Usuários não importados $not_import_row";

   }
    //echo "arquivo Correto";
    $_SESSION['msg'] = "<p>{$import_row} linha(s) importada(s), $not_import_row linha(s) não importada(s).</p>";
   header("Location: index.php");
}else{

    $_SESSION['msg'] =  "<p>Arquivo não localizado ou Arquivo incorreto - Necessário enviar arquivo .CSV</p>";
    header("Location: index.php");

}

//var_dump($file);
function convert(&$data_file)
 {
     $data_file = mb_convert_encoding($data_file,"UTF-8","ISO-8859-1");

 }