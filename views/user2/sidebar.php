<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

            <div class="pull-left info">
                <p>Welcome, <?php echo $_SESSION["fname"]; ?></p>
            </div>
        </div>
        
        
        <!-- sidebar vhvjh -->
        <ul class="sidebar-menu">
            <li id="dash" >
                <a href="index.php">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>
            
            <li id="damtree" class="treeview">
                <a href="">
                    <i class="fa fa-edit"></i> <span>Disciplinary Action</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" >
                    <li id="dam_manage" ><a href="index.php?page=dam_manage"><i class="fa fa-angle-double-right"></i>View</a></li>
                    <li id="dam_reg" ><a href="index.php?page=dam_reg"><i class="fa fa-angle-double-right"></i>Register</a></li>
                    
                </ul>
            </li>
           

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
 