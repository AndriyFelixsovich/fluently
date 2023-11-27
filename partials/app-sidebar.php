<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
    <div class="dashboard_sidebar_user">
        <img src="images/user-1.jpg" alt="" id="userImage">
        <span><?php echo $user['first_name'] ?></span>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menus_lists">
<!--            class="menuActive"-->
            <li>
                <a href="./dashboard.php"><i class="fa-solid fa-palette"></i><span class="menuText">Dashboard</span></a>
            </li>
            <li>
                <a href="./users-add.php"><i class="fa fa-user-plus"></i><span class="menuText">Add user</span></a>
            </li>
            <li>
                <a href="./modules-add.php"><i class="fa fa-user-plus"></i><span class="menuText">Add modules</span></a>
            </li>
        </ul>
    </div>
</div>