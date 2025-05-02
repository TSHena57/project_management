<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Manager Pro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .feature-icon {
      font-size: 2rem;
      color: #0d6efd;
    }
    footer {
      background-color: #f8f9fa;
      padding: 30px 0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Project Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
        <li class="nav-item"><a class="btn btn-primary ms-2" href="{{ route('login') }}">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero">
  <div class="container">
    <h1 class="display-4 fw-bold">Simplify Your Project Management</h1>
    <p class="lead">Manage tasks, track progress, and collaborate easily.</p>
    <a href="#" class="btn btn-light btn-lg mt-3">Start Free Trial</a>
  </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Features</h2>
      <p class="text-muted">All the tools you need to manage projects efficiently</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-kanban"></i>
          </div>
          <h5>Task Boards</h5>
          <p class="text-muted">Organize tasks with drag-and-drop Kanban boards.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-clock-history"></i>
          </div>
          <h5>Time Tracking</h5>
          <p class="text-muted">Track time spent on each task for better productivity.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <div class="feature-icon mb-3">
            <i class="bi bi-people"></i>
          </div>
          <h5>Team Collaboration</h5>
          <p class="text-muted">Work together with built-in chat and comments.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<footer class="text-center">
  <div class="container">
    <p class="mb-0">&copy; {{date("Y")}} Tahsin Sorwar. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>