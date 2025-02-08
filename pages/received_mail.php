<?php
 $all_mail="";
 $rec_mail="active";
 $sent_mail="";
?>
<!DOCTYPE html>
<html lang="en" style="direction:rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Menu</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
  <?php include 'sidebar.php'; ?> <!-- Reuse the sidebar -->



  <main>

   <h3><div  class="alert alert-danger" style="text-align:center;">البريد الوارد</div></h3>

    <?php include '../Models/connexion.php' ?>
    <?php $result = $conn -> query("SELECT * FROM COURRIER where courrier_recu=1") ?>
    <table class="table table-striped" style="text-align:center">
      <tr>
          <th>#</th>
          <th>رقم البريد</th>
          <th>تاريخ البريد</th>
          <th>نوع البريد</th>
          <th>صادر/وارد</th>
          <th>التحليل</th>
          <th>المصدر/الوجهة</th>

          <th>حذف</th>
       </tr>
       <?php while ($row = $result -> fetch()) {
                $resulttype = $conn -> query("SELECT * FROM type_courrier where id_courrier=".$row[4]) ;
                $rowtype = $resulttype -> fetch()
            
            ?>
       <tr>
          
              <th><?= $row[0]?></th>
              <th><?=$row[1]?></th>
              <th><?=$row[2]?></th>
              <th><?=$rowtype[1]?></th>
              <th><?php if($row[6]==1){ ?><i style="color:red" class="fa-solid fa-arrow-down"></i><?php }else{?><i style="color:green" class="fa-solid fa-arrow-up"></i><?php } ?></th>
              <th><button class="btn btn-primary">معاينة التحليل</button></th>
              <th><button class="btn btn-info">المصدر</button><button class="btn btn-secondary mx-1">الوجهة</button></th>
              <th><button class="btn btn-danger">حدف</button><button class="btn btn-warning mx-1">تعديل</button></th>

       </tr>
       <?php } ?>

    </table>
  </main>

  <script src="../style/script.js"></script>
</body>

</html>