<?php

$conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('connection failed');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']); // Додавання цієї лінії для визначення $number
    $date = $_POST['date'];

    $insert = mysqli_query($conn, "INSERT INTO contact_form (name, email, number, date)
    VALUES ('$name', '$email', '$number', '$date')") or die('query failed');

    if ($insert) {
        $message[] = 'Запис пройшов успішно!';
    } else {
        $message[] = 'Запис не відбувся';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Matrix - Контакти</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="index.html">
                                <h1>Matrix</h1>
                                <img src="img/log.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">Меню</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link">Головна</a>
                            <a href="about.html" class="nav-item nav-link">Про компанію</a>
                            <a href="service.html" class="nav-item nav-link">Послуги</a>
                            <a href="team.html" class="nav-item nav-link">Юристи</a>
                            <a href="contact.php" class="nav-item nav-link active">Контакти</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn" href="contact.php">Юридична консультація</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Контакти</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Головна</a>
                        <a href="">Контакти</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header">
                    <h2>Юридична консультація</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fa fa-map-marker-alt"></i>
                                <div class="contact-text">
                                    <h2>Адреса</h2>
                                    <p>01032, м. Київ, вул. Старовокзальна, 17, поверх 2, офіс 201
                                    </p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fa fa-phone-alt"></i>
                                <div class="contact-text">
                                    <h2>Телефон</h2>
                                    <p>+38 068 899 96 98</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fa fa-calendar"></i>
                                <div class="contact-text">
                                    <h2>Години роботи</h2>
                                    <p>Пн-Пт: 9:00-18:00
                                        Сб: за домовленістю
                                        Вс: вихідний</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fa fa-envelope"></i>
                                <div class="contact-text">
                                    <h2>Email</h2>
                                    <p>matrix@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <section class="contact" id="contact">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <?php
                                if (isset($message)) {
                                    foreach ($message as $message) {
                                        echo '<p class="message">' . $message . '</p>';
                                    }
                                }
                                ?>
                                <span class="span-text-form">Ваше ім'я :</span>
                                <input type="text" name="name" placehplder="enter your name" class="box">
                                <span class="span-text-form">Ваша пошта :</span>
                                <input type="email" name="email" placehplder="enter your email" class="box">
                                <span class="span-text-form">Ваш номер :</span>
                                <input type="number" name="number" placehplder="enter your number" class="box">
                                <span class="span-text-form">Дата консультації :</span>
                                <input type="date" name="date" class="box">
                                <input type="submit" value="Записатися на консультацію" name="submit" class="contact-link-btn">
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-about">
                            <h2>Matrix</h2>
                            <p>
                                В нашій команді працюють високоякісні спеціалісти в галузі права, які мають багатий життєвий і
                                професійний досвід. Ми
                                постійно займаємось підвищенням кваліфікаційного рівня кожного співробітника та слідкуємо за
                                всіма новелами в
                                законодавстві.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-8">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="footer-link">
                                    <h2>Напрямки</h2>
                                    <a href="service-legal-assistance.html">Юридична допомога</a>
                                    <a href="service-family-law.html">Сімейне право</a>
                                    <a href="service-debt-collection.html">Стягнення боргу</a>
                                    <a href="service-dispute-resolution.html">Регулювання спорів</a>
                                    <a href="service-criminal-law.html">Кримінальне право</a>
                                    <a href="service-military-law.html">Військове право</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="footer-link">
                                    <h2>Корисні сторінки</h2>
                                    <a href="about.html">Про компанію</a>
                                    <a href="service.html">Послуги</a>
                                    <a href="team.html">Адвокати</a>
                                    <a href="contact.php">Контакти</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="footer-contact">
                                    <h2>Зв'яжіться з нами</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>01032, м. Київ, вул. Старовокзальна, 17, поверх 2,
                                        офіс 201 метро Вокзальна</p>
                                    <p><i class="fa fa-calendar"></i>Пн-пт: 09:00-18:00, субота: за домовленістю</p>
                                    <p><i class="fa fa-phone-alt"></i>(099) 604-48-89</p>
                                    <p><i class="fa fa-envelope"></i>matrix@gmail.com</p>
                                    <div class="footer-social">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container copyright">

                <!-- Footer End -->


                <!-- JavaScript Libraries -->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

                <!-- Template Javascript -->
                <script src="js/main.js"></script>
</body>

</html>