<?php include '../Models/connexion.php' ;
$all_mail="active";
$rec_mail="";
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

<body style="overflow-x: auto;">

<?php include 'sidebar.php'; ?> <!-- Reuse the sidebar -->


  <main>
    <?php 
      if(isset($_GET['success']))
      { ?>
        <h6><div  class="alert alert-success" style="text-align:center;"><?= $_GET['success'] ?></div></h6>

      <?php }
      if(isset($_GET['error']))
      {?>
        <h6><div  class="alert alert-danger" style="text-align:center;"><?= $_GET['error'] ?></div></h6>

      <?php } ?>
    
    <h3><div  class="alert alert-primary" style="text-align:center;">البريد الكلي</div></h3>
    <!-- Button trigger modal -->
    <button style="width:100px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    اضافة بريد
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content" style="width:700px">
          <div class="modal-header">
            <h1 class="modal-title fs-5 alert alert-primary w-100" id="exampleModalLabel">اضافة بريد</h1>
          </div>
          <div class="modal-body">
              <form method="POST" action="../Models/save_mail.php">
                <div class="row mb-3">
                  <label for="NO_COURRIER" class="col-sm-2 col-form-label">رقم البريد</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="NO_COURRIER"name="NO_COURRIER" required min="1">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="date_COURRIER" class="col-sm-2 col-form-label">تاريخ البريد</label>
                  <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="NO_COURRIER"name="date_COURRIER" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="type_courrier" class="col-sm-2 col-form-label">نوع البريد</label>
                  <div class="col-sm-10">
                    <select name="type_courrier" class="form-select" aria-label="Default select example" required>
                      <?php  $resulttype1 = $conn -> query("SELECT * FROM type_courrier") ;
                              while ($rowtype1 = $resulttype1 -> fetch()) 
                              { ?>

                                <option value="<?= $rowtype1[0] ?>"> <?= $rowtype1[1] ?> </option>

                      <?php    }  ?>
                      
                      
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="RECU_courrier" class="col-sm-2 col-form-label">صادر/وارد</label>
                  <div class="col-sm-10">
                    <select id="RECU_courrier"  name="RECU_courrier" onclick="natureCourrier()" class="form-select" aria-label="Default select example" required>
                        <option value="0"> صادر </option>
                        <option value="1"> وارد </option>
                    </select>
                  </div>
                </div>

                <div id="show" style="visibility:hidden" class="row mb-3">
                  <label for="nature_courrier" class="col-sm-2 col-form-label">طبيعة العمل</label>
                  <div class="col-sm-10">
                    <select id="nature_courrier"  name="nature_courrier"  class="form-select" aria-label="Default select example" required>
                    <option value="1"> قراءة</option>
                    <option value="2"> رد </option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="source_courrier" class="col-sm-2 col-form-label">المصدر</label>
                  <div class="col-sm-10">
                    <select name="source_courrier" class="form-select" aria-label="Default select example" required >
                      <?php  $resultstructure_source = $conn -> query("SELECT * FROM structure_source") ;
                              while ($rowstructure_source = $resultstructure_source -> fetch()) 
                              { ?>

                                <option value="<?= $rowstructure_source[0] ?>"> <?= $rowstructure_source[1] ?> </option>

                      <?php    }  ?>
                      
                      
                    </select>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="detination_courrier" class="col-sm-2 col-form-label">الوجهة</label>
                  <div class="col-sm-10">
                  <select name="detination_courrier[]"  multiple="detination_courrier" id="detination_courrier">
                    <?php  $resultstructure_source = $conn -> query("SELECT * FROM structure_source") ;
                                while ($rowstructure_source = $resultstructure_source -> fetch()) 
                                { ?>
                                  <option value="<?= $rowstructure_source[0] ?>"> <?= $rowstructure_source[1] ?> </option>
                        <?php    }  ?>
                    
                  </select>
                   
                  </div>
                </div>

                <div class="form-floating">
                  <textarea class="form-control" placeholder="اضافة تحليل " id="analyse" name="analyse" required></textarea>
                  <label for="floatingTextarea">التحليل</label>
                </div>


                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </form>
          </div>
         
        </div>
      </div>
    </div>
    </br>
    <?php $result = $conn -> query("SELECT * FROM COURRIER order by `DATE_COURRIER` DESC") ?>
    <table class="table table-striped" style="text-align:center;">
      <tr>
          <th>#</th>
          <th>رقم البريد</th>
          <th>تاريخ البريد</th>
          <th>نوع البريد</th>
          <th>طبيعة العمل</th>
          <th>صادر/وارد</th>
          <th>التحليل</th>
          <th>المصدر/الوجهة</th>
          <th>حذف</th>

       </tr>
       <?php while ($row = $result -> fetch()) {
                $resulttype = $conn -> query("SELECT * FROM type_courrier where id_courrier=".$row[4]) ;
                $rowtype = $resulttype -> fetch();

                $a='';
                if($row[7]==0)
                {
                  $a="/";
                }
                if($row[7]==1)
                {
                  $a="قراءة";
                }
                if($row[7]==2)
                {
                  $a="رد";

                }
            
            ?>
       <tr>
          
              <th><?= $row[0]?></th>
              <th><?=$row[1]?></th>
              <th><?=$row[2]?></th>
              <th><?=$rowtype[1]?></th>
              <th><?=$a?></th>
              <th><?php if($row[6]==1){ ?><i style="color:red" class="fa-solid fa-arrow-down"></i><?php }else{?><i style="color:green" class="fa-solid fa-arrow-up"></i><?php } ?></th>
              <!-- Button trigger modal -->
              <th>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $row[0] ?>">
                    معاينة التحليل  
                  </button>
              </th>

              <!-- Analyse Modal  -->
              <div class="modal fade" id="modal<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h1 class="modal-title fs-5" id="exampleModalLabel">التحليل</h1>
                    </div>
                    <div class="modal-body">
                       <?php echo $row[3] ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                  </div>
                </div>
              </div>



              <th>
                  <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalsour<?= $row[0] ?>">المصدر</button>
                  <button class="btn btn-secondary mx-1" data-bs-toggle="modal" data-bs-target="#modaldes<?= $row[0] ?>">الوجهة</button>
                </th>
              <!-- source  Modal  -->
              <div class="modal fade" id="modalsour<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h1 class="modal-title fs-5" id="exampleModalLabel">المصدر</h1>
                    </div>
                    <div class="modal-body">
                    <?php
                         $resultsource = $conn -> query("SELECT * FROM structure_source where ID_SOURCE=".$row[5]) ;
                         $source = $resultsource -> fetch() ;
                          echo $source[1];
                     ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- source  Modal  -->
              <div class="modal fade" id="modaldes<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                     
                      <h1 class="modal-title fs-5" id="exampleModalLabel">الوجهة</h1>
                    </div>
                    <div class="modal-body">
                    <ol class="p-3">
                    <?php
                         $resultdest = $conn -> query("SELECT * FROM destination_courrier where ID_COURRIER=".$row[0]) ;
                         while ($rowdes = $resultdest -> fetch()) 
                         {
                          $resultdesticour = $conn -> query("SELECT * FROM structure_source where ID_SOURCE=".$rowdes[2]) ;
                          $sourceCour = $resultdesticour -> fetch() ;
                          echo "<li>$sourceCour[1]</li>";
                         }
                     ?>
                    </ol>
                   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                  </div>
                </div>
              </div>
              <th><button class="btn btn-danger">حدف</button></th>

       </tr>
       <?php } ?>

    </table>
  </main>

  <script src="../style/script.js"></script>
  <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
  <script>
     function natureCourrier()
     {
      var type=document.getElementById("RECU_courrier").value;
       
       if(type==1)
       {
        document.getElementById("show").style.visibility="visible"
  
       }
       else{
        document.getElementById("show").style.visibility="hidden"

       }
     }
  </script>


</body>

</html>