</div>
<div class="sidebar">
    <!-- SIDEBAR -->
    <div class="title">
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<div class="title">
            <h4>Manage Your Account</h4>
            </div>
            <ul>
            <li><a href="renew.php" title="Renew Your Account">Renew Account</a></li>
            <li><a href="change_password.php" title="Change Your Password"> Change Password</a></li>
            <li><a href="favorites.php" title="View Your Favorite Pages"> Favorites</a></li>
            <li><a href="recommendations.php" title="View Your Recommendations">Recommendations</a></li>
            <li><a href="logout.php " title="Logout">Logout</a></li>
            </ul>
            ';

            if (isset($_SESSION['user_admin'])) {
                echo '<div class="title">
                <h4>Administration</h4>
                </div>
                <ul>
                <li><a href="add_page.php" title="Add a Page">Add Page</a></li>
                <li><a href="add_pdf.php" title="Add a PDF">Add PDF</a></li>
                <li><a href="#" title="Blah">Blah</a></li>
                </ul>
                ';
            }
        } else {
            require('./includes/login_form.inc.php');
        }
    ?>

    <ul>
        <?php
        $q = 'SELECT * FROM categories ORDER BY category';
        $r = mysqli_query($dbc, $q);
        while (list($id, $category) = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo '<li><a href="category.php?id=' . $id . '" title="' . $category .'">' . $category . '</a></li>';
        }
        ?>
    </ul>
    <!-- END SIDEBAR -->
</div>
<div class="footer">
    <p><a href="site_map.php" title="Site Map">Site Map</a> | <a href="policies.php" title="Site Policies">Policies</a>
        &nbsp;&nbsp; &copy; Knowledge is Power | Design by <a href="http://www.spyka.net">spyka webmaster</a></p>
</div>
</div> <!-- END PAGE -->
</div>
</body>

</html>