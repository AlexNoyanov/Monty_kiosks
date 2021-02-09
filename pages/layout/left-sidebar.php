<?php
  function isActive($menu, $mode="full"){
    global $active_menu;
    if ($mode == "partial")
      echo ($active_menu == $menu? "active": "");
    else
      echo ($active_menu == $menu? "class='active'": "");
  }
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li <?php isActive("info") ?>>
          <a href="../../pages/dashboard2"><i class="fa fa-circle-o"></i> Info</a>
        </li>

        <li <?php isActive("edit") ?>>
          <a href="../../pages/tables/simple_tables.php"><i class="fa fa-circle-o"></i> Settings </a>
        </li>            

        <li <?php isActive("documentation") ?>>
          <a href="../../pages/documentation/documentation.php">
            <i class="fa fa-book"></i> 
            <span>Documentation</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
