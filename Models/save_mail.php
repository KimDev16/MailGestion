<?php
 $no_courrier=$_POST['NO_COURRIER'];
 $date_COURRIER=$_POST['date_COURRIER'];
 $type_courrier=$_POST['type_courrier'];
 $RECU_courrier=$_POST['RECU_courrier'];
 $source_courrier=$_POST['source_courrier'];
 $nature_courrier=$_POST['nature_courrier'];
 $detination_courriers=$_POST['detination_courrier'] ?? [];
 $analyse=$_POST['analyse'];
if( $RECU_courrier==0)
{
   $nature_courrier=0;
}
print_r($detination_courriers);
 


 include 'connexion.php';

 $conn->beginTransaction();

 $sqlCourrier = "INSERT INTO COURRIER (NO_COURRIER, DATE_COURRIER, TYPE_COURRIER,COURRIER_RECU,ANALYSE,STRUCTURE_SOURCE_DE,nature_courrier)
 VALUES ( $no_courrier,'$date_COURRIER' , $type_courrier,$RECU_courrier,'$analyse',$source_courrier,$nature_courrier)";

 try {
    $conn->query($sqlCourrier);
    $lastId = $conn->lastInsertId();
    foreach ($detination_courriers as $selection) {
      $sqlDestination = "INSERT INTO destination_courrier (ID_COURRIER, ID_SOURCE) VALUES ($lastId  ,$selection)";
      $conn->query($sqlDestination);
   }
    $conn->commit();
    header("Location: ../pages/all_mail.php?success=تم الحفظ بنجاح");
 }
 catch(Exception $e) {
    $conn->rollback();
    echo $e->message();
    //header("Location: ../pages/all_mail.php?error=$e->message()");
 }






?>