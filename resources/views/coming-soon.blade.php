<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Coming Soon - TylaTwist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: "Segoe UI", sans-serif;
            color: white;
            background: url("https://tylatwist.com/assets/images/about/about1.png") no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .content-box {
            position: relative;
            z-index: 1;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            max-width: 480px;
            margin: 0 15px;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 2rem 0 1.75rem;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .countdown::-webkit-scrollbar {
            display: none;
        }

        .countdown div {
            text-align: center;
            min-width: 70px;
        }

        .countdown span {
            font-size: 2.5rem;
            font-weight: bold;
            line-height: 1;
        }

        h1.display-4 {
            white-space: nowrap;
            /* No line breaks */
            overflow: hidden;
            /* Hide overflow */
            /* text-overflow: ellipsis; */
            /* Optional: show "..." if still too long */
            font-size: 2rem;
            /* Desktop size */
        }

        /* Responsive font size for smaller screens */
        @media (max-width: 768px) {
            h1.display-4 {
                font-size: 3rem;
            }
        }

        @media (max-width: 480px) {
            h1.display-4 {
                font-size: 2rem;
            }
        }



        @media (max-width: 576px) {
            h1.display-4 {
                font-size: 2rem !important;
            }
        }

        .typewriter-text {
            border-right: 2px solid white;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 4s steps(30, end) forwards, blink 0.8s infinite;
            font-size: 1.25rem;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .social-icons a {
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(6px);
            color: white;
            transition: 0.4s ease-in-out;
            position: relative;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .social-icons a::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: 0.4s;
        }

        .social-icons a:hover {
            color: #fff;
            transform: scale(1.2);
        }

        .social-icons a[href*="facebook"]:hover {
            background-color: #3b5998;
            box-shadow: 0 0 20px #3b5998;
        }

        .social-icons a[href*="twitter"]:hover {
            background-color: #1da1f2;
            box-shadow: 0 0 20px #1da1f2;
        }

        .social-icons a[href*="instagram"]:hover {
            background-color: #e4405f;
            box-shadow: 0 0 20px #e4405f;
        }

        .social-icons a[href*="linkedin"]:hover {
            background-color: #0077b5;
            box-shadow: 0 0 20px #0077b5;
        }

        .social-icons a[href*="mailto"]:hover {
            background-color: #ff5722;
            box-shadow: 0 0 20px #ff5722;
        }

        .social-icons a[href*="github"]:hover {
            background-color: #333;
            box-shadow: 0 0 20px #333;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .countdown {
                gap: 1rem;
                min-width: 100%;
            }

            .countdown div {
                min-width: 55px;
            }

            .countdown span {
                font-size: 1.75rem;
            }

            .typewriter-text {
                font-size: 1rem;
            }

            .content-box {
                padding: 25px 20px;
            }
        }

        .coming-soon {
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>

    <div class="container h-100 d-flex align-items-center justify-content-center">
        <div class="text-center content-box" data-aos="fade-up" data-aos-delay="200">
            <h1 class="display-4 mb-3 coming-soon" style="max-width: 400px;" data-aos="fade-down">🚀 Coming Soon</h1>

            <div class="typewriter-text mx-auto mb-4" style="max-width: 400px;">
                We’re building something amazing for you...
            </div>

            <div id="countdown" class="countdown" data-aos="zoom-in" data-aos-delay="500">
                <div>
                    <span id="days">00</span><br />
                    Days
                </div>
                <div>
                    <span id="hours">00</span><br />
                    Hours
                </div>
                <div>
                    <span id="minutes">00</span><br />
                    Minutes
                </div>
                <div>
                    <span id="seconds">00</span><br />
                    Seconds
                </div>
            </div>

            <p class="mt-4" data-aos="fade-up" data-aos-delay="700">Follow us for updates:</p>
            <div class="social-icons mb-2" data-aos="fade-up" data-aos-delay="800">
                <a href="https://www.facebook.com/profile.php?id=61561559271304" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://x.com/erprakash1999" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/erprakash1999" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/erprakash1999/" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://github.com/erprakash1999" target="_blank"><i class="fa fa-github"></i></a>
                <a href="mailto:er.chandraprakash1999@gmail.com"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
        const date = "July 1, 2025 00:00:00";
        const launchDate = new Date(date).getTime();
        const countdown = setInterval(() => {
            const now = new Date().getTime();
            const timeLeft = launchDate - now;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                document.getElementById("countdown").innerHTML =
                    "<strong>We're Live!</strong>";
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor(
                (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = String(days).padStart(2, "0");
            document.getElementById("hours").innerText = String(hours).padStart(2, "0");
            document.getElementById("minutes").innerText = String(minutes).padStart(2, "0");
            document.getElementById("seconds").innerText = String(seconds).padStart(2, "0");
        }, 1000);
    </script>
</body>

</html>