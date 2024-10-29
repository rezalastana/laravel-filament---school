<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatchan Muhammad Hakim</title>
    <link rel="shortcut icon" href="{{ asset('app/pages/assets/images/assets/logo/Depok.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('app/pages/assets/images/assets/logo/Depok.png') }}">
    <link rel="stylesheet" href="{{ asset('app/pages/assets/panel/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <img class="icons" src="{{ asset('app/pages/assets/images/assets/logo/Depok.png') }}" alt="">
            <h3 class="panelmdvtd">MDVTD</h3>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <select class="selcpanel" name="panel" id="">
                    <option value="admin">Admin</option>
                    <option value="sekolah">Sekolah</option>
                    <option value="puskesmas">Puskesmas</option>
                </select>
                <button type="submit">Panel</button>
                <p class="message">Do you want to go back to the main page ? <a href="{{ url('/') }}">Back</a></p>
            </form>
        </div>
    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="confoot">
        <footer class="bg-light text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-2" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-2" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-2" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-2" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-4 footer" style="background-color: rgba(214, 214, 214, 0.2); color: #157FDA; font-weight: bold;">
                © 2024 Copyright:
                <a href="https://mdbootstrap.com/" style="color: #157FDA; font-weight: bold;">infomdvtd.com</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->

    <script>
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan link stylesheet dan script lainnya sesuai kebutuhan -->
</head>