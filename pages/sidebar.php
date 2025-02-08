<nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <img src="./img/logo.png" class="logo" alt="">
      <h3 class="hide">ادارة البريد</h3>
    </div>

    <div class="search">
    <i class='bx bx-search'></i>
   
    </div>

    <div class="sidebar-links">
      <h4 class="hide">البريد</h4>
      <ul>
        <li class="tooltip-element" data-tooltip="0">
          <a style="text-decoration: none;" href="all_mail.php" class="<?php echo $all_mail ?>" data-active="0">
            <div class="icon">
            <i class='bx bx-folder'></i>
            <i class='bx bxs-folder'></i>

            </div>
            <span   class="link hide">البريد الكلي</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a  style="text-decoration: none;" href="sent_mail.php" class="<?php echo $sent_mail ?>" data-active="1">
           <div class="icon">
 <i class='bx bx-folder'></i>
              <i class='bx bxs-folder'></i>            </div>
            <span  class="link hide">البريد الصادر</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a style="text-decoration: none;" href="received_mail.php" class="<?php echo $rec_mail ?>" data-active="2">
            <div class="icon">
            <i class='bx bx-folder'></i>
            <i class='bx bxs-folder'></i>            </div>
            <span  class="link hide">البريد الوارد</span>
          </a>
        </li>
       
        <div class="tooltip">
          <span class="show">البريد الكلي</span>
          <span>البريد الصادر</span>
          <span>البريد الوارد</span>
        </div>
      </ul>

      

      <ul>
        <h4 class="hide">الإعدادات</h4>
        <li class="tooltip-element" data-tooltip="0">
          <a style="text-decoration: none;" href="#" data-active="4">
            <div class="icon">
              <i class='bx bx-notepad'></i>
              <i class='bx bxs-notepad'></i>
            </div>
            <span  class="link hide">إعدادات التطبيقية</span>
          </a>
        </li>
     
        <div class="tooltip">
          <span class="show">إعدادات التطبيقية</span>
         
        </div>
      </ul>
    </div>

  
  </nav>