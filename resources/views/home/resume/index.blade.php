<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Professional CV Card Layout</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <!-- AOS Animation CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-card {
      border-radius: 15px;
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
      margin-top: 2rem;
      position: relative;
    }

    .profile-banner {
      height: 200px;
      width: 100%;
      object-fit: cover;
      filter: brightness(0.85);
    }

    .profile-pic {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      position: absolute;
      top: 140px;
      left: 50%;
      transform: translateX(-50%);
      border: 5px solid white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    .profile-header-text {
      margin-top: 60px;
      /* to push down below the profile-pic */
    }

    .section-card {
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      margin-bottom: 1.8rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: #fff;
    }

    .section-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    .section-title {
      font-size: 1.3rem;
      font-weight: 600;
      border-bottom: 3px solid #0d6efd;
      display: inline-block;
      margin-bottom: 1rem;
      padding-bottom: 0.2rem;
      color: #0d6efd;
    }

    .social-icons a {
      font-size: 1.5rem;
      margin: 0 10px;
      color: #0d6efd;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: #0a58ca;
    }

    .progress-bar {
      font-size: 0.85rem;
      font-weight: 600;
      text-align: center;
      line-height: 1.6;
      color: #fff;
    }

    .qr-code {
      max-width: 180px;
      margin: 0 auto;
      display: block;
    }

    footer {
      background-color: #0d6efd;
      color: #fff;
      padding: 1.6rem 0;
      margin-top: 3rem;
      text-align: center;
    }

    footer a {
      color: #fff;
      margin: 0 10px;
      font-size: 1.4rem;
      transition: color 0.3s ease;
    }

    footer a:hover {
      color: #cce5ff;
    }

    .btn-primary,
    .btn-primary:focus,
    .btn-primary:hover {
      background-color: #0d6efd;
      border-color: #0d6efd;
      box-shadow: none;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
    }

    @media (max-width: 576px) {
      .profile-pic {
        width: 80px;
        height: 80px;
        top: 130px;
      }

      .profile-header-text h2 {
        font-size: 1.5rem;
      }

      .section-title {
        font-size: 1.15rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <div class="mx-auto">

      <!-- Profile Header -->
      <div class="card section-card text-center p-0" data-aos="fade-down">
        <img src="https://haritrust.org/assets_home/images/banner.png" class="profile-banner w-100"
          alt="Banner" />
        <img src="https://haritrust.org/assets_home/images/logo.png" class="profile-pic" alt="Profile" />
        <div class="card-body profile-header-text">
          <h2 class="mb-1">John Doe</h2>
          <p class="text-muted mb-3">Full Stack Developer</p>
          <div class="social-icons mb-3">
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
            <a href="#" aria-label="X Twitter"><i class="fab fa-x-twitter"></i></a>
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>

          <div class="mb-4">
            <a href="{{ route('cv.download') }}" class="btn btn-outline-primary"> Download CV</a>
            <a href="{{ route('cv.download') }}" class="btn btn-outline-primary"> Hire Me </a>
          </div>
        </div>
      </div>

      <!-- About -->

      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-address-book me-2"></i>Professional Summary</div>
        <p>Experienced Software Developer with 4+ years specializing in Laravel and Vue.js. Passionate about
          building scalable web applications and improving user experience. Strong problem-solving skills and
          ability to work in agile teams</p>
      </div>

      <!-- Personal Information -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-user-circle me-2"></i>Personal Information</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Date of Birth:</strong> January 1, 1990
          </li>
          <li class="list-group-item"><strong>Nationality:</strong> American
          </li>
          <li class="list-group-item"><strong>Languages:</strong> English, Spanish, French
          </li>
          <li class="list-group-item"><strong>Address:</strong> 123 Main Street, San Francisco, CA
          </li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-address-book me-2"></i>Contact Information</div>
        <p><i class="fas fa-envelope me-2 text-primary"></i>john.doe@email.com</p>
        <p><i class="fas fa-phone me-2 text-primary"></i>+1 234 567 890</p>
        <p><i class="fas fa-map-marker-alt me-2 text-primary"></i>123 Main Street, San Francisco, CA</p>
      </div>

      <!-- Followers & QR -->
      <div class="row mb-4 g-3">
        <div class="col-md-6" data-aos="zoom-in">
          <div class="card section-card p-4 text-center h-100">
            <div class="section-title"><i class="fas fa-qrcode me-2"></i>Scan My QR</div>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=https://yourportfolio.com"
              class="qr-code mb-2" alt="QR Code" />
            <p class="text-muted">Visit my online portfolio</p>
          </div>
        </div>
      </div>

      <!-- Education -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-graduation-cap me-2"></i>Education</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">B.Sc. Computer Science, Stanford University (2015–2019)
          </li>
          <li class="list-group-item">M.Sc. Software Engineering, MIT (2019–2021)
          </li>
        </ul>
      </div>

      <!-- Basic Skills -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-cogs me-2"></i>Basic Skills</div>

        <div class="mb-3">
          <p class="mb-1 fw-semibold">Communication & Teamwork</p>
          <div class="progress">
            <div class="progress-bar bg-primary" style="width: 95%">95%</div>
          </div>
        </div>

        <div class="mb-3">
          <p class="mb-1 fw-semibold">Problem-Solving & Critical Thinking</p>
          <div class="progress">
            <div class="progress-bar bg-success" style="width: 90%">90%</div>
          </div>
        </div>

        <div class="mb-3">
          <p class="mb-1 fw-semibold">Agile & Scrum Methodologies</p>
          <div class="progress">
            <div class="progress-bar bg-warning text-dark" style="width: 85%">85%</div>
          </div>
        </div>

        <div class="mb-3">
          <p class="mb-1 fw-semibold">Time Management & Organization</p>
          <div class="progress">
            <div class="progress-bar bg-info text-dark" style="width: 90%">90%</div>
          </div>
        </div>

        <div class="mb-4">
          <p class="mb-1 fw-semibold">Continuous Learning & Adaptability</p>
          <div class="progress">
            <div class="progress-bar bg-secondary" style="width: 92%">92%</div>
          </div>
        </div>
      </div>

      <!-- Tech Skills -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-laptop-code me-2"></i>Tech Skills</div>
        <p class="mb-1">HTML / CSS / JavaScript / TypeScript</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-primary" style="width: 95%">95%</div>
        </div>

        <p class="mb-1">React / Vue / Angular</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width: 90%">90%</div>
        </div>

        <p class="mb-1">Node.js / Express / Laravel</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-warning" style="width: 85%">85%</div>
        </div>

        <p class="mb-1">Docker / Kubernetes / AWS</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-info" style="width: 75%">75%</div>
        </div>
      </div>

      <!-- Experience -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-briefcase me-2"></i>Experience</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Senior Developer</strong> – TechCorp (2021–Present)<br />
            Lead full-stack developer managing enterprise SaaS projects.
          </li>
          <li class="list-group-item"><strong>Junior Developer</strong> – WebStart (2019–2021)<br />
            Created modern frontend interfaces and APIs.
          </li>
        </ul>
      </div>

      <!-- Projects -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-folder-open me-2"></i>Projects</div>

        <div class="mb-3">
          <h6 class="mb-1">
            <a href="https://yourportfolio.com" target="_blank" rel="noopener"> Portfolio Website</a>
          </h6>
          <p class="mb-1">A modern and responsive personal portfolio with animations, blog integration, and contact form.</p>
          <strong>Tech Stack-</strong><small class="text-muted"> HTML, CSS, JavaScript, Bootstrap, AOS</small>
          <p><strong>Source Code-</strong> <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a></p>
        </div>

        <div class="mb-3">
          <h6 class="mb-1">
            <a href="https://yourecommerce.com" target="_blank" rel="noopener">E-commerce Platform</a>
          </h6>
          <p class="mb-1">A full-featured shopping platform with user authentication, cart, and Stripe payment integration.</p>
          <small class="text-muted">Tech Stack: React, Node.js, Express, MongoDB, Stripe API</small>
        </div>

        <div class="mb-3">
          <h6 class="mb-1">
            <a href="https://github.com/yourname/admin-dashboard" target="_blank" rel="noopener">Admin Dashboard</a>
          </h6>
          <p class="mb-1">A responsive dashboard for analytics and content management with role-based access.</p>
          <small class="text-muted">Tech Stack: Vue.js, Chart.js, Firebase Auth</small>
        </div>
      </div>


      <!-- Footer -->
    </div>
  </div>
  <footer class="bg-primary text-white py-4 mt-5">
    <div class="container">
      <div class="row text-center text-md-start justify-content-between align-items-center gy-2">
        <div class="col-12 col-md-auto">
          <small>© 2025 <strong>John Doe</strong></small>
        </div>
        <div class="col-12 col-md-auto">
          <small>
            <a href="#" class="text-white text-decoration-underline me-3">Privacy Policy</a>
            <a href="#" class="text-white text-decoration-underline">Terms</a>
          </small>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS Animation JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 700,
      easing: 'ease-in-out',
      once: true,
    });
  </script>
</body>

</html>