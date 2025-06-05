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

    .profile-banner {
      height: 200px;
      object-fit: cover;
      filter: brightness(0.85);
    }

    .profile-pic {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-top: -60px;
      border: 5px solid white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }

    .social-icons a {
      font-size: 1.5rem;
      margin: 0 12px;
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
    .btn-primary:hover {
      transition: all 0.3s ease;
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <div class="mx-auto" style="max-width: 960px;">

      <!-- Profile Header -->
      <div class="card section-card text-center" data-aos="fade-down">
        <img src="https://haritrust.org/assets_home/images/banner.png" class="profile-banner w-100" alt="Banner" />
        <img src="https://haritrust.org/assets_home/images/logo.png" class="profile-pic mx-auto d-block" alt="Profile" />
        <div class="card-body">
          <h2 class="mb-1">John Doe</h2>
          <p class="text-muted mb-3">Full Stack Developer</p>
          <div class="social-icons mb-4">
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
            <a href="#" aria-label="X Twitter"><i class="fab fa-x-twitter"></i></a>
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
          <a class="btn btn-primary btn-lg" href="#" role="button" aria-label="Download CV">
            <i class="fas fa-download me-2"></i> Download CV
          </a>
        </div>
        <div class="text-center my-4">
          <a href="{{ route('cv.download') }}" class="btn btn-primary">
            <i class="fas fa-download me-1"></i> Download CV as PDF
          </a>
        </div>
      </div>

      <!-- Personal Information -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-user-circle me-2"></i>Personal Information</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Date of Birth:</strong> January 1, 1990</li>
          <li class="list-group-item"><strong>Nationality:</strong> American</li>
          <li class="list-group-item"><strong>Languages:</strong> English, Spanish, French</li>
          <li class="list-group-item"><strong>Address:</strong> 123 Main Street, San Francisco, CA</li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-address-book me-2"></i>Contact Information</div>
        <p><i class="fas fa-envelope me-2"></i> john.doe@email.com</p>
        <p><i class="fas fa-phone me-2"></i> +1 234 567 890</p>
        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main Street, San Francisco, CA</p>
      </div>

      <!-- Followers & QR -->
      <div class="row mb-4">
        <div class="col-md-6" data-aos="zoom-in">
          <div class="card section-card p-4 text-center">
            <div class="section-title"><i class="fas fa-users me-2"></i>Followers</div>
            <h4>8,500+</h4>
            <p>Across social platforms</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="zoom-in">
          <div class="card section-card p-4 text-center">
            <div class="section-title"><i class="fas fa-qrcode me-2"></i>Scan My QR</div>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=https://yourportfolio.com" class="qr-code" alt="QR Code" />
            <p class="text-muted mt-2">Visit my online portfolio</p>
          </div>
        </div>
      </div>

      <!-- Education -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-graduation-cap me-2"></i>Education</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">🎓 B.Sc. Computer Science, Stanford University (2015–2019)</li>
          <li class="list-group-item">📘 M.Sc. Software Engineering, MIT (2019–2021)</li>
        </ul>
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

      <!-- Basic Skills -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-cogs me-2"></i>Basic Skills</div>
        <ul class="mb-0">
          <li>Strong communication and teamwork</li>
          <li>Problem-solving and critical thinking</li>
          <li>Agile & Scrum methodologies</li>
          <li>Time management and organization</li>
          <li>Continuous learning & adaptability</li>
        </ul>
      </div>

      <!-- Experience -->
      <div class="card section-card p-4" data-aos="fade-right">
        <div class="section-title"><i class="fas fa-briefcase me-2"></i>Experience</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <strong>Senior Developer</strong> – TechCorp (2021–Present)<br />
            Lead full-stack developer managing enterprise SaaS projects.
          </li>
          <li class="list-group-item">
            <strong>Junior Developer</strong> – WebStart (2019–2021)<br />
            Created modern frontend interfaces and APIs.
          </li>
        </ul>
      </div>

      <!-- Projects -->
      <div class="card section-card p-4" data-aos="fade-left">
        <div class="section-title"><i class="fas fa-folder-open me-2"></i>Projects</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="#" target="_blank" rel="noopener">Portfolio Website</a> — Personal portfolio showcasing projects and blog.
          </li>
          <li class="list-group-item">
            <a href="#" target="_blank" rel="noopener">E-commerce Platform</a> — Full-stack app with payment gateway integration.
          </li>
        </ul>
      </div>

      <!-- Footer -->
      <footer>
        <div class="mb-2">© 2025 John Doe | <a href="#">Privacy Policy</a> | <a href="#">Terms</a></div>
        <div>
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
        </div>
        <div class="mt-3">
          <a href="#" class="btn btn-light btn-sm" aria-label="Hire Me Button">Hire Me</a>
        </div>
      </footer>
    </div>
  </div>

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