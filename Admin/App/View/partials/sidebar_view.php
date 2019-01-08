        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>

                        <a <?php echo ($name == 'dashboard') ? 'class="active-link"' : '' ?> href="?c=dashboard" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php echo ($name == 'product') ? 'active-link' : '' ?>" href="?c=product"><i class="fa fa-table "></i>Products</a>
                    </li>
                    <li>
                        <a class="<?php echo ($name == 'category') ? 'active-link' : '' ?>" href="?c=category"><i class="fa fa-table "></i>Categories</a>
                    </li>
                    <li>
                        <a class="<?php echo ($name == 'users') ? 'active-link' : '' ?>" href="?c=users"><i class="fa fa-table "></i>Users</a>
                    </li>
                    
                     <li>
                        <a class="<?php echo ($name == 'orders') ? 'active-link' : '' ?>" href="?c=orders"><i class="fa fa-table "></i> Orders </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">