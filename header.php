<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه ایرانیان | مرجع تخصصی خرید آنلاین</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 (آیکون‌های حرفه‌ای) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- فونت وزیر (فونت زیبای فارسی) -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdir/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Vazir', Tahoma, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        
        /* کانتینر اصلی با افکت شیشه‌ای */
        .main-container {
            max-width: 1300px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }
        
        /* هدر با گرادیانت طلایی */
        .gold-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .gold-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1%, transparent 1%);
            background-size: 50px 50px;
            animation: shimmer 20s linear infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translate(0,0); }
            100% { transform: translate(100px,100px); }
        }
        
        .logo-area h1 {
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin: 0;
            font-size: 28px;
        }
        
        .logo-area p {
            color: rgba(255,255,255,0.9);
            margin: 0;
            font-size: 14px;
        }
        
        .cart-icon {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .cart-icon:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.05);
            color: white;
        }
        
        /* منوی ناوبری مدرن */
        .modern-nav {
            background: #2c3e50;
            padding: 0;
            margin: 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .modern-nav .nav-item {
            list-style: none;
            display: inline-block;
            position: relative;
        }
        
        .modern-nav .nav-link {
            color: white;
            padding: 15px 25px;
            display: inline-block;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }
        
        .modern-nav .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: all 0.3s;
            transform: translateX(50%);
        }
        
        .modern-nav .nav-link:hover::before {
            width: 80%;
        }
        
        .modern-nav .nav-link:hover {
            background: #34495e;
            color: #ffd700;
        }
        
        .nav-user-info {
            background: #e74c3c;
            border-radius: 25px;
            padding: 5px 20px;
            margin: 8px 15px;
            color: white;
            font-weight: bold;
        }
        
        /* سایدبار حرفه‌ای */
        .pro-sidebar {
            background: #f8f9fa;
            border-radius: 0;
            height: 100%;
        }
        
        .sidebar-widget {
            margin-bottom: 25px;
        }
        
        .sidebar-title {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 20px;
            border-radius: 10px 10px 0 0;
            font-weight: bold;
            margin: 0;
        }
        
        .sidebar-content {
            padding: 20px;
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .category-list {
            list-style: none;
            padding: 0;
        }
        
        .category-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        
        .category-list li a {
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .category-list li a:hover {
            color: #667eea;
            padding-right: 5px;
        }
        
        /* بخش محتوا */
        .content-area {
            padding: 20px;
            background: white;
            min-height: 500px;
        }
        
        /* فوتر حرفه‌ای */
        .pro-footer {
            background: #1a1a2e;
            color: white;
            padding: 50px 30px 20px;
            margin-top: 30px;
        }
        
        .footer-widget h4 {
            color: #ffd700;
            margin-bottom: 20px;
            font-size: 18px;
        }
        
        .footer-widget p, .footer-widget a {
            color: #ccc;
            text-decoration: none;
            line-height: 1.8;
        }
        
        .footer-widget a:hover {
            color: #ffd700;
        }
        
        .social-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 35px;
            margin-left: 10px;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: #ffd700;
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #888;
            font-size: 14px;
        }
        
        /* انیمیشن ورود */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .main-container {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* دکمه‌های زیبا */
        .btn-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s;
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
            color: white;
        }
    </style>
</head>
<body>

<div class="main-container">
    
    <!-- هدر طلایی -->
    <div class="gold-header">
        <div class="row align-items-center">
            <div class="col-md-6 logo-area">
                <h1><i class="fas fa-store"></i> فروشگاه ایرانیان</h1>
                <p>مرجع تخصصی خرید آنلاین با بهترین قیمت‌ها</p>
            </div>
            <div class="col-md-6 text-start">
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i> سبد خرید
                    <span class="badge bg-danger rounded-pill">0</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- منوی ناوبری مدرن -->
    <ul class="modern-nav">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> صفحه اصلی</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-plus"></i> عضویت</a></li>
        
        <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true): ?>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> خروج (<?php echo htmlspecialchars($_SESSION["realname"]); ?>)</a></li>
            <?php if ($_SESSION["user_type"] == "admin"): ?>
                <li class="nav-item"><a class="nav-link" href="admin_products.php"><i class="fas fa-cogs"></i> مدیریت محصولات</a></li>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> ورود</a></li>
        <?php endif; ?>
        
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-info-circle"></i> درباره ما</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope"></i> ارتباط با ما</a></li>
    </ul>
    
    <!-- بخش اصلی -->
    <div class="row g-0">
        
        <!-- سایدبار -->
        <aside class="col-md-3 pro-sidebar">
            <div class="sidebar-widget">
                <div class="sidebar-title">
                    <i class="fas fa-tags"></i> دسته‌بندی کالاها
                </div>
                <div class="sidebar-content">
                    <ul class="category-list">
                        <li><a href="#"><i class="fas fa-laptop"></i> لپ‌تاپ و کامپیوتر</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> موبایل و تبلت</a></li>
                        <li><a href="#"><i class="fas fa-headphones"></i> لوازم جانبی</a></li>
                        <li><a href="#"><i class="fas fa-tv"></i> تلویزیون و صوتی</a></li>
                        <li><a href="#"><i class="fas fa-plug"></i> لوازم برقی</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="sidebar-widget">
                <div class="sidebar-title">
                    <i class="fas fa-percent"></i> تخفیف‌های ویژه
                </div>
                <div class="sidebar-content text-center">
                    <p>تا ۵۰٪ تخفیف<br>برای اعضای جدید!</p>
                    <a href="register.php" class="btn-gradient">عضویت رایگان</a>
                </div>
            </div>
        </aside>
        
        <!-- بخش محتوای اصلی -->
        <section class="col-md-9 content-area">