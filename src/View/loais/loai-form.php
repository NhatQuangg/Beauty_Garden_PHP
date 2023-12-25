<!-- sanpham-list.php -->
<?php ob_start(); ?>

<!-- Nút để hiển thị form thêm sản phẩm -->
 <style>
        #Form .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px; /* Giảm độ lớn của margin để tránh lỗi dòng */
            margin-left: -15px;  /* Giảm độ lớn của margin để tránh lỗi dòng */
        }

        #Form .form-group {
            flex: 0 0 33.3333%; /* Chia đều 3 cột */
            padding-right: 15px; /* Tăng margin phải để tạo khoảng cách giữa các cột */
            padding-left: 15px;  /* Tăng margin trái để tạo khoảng cách giữa các cột */

        }
        

        :root {
        scroll-behavior: smooth;
        }

        body {
        font-family: "Open Sans", sans-serif;
        background: #f6f9ff;
        color: #444444;
        }

        a {
        color: #4154f1;
        text-decoration: none;
        }

        a:hover {
        color: #717ff5;
        text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
        font-family: "Nunito", sans-serif;
        }

        /*--------------------------------------------------------------
        # Main
        --------------------------------------------------------------*/
        #main {
        margin-top: 60px;
        padding: 20px 30px;
        transition: all 0.3s;
        }

        @media (max-width: 1199px) {
        #main {
            padding: 20px;
        }
        }

        /*--------------------------------------------------------------
        # Page Title
        --------------------------------------------------------------*/
        .pagetitle {
        margin-bottom: 10px;
        }

        .pagetitle h1 {
        font-size: 24px;
        margin-bottom: 0;
        font-weight: 600;
        color: #012970;
        }

        /*--------------------------------------------------------------
        # Nút trở lên đầu trang góc phải dưới
        --------------------------------------------------------------*/
        .back-to-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: 15px;
        z-index: 99999;
        background: #4154f1;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        transition: all 0.4s;
        }

        .back-to-top i {
        font-size: 24px;
        color: #fff;
        line-height: 0;
        }

        .back-to-top:hover {
        background: #6776f4;
        color: #fff;
        }

        .back-to-top.active {
        visibility: visible;
        opacity: 1;
        }

        /*--------------------------------------------------------------
        # Dropdown menu giỏ hàng và profile
        --------------------------------------------------------------*/
        /* Dropdown menus */

        .dropdown-menu {
        border-radius: 4px;
        padding: 10px 0;
        animation-name: dropdown-animate;
        animation-duration: 0.2s;
        animation-fill-mode: both;
        border: 0;
        box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);
        }

        .dropdown-menu .dropdown-header,
        .dropdown-menu .dropdown-footer {
        text-align: center;
        font-size: 15px;
        padding: 10px 25px;
        }

        .dropdown-menu .dropdown-footer a {
        color: #444444;
        text-decoration: underline;
        }

        .dropdown-menu .dropdown-footer a:hover {
        text-decoration: none;
        }

        .dropdown-menu .dropdown-divider {
        color: #a5c5fe;
        margin: 0;
        }

        .dropdown-menu .dropdown-item {
        font-size: 14px;
        padding: 10px 15px;
        transition: 0.3s;
        }

        .dropdown-menu .dropdown-item i {
        margin-right: 10px;
        font-size: 18px;
        line-height: 0;
        }

        .dropdown-menu .dropdown-item:hover {
        background-color: #f6f9ff;
        }

        @media (min-width: 768px) {
        .dropdown-menu-arrow::before {
            content: "";
            width: 13px;
            height: 13px;
            background: #fff;
            position: absolute;
            top: -7px;
            right: 20px;
            transform: rotate(45deg);
            border-top: 1px solid #eaedf1;
            border-left: 1px solid #eaedf1;
        }
        }

        @keyframes dropdown-animate {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }

        0% {
            opacity: 0;
        }
        }

        /* Card */
        .card {
        margin-bottom: 30px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
        }

        .card-header,
        .card-footer {
        border-color: #ebeef4;
        background-color: #fff;
        color: #798eb3;
        padding: 15px;
        }

        .card-title {
        padding: 20px 0 15px 0;
        font-size: 25px;
        font-weight: 600;
        color: #012970;
        /*  font-family: "Nunito", sans-serif;*/
        }

        .card-title span {
        color: #899bbd;
        font-size: 14px;
        font-weight: 400;
        }

        .card-body {
        padding: 0 20px 20px 20px;
        }

        .card-img-overlay {
        background-color: rgba(255, 255, 255, 0.6);
        }

        /* Alerts */
        .alert-heading {
        font-weight: 500;
        font-family: "Poppins", sans-serif;
        font-size: 20px;
        }

        /* Close Button */
        .btn-close {
        background-size: 25%;
        }

        .btn-close:focus {
        outline: 0;
        box-shadow: none;
        }


        /* Breadcrumbs */
        .breadcrumb {
        font-size: 14px;
        font-family: "Nunito", sans-serif;
        color: #899bbd;
        font-weight: 600;
        }

        .breadcrumb a {
        color: #899bbd;
        transition: 0.3s;
        }

        .breadcrumb a:hover {
        color: #51678f;
        }

        .breadcrumb .breadcrumb-item::before {
        color: #899bbd;
        }

        .breadcrumb .active {
        color: #51678f;
        font-weight: 600;
        }

        /* Bordered Tabs */
        .nav-tabs-bordered {
        border-bottom: 2px solid #ebeef4;
        }

        .nav-tabs-bordered .nav-link {
        margin-bottom: -2px;
        border: none;
        color: #2c384e;
        }

        .nav-tabs-bordered .nav-link:hover,
        .nav-tabs-bordered .nav-link:focus {
        color: #4154f1;
        }

        .nav-tabs-bordered .nav-link.active {
        background-color: #fff;
        color: #4154f1;
        border-bottom: 2px solid #4154f1;
        }

        /*--------------------------------------------------------------
        # Header
        --------------------------------------------------------------*/
        .logo {
        line-height: 1;
        }

        @media (min-width: 1200px) {
        .logo {
            width: 280px;
        }
        }

        .logo img {
        max-height: 26px;
        margin-right: 6px;
        }

        .logo span {
        font-size: 26px;
        font-weight: 700;
        color: #012970;
        font-family: "Nunito", sans-serif;
        }

        .header {
        transition: all 0.5s;
        z-index: 997;
        height: 60px;
        box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
        background-color: #fff;
        padding-left: 20px;
        /* Toggle Sidebar Button */
        /* Search Bar */
        }

        .header .toggle-sidebar-btn {
        font-size: 32px;
        padding-left: 10px;
        cursor: pointer;
        color: #012970;
        }

        .header .search-bar {
        min-width: 360px;
        padding: 0 20px;
        }

        @media (max-width: 1199px) {
        .header .search-bar {
            position: fixed;
            top: 50px;
            left: 0;
            right: 0;
            padding: 20px;
            box-shadow: 0px 0px 15px 0px rgba(1, 41, 112, 0.1);
            background: white;
            z-index: 9999;
            transition: 0.3s;
            visibility: hidden;
            opacity: 0;
        }

        .header .search-bar-show {
            top: 60px;
            visibility: visible;
            opacity: 1;
        }
        }

        .header .search-form {
        width: 100%;
        }

        .header .search-form input {
        border: 0;
        font-size: 14px;
        color: #012970;
        border: 1px solid rgba(1, 41, 112, 0.2);
        padding: 7px 38px 7px 8px;
        border-radius: 3px;
        transition: 0.3s;
        width: 100%;
        }

        .header .search-form input:focus,
        .header .search-form input:hover {
        outline: none;
        box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
        border: 1px solid rgba(1, 41, 112, 0.3);
        }

        .header .search-form button {
        border: 0;
        padding: 0;
        margin-left: -30px;
        background: none;
        }

        .header .search-form button i {
        color: #012970;
        }

        /*--------------------------------------------------------------
        # Header Nav
        --------------------------------------------------------------*/
        .header-nav ul {
        list-style: none;
        }

        .header-nav>ul {
        margin: 0;
        padding: 0;
        }

        .header-nav .nav-icon {
        font-size: 22px;
        color: #012970;
        margin-right: 25px;
        position: relative;
        }

        .header-nav .nav-profile {
        color: #012970;
        }

        .header-nav .nav-profile img {
        max-height: 36px;
        }

        .header-nav .nav-profile span {
        font-size: 14px;
        font-weight: 600;
        }

        .header-nav .badge-number {
        position: absolute;
        inset: -2px -8px auto auto;
        font-weight: normal;
        font-size: 12px;
        padding: 3px 6px;
        }

        .header-nav .notifications {
        inset: 8px -15px auto auto !important;
        }

        .header-nav .notifications .notification-item {
        display: flex;
        align-items: center;
        padding: 15px 10px;
        transition: 0.3s;
        }

        .header-nav .notifications .notification-item i {
        margin: 0 20px 0 10px;
        font-size: 24px;
        }

        .header-nav .notifications .notification-item h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        }

        .header-nav .notifications .notification-item p {
        font-size: 13px;
        margin-bottom: 3px;
        color: #919191;
        }

        .header-nav .notifications .notification-item:hover {
        background-color: #f6f9ff;
        }

        .header-nav .messages {
        inset: 8px -15px auto auto !important;
        }

        .header-nav .messages .message-item {
        padding: 15px 10px;
        transition: 0.3s;
        }

        .header-nav .messages .message-item a {
        display: flex;
        }

        .header-nav .messages .message-item img {
        margin: 0 20px 0 10px;
        max-height: 40px;
        }

        .header-nav .messages .message-item h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #444444;
        }

        .header-nav .messages .message-item p {
        font-size: 13px;
        margin-bottom: 3px;
        color: #919191;
        }

        .header-nav .messages .message-item:hover {
        background-color: #f6f9ff;
        }

        .header-nav .profile {
        min-width: 240px;
        padding-bottom: 0;
        top: 8px !important;
        }

        .header-nav .profile .dropdown-header h6 {
        font-size: 18px;
        margin-bottom: 0;
        font-weight: 600;
        color: #444444;
        }

        .header-nav .profile .dropdown-header span {
        font-size: 14px;
        }

        .header-nav .profile .dropdown-item {
        font-size: 14px;
        padding: 10px 15px;
        transition: 0.3s;
        }

        .header-nav .profile .dropdown-item i {
        margin-right: 10px;
        font-size: 18px;
        line-height: 0;
        }

        .header-nav .profile .dropdown-item:hover {
        background-color: #f6f9ff;
        }

        /*--------------------------------------------------------------
        # Sidebar
        --------------------------------------------------------------*/
        .sidebar {
        position: fixed;
        top: 60px;
        left: 0;
        bottom: 0;
        width: 300px;
        z-index: 996;
        transition: all 0.3s;
        padding: 20px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #aab7cf transparent;
        box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
        background-color: #fff;
        }

        @media (max-width: 1199px) {
        .sidebar {
            left: -300px;
        }
        }

        .sidebar::-webkit-scrollbar {
        width: 5px;
        height: 8px;
        background-color: #fff;
        }

        .sidebar::-webkit-scrollbar-thumb {
        background-color: #aab7cf;
        }

        @media (min-width: 1200px) {

        #main,
        #footer {
            margin-left: 300px;
        }
        }

        @media (max-width: 1199px) {
        .toggle-sidebar .sidebar {
            left: 0;
        }
        }

        @media (min-width: 1200px) {

        .toggle-sidebar #main,
        .toggle-sidebar #footer {
            margin-left: 0;
        }

        .toggle-sidebar .sidebar {
            left: -300px;
        }
        }

        .sidebar-nav {
        padding: 0;
        margin: 0;
        list-style: none;
        }

        .sidebar-nav li {
        padding: 0;
        margin: 0;
        list-style: none;
        }

        .sidebar-nav .nav-item {
        margin-bottom: 5px;
        }

        .sidebar-nav .nav-heading {
        font-size: 11px;
        text-transform: uppercase;
        color: #899bbd;
        font-weight: 600;
        margin: 10px 0 5px 15px;
        }

        .sidebar-nav .nav-link {
        display: flex;
        align-items: center;
        font-size: 15px;
        font-weight: 600;
        color: #4154f1;
        transition: 0.3;
        background: #f6f9ff;
        padding: 10px 15px;
        border-radius: 4px;
        }

        .sidebar-nav .nav-link i {
        font-size: 16px;
        margin-right: 10px;
        color: #4154f1;
        }

        .sidebar-nav .nav-link.collapsed {
        color: #012970;
        background: #fff;
        }

        .sidebar-nav .nav-link.collapsed i {
        color: #899bbd;
        }

        .sidebar-nav .nav-link:hover {
        color: #4154f1;
        background: #f6f9ff;
        }

        .sidebar-nav .nav-link:hover i {
        color: #4154f1;
        }

        .sidebar-nav .nav-link .bi-chevron-down {
        margin-right: 0;
        transition: transform 0.2s ease-in-out;
        }

        .sidebar-nav .nav-link:not(.collapsed) .bi-chevron-down {
        transform: rotate(180deg);
        }

        .sidebar-nav .nav-content {
        padding: 5px 0 0 0;
        margin: 0;
        list-style: none;
        }

        .sidebar-nav .nav-content a {
        display: flex;
        align-items: center;
        font-size: 14px;
        font-weight: 600;
        color: #012970;
        transition: 0.3;
        padding: 10px 0 10px 40px;
        transition: 0.3s;
        }

        .sidebar-nav .nav-content a i {
        font-size: 6px;
        margin-right: 8px;
        line-height: 0;
        border-radius: 50%;
        }

        .sidebar-nav .nav-content a:hover,
        .sidebar-nav .nav-content a.active {
        color: #4154f1;
        }

        .sidebar-nav .nav-content a.active i {
        background-color: #4154f1;
        }





        /*--------------------------------------------------------------
        # Dashboard
        --------------------------------------------------------------*/
        /* Filter dropdown */
        .dashboard .filter {
        position: absolute;
        right: 0px;
        top: 15px;
        }

        .dashboard .filter .icon {
        color: #aab7cf;
        padding-right: 20px;
        padding-bottom: 5px;
        transition: 0.3s;
        font-size: 16px;
        }

        .dashboard .filter .icon:hover,
        .dashboard .filter .icon:focus {
        color: #4154f1;
        }

        .dashboard .filter .dropdown-header {
        padding: 8px 15px;
        }

        .dashboard .filter .dropdown-header h6 {
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #aab7cf;
        margin-bottom: 0;
        padding: 0;
        }

        .dashboard .filter .dropdown-item {
        padding: 8px 15px;
        }

        /* Info Cards */
        .dashboard .info-card {
        padding-bottom: 10px;
        }

        .dashboard .info-card h6 {
        font-size: 28px;
        color: #012970;
        font-weight: 700;
        margin: 0;
        padding: 0;
        }

        .dashboard .card-icon {
        font-size: 32px;
        line-height: 0;
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        flex-grow: 0;
        }

        .dashboard .sales-card .card-icon {
        color: #4154f1;
        background: #f6f6fe;
        }

        .dashboard .revenue-card .card-icon {
        color: #2eca6a;
        background: #e0f8e9;
        }

        .dashboard .customers-card .card-icon {
        color: #ff771d;
        background: #ffecdf;
        }

        /* Activity */
        .dashboard .activity {
        font-size: 14px;
        }

        .dashboard .activity .activity-item .activite-label {
        color: #888;
        position: relative;
        flex-shrink: 0;
        flex-grow: 0;
        min-width: 64px;
        }

        .dashboard .activity .activity-item .activite-label::before {
        content: "";
        position: absolute;
        right: -11px;
        width: 4px;
        top: 0;
        bottom: 0;
        background-color: #eceefe;
        }

        .dashboard .activity .activity-item .activity-badge {
        margin-top: 3px;
        z-index: 1;
        font-size: 11px;
        line-height: 0;
        border-radius: 50%;
        flex-shrink: 0;
        border: 3px solid #fff;
        flex-grow: 0;
        }

        .dashboard .activity .activity-item .activity-content {
        padding-left: 10px;
        padding-bottom: 20px;
        }

        .dashboard .activity .activity-item:first-child .activite-label::before {
        top: 5px;
        }

        .dashboard .activity .activity-item:last-child .activity-content {
        padding-bottom: 0;
        }

        /* News & Updates */
        .dashboard .news .post-item+.post-item {
        margin-top: 15px;
        }

        .dashboard .news img {
        width: 80px;
        float: left;
        border-radius: 5px;
        }

        .dashboard .news h4 {
        font-size: 15px;
        margin-left: 95px;
        font-weight: bold;
        margin-bottom: 5px;
        }

        .dashboard .news h4 a {
        color: #012970;
        transition: 0.3s;
        }

        .dashboard .news h4 a:hover {
        color: #4154f1;
        }

        .dashboard .news p {
        font-size: 14px;
        color: #777777;
        margin-left: 95px;
        }

        /* Recent Sales */
        .dashboard .recent-sales {
        font-size: 14px;
        }

        .dashboard .recent-sales .table thead {
        background: #f6f6fe;
        }

        .dashboard .recent-sales .table thead th {
        border: 0;
        }

        .dashboard .recent-sales .dataTable-top {
        padding: 0 0 10px 0;
        }

        .dashboard .recent-sales .dataTable-bottom {
        padding: 10px 0 0 0;
        }

        /* Top Selling */
        .dashboard .top-selling {
        font-size: 14px;
        }

        .dashboard .top-selling .table thead {
        background: #f6f6fe;
        }

        .dashboard .top-selling .table thead th {
        border: 0;
        }

        .dashboard .top-selling .table tbody td {
        vertical-align: middle;
        }

        .dashboard .top-selling img {
        border-radius: 5px;
        max-width: 60px;
        }

        /*--------------------------------------------------------------
        # Icons list page
        --------------------------------------------------------------*/
        .iconslist {
        display: grid;
        max-width: 100%;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.25rem;
        padding-top: 15px;
        }

        .iconslist .icon {
        background-color: #fff;
        border-radius: 0.25rem;
        text-align: center;
        color: #012970;
        padding: 15px 0;
        }

        .iconslist i {
        margin: 0.25rem;
        font-size: 2.5rem;
        }

        .iconslist .label {
        font-family: var(--bs-font-monospace);
        display: inline-block;
        width: 100%;
        overflow: hidden;
        padding: 0.25rem;
        font-size: 12px;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #666;
        }

        /*--------------------------------------------------------------
        # Profie Page
        --------------------------------------------------------------*/
        .profile .profile-card img {
        max-width: 120px;
        }

        .profile .profile-card h2 {
        font-size: 24px;
        font-weight: 700;
        color: #2c384e;
        margin: 10px 0 0 0;
        }

        .profile .profile-card h3 {
        font-size: 18px;
        }

        .profile .profile-card .social-links a {
        font-size: 20px;
        display: inline-block;
        color: rgba(1, 41, 112, 0.5);
        line-height: 0;
        margin-right: 10px;
        transition: 0.3s;
        }

        .profile .profile-card .social-links a:hover {
        color: #012970;
        }

        .profile .profile-overview .row {
        margin-bottom: 20px;
        font-size: 15px;
        }

        .profile .profile-overview .card-title {
        color: #012970;
        }

        .profile .profile-overview .label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
        }

        .profile .profile-edit label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
        }

        .profile .profile-edit img {
        max-width: 120px;
        }

        /*--------------------------------------------------------------
        # Footer
        --------------------------------------------------------------*/
        .footer {
        padding: 20px 0;
        font-size: 14px;
        transition: all 0.3s;
        border-top: 1px solid #cddfff;
        }

        .footer .copyright {
        text-align: center;
        color: #012970;
        }

        .footer .credits {
        padding-top: 5px;
        text-align: center;
        font-size: 13px;
        color: #012970;
        }

        /* ----------------------------------------------------

        -------------------------------------------------------*/
        .total {
            color:#012970;
            font-weight: bold;
            text-align: right;
        }

        .detail-product:hover {
            color:#ff6600;
        }





</style>
    <!-- <h1>User Form</h1> -->
    <form id="Form" action="/loai/<?= "update/$loai[maloai]"  ?>" method="post" class="mb-3" style="margin: 20px;">
    <!-- Các trường của form -->
    <div class="form-row align-items-end">
        <div class="form-group col-md-4" style="margin-bottom: 20px;">
            <label for="maloai">Mã loại:</label>
            <input type="text" id="maloai" name="maloai" class="form-control" value="<?= isset($loai['maloai']) ? $loai['maloai'] : '' ?>" readonly required>
        </div>
        <div class="form-group col-md-4" style="margin-bottom: 20px;">
            <label for="tenloai">Tên loại:</label>
            <input type="text" id="tenloai" name="tenloai" class="form-control" value="<?= isset($loai['tenloai']) ? $loai['tenloai'] : '' ?>" >
        </div>
      
        <!-- Thêm các trường khác... -->
        <div class="col-md-12 mt-3 d-flex justify-content-end" style="margin-right: 30px;">
          
         <input type="submit" value="<?= isset($loai['maloai']) ? 'update': 'add' ?>">
        </div>
    </div>
</form>

    <a href="/loai">Back</a>


    <?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>
<!--
</body>
</html>
-->

