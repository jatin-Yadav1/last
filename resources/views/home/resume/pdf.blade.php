<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Chandra Prakash - CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 40px;
        }

        .header h1 {
            font-size: 24px;
            color: #0d6efd;
            margin: 0;
        }

        .header p {
            margin: 4px 0 0;
            font-weight: bold;
        }


        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header-text {
            flex: 1;
        }

        .profile-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #0d6efd;
            margin-left: 80%;
            padding: 0;
        }

        h2.section-title {
            font-size: 18px;
            margin: 30px 0 10px;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 4px;
            color: #0d6efd;
        }

        .section-title i {
            margin-right: 8px;
        }

        ul {
            padding-left: 20px;
            margin: 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            margin-right: 12px;
            text-decoration: none;
            color: #0d6efd;
            font-size: 14px;
        }

        footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: center;
            color: #666;
        }

        table.personal-info {
            border-collapse: collapse;
            width: 100%;
            max-width: 400px;
        }

        table.personal-info td {
            padding: 6px 8px;
            vertical-align: top;
        }

        table.personal-info td.label {
            font-weight: bold;
            color: #0d6efd;
            width: 150px;
        }
    </style>
</head>

<body>
    <!-- Header with Image -->
    <div class="header">
        <div class="header-text">
            <h1>Chandra Prakash</h1>
            <p>Software Developer</p>
        </div>
        <img src="{{ public_path('assets/images/image.png') }}" class="profile-image" alt="Profile Image">
    </div>

   

    <!-- Basic Personal Info -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-info-circle"></i>Basic Information</h2>
        <table class="personal-info">
            <tr>
                <td class="label">Date of Birth:</td>
                <td>01 January 1999</td>
            </tr>
            <tr>
                <td class="label">Father's Name:</td>
                <td>Mr. Ram Prakash Gautam</td>
            </tr>
            <tr>
                <td class="label">Mother's Name:</td>
                <td>Mrs. Sita Gautam</td>
            </tr>
            <tr>
                <td class="label">Nationality:</td>
                <td>Indian</td>
            </tr>
            <tr>
                <td class="label">Languages:</td>
                <td>English, Hindi</td>
            </tr>
            <tr>
                <td class="label">Address:</td>
                <td>Jaipur, Rajasthan, India</td>
            </tr>
        </table>
    </div>

    <!-- Professional Summary -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-user"></i>Professional Summary</h2>
        <p>
            Experienced Software Developer with 4+ years specializing in Laravel and Vue.js. Passionate about building scalable web applications and improving user experience. Strong problem-solving skills and ability to work in agile teams.
        </p>
    </div>

    <!-- Skills -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-laptop-code"></i>Basic Skills</h2>
        <ul>
            <li>Laravel, PHP, MySQL</li>
            <li>Vue.js, JavaScript, Bootstrap</li>
            <li>Git, REST APIs, Deployment</li>
            <li>HTML5, CSS3, Tailwind</li>
        </ul>
    </div>

    <div class="section">
        <h2 class="section-title"><i class="fa fa-laptop-code"></i>Tech Skills</h2>
        <ul>
            <li>Laravel, PHP, MySQL</li>
            <li>Vue.js, JavaScript, Bootstrap</li>
            <li>Git, REST APIs, Deployment</li>
            <li>HTML5, CSS3, Tailwind</li>
        </ul>
    </div>

    <!-- Projects -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-folder-open"></i>Projects</h2>
        <ul>
            <li><strong>Project Management System</strong> – Developed a Laravel-based system to manage tasks and teams. (Laravel, Vue.js, MySQL)</li>
            <li><strong>E-commerce Website</strong> – Built a responsive online store with payment integration. (PHP, Bootstrap, Stripe API)</li>
        </ul>
    </div>

    <!-- Certifications -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-certificate"></i>Certifications</h2>
        <ul>
            <li>Laravel Certified Developer – Laravel Certification</li>
            <li>Scrum Master Certified (CSM)</li>
        </ul>
    </div>

    <!-- Experience -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-briefcase"></i>Experience</h2>
        <ul>
            <li><strong>Senior Laravel Developer</strong> – ABC Tech (2022–Present)</li>
            <li><strong>Web Developer</strong> – XYZ Innovations (2020–2022)</li>
        </ul>
    </div>

    <!-- Education -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-graduation-cap"></i>Education</h2>
        <ul>
            <li>B.Tech – Computer Science – Rajasthan Technical University</li>
        </ul>
    </div>


    <!-- Contact -->
     <!-- Contact -->
<div class="section">
    <h2 class="section-title"><i class="fa fa-address-book"></i> Contact</h2>
    <table style="width: 100%; max-width: 500px; font-size: 14px; border-collapse: collapse;">
        <tr>
            <td style="font-weight: bold; color: #0d6efd; width: 100px;">
                <i class="fa fa-envelope"></i> Email:
            </td>
            <td>er.chandraprakash1999@gmail.com</td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #0d6efd;">
                <i class="fa fa-phone"></i> Phone:
            </td>
            <td>+91-9876543210</td>
        </tr>
        <!-- <tr>
            <td style="font-weight: bold; color: #0d6efd;">
                <i class="fa fa-map-marker-alt"></i> Address:
            </td>
            <td>Jaipur, Rajasthan, India</td>
        </tr> -->
    </table>
</div>



    <!-- Contact -->
    <!-- <div class="section">
        <h2 class="section-title"><i class="fa fa-address-book"></i>Contact</h2>
        <p><i class="fa fa-envelope"></i> er.chandraprakash1999@gmail.com</p>
        <p><i class="fa fa-phone"></i> +91-9876543210</p>
        <p><i class="fa fa-map-marker-alt"></i> Jaipur, Rajasthan, India</p>
    </div> -->

    <!-- Social Links -->
    <div class="section">
        <h2 class="section-title"><i class="fa fa-share-alt"></i>Social Profiles</h2>
        <div class="social-icons">
            <a href="https://facebook.com/profile.php?id=61561559271304" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="https://x.com/erprakash1999" target="_blank"><i class="fa fa-twitter"></i> Twitter (X)</a>
            <a href="https://instagram.com/erprakash1999" target="_blank"><i class="fa fa-instagram"></i> Instagram</a>
            <a href="https://linkedin.com/in/erprakash1999" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a>
            <a href="https://github.com/erprakash1999" target="_blank"><i class="fa fa-github"></i> GitHub</a>
        </div>
    </div>

    <!-- Signature Section -->
    <div class="section" style="margin-top: 60px;">
        <table style="width: 100%; max-width: 600px;">
            <tr>
                <td style="text-align: left;">
                    <strong>Date:</strong> {{ date('d-m-Y') }}
                </td>
                <td style="text-align: right;">
                    <strong>Signature:</strong>
                    <br><br>
                    <img src="{{ public_path('assets/images/signature.png') }}" alt="Signature" style="height: 50px;">
                    <br>
                    <span>Chandra Prakash</span>
                </td>
            </tr>
        </table>
    </div>

    <footer style="margin-top: 60px; text-align: center; font-size: 13px; color: #555; border-top: 1px solid #ddd; padding-top: 20px;">
        &copy; 2025 <strong>Chandra Prakash</strong>
    </footer>
</body>

</html>