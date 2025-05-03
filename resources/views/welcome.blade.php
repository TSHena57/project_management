<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProjectManage SaaS</title>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <style>
    :root {
      --primary-color: #4caf50; /* Green */
      --secondary-color: #388e3c; /* Dark Green */
      --accent-color: #f9a825;
      --bg-light-gray: #f8f9fa;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
    }

    .hero {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 25px 0 100px 0;
      text-align: center;
    }

    .features {
      padding: 60px 0;
      background-color: var(--bg-light-gray);
    }

    .feature-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.07);
      padding: 30px;
      transition: transform 0.2s;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      font-size: 2rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    .pricing {
      padding: 60px 0;
      background-color: white;
    }

    .pricing-card {
      border-radius: 15px;
      padding: 40px 30px;
      color: white;
      position: relative;
      overflow: hidden;
      transition: transform 0.3s;
    }

    .pricing-card:hover {
      transform: scale(1.05);
    }

    .bronze {
      background: linear-gradient(135deg, #76b947, #6a9e40);
    }

    .silver {
      background: linear-gradient(135deg, #4caf50, #388e3c);
    }

    .platinum {
      background: linear-gradient(135deg, #66bb6a, #558b2f);
    }

    .price-value {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .pricing-card ul {
      list-style-type: none;
      padding-left: 0;
      margin-top: 15px;
    }

    .pricing-card ul li {
      margin-bottom: 12px;
      display: flex;
      align-items: center;
    }

    .pricing-card ul li i {
      color: #fff;
      margin-right: 10px;
    }

    .btn-accent {
      background-color: var(--accent-color);
      border: none;
      color: #fff;
    }

    .btn-accent:hover {
      background-color: #c17900;
    }

    footer {
      background-color: #f0f0f0;
      padding: 30px 0;
    }

    .footer-link {
      color: #6c757d;
      text-decoration: none;
    }

    .footer-link:hover {
      color: var(--primary-color);
    }

    .social-icon {
      font-size: 1.2rem;
      margin: 0 10px;
      color: #6c757d;
    }

    .social-icon:hover {
      color: var(--primary-color);
    }
  </style>
</head>
<body>
  <header class="hero">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold m-0">Trelloop</h1>
        <a href="{{auth()->check() ? route('dashboard') : route('login')}}" class="btn btn-light">{{auth()->check() ? 'Dashboard' : 'Login'}}</a>
      </div>
      <h1 class="display-4 fw-bold">Manage Projects Smarter</h1>
      <p class="lead">All-in-one solution to plan, track and manage your projects with ease.</p>
      <a href="#pricing" class="btn btn-light btn-lg mt-4">Get Started</a>
    </div>
  </header>

  <section class="features text-center">
    <div class="container">
      <h2 class="mb-5 fw-bold">Powerful Features</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="feature-card">
            <div class="feature-icon"><i class="bi bi-kanban"></i></div>
            <h5 class="fw-bold">Project Management</h5>
            <p>Track progress, assign tasks, and stay organized effortlessly.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card">
            <div class="feature-icon"><i class="bi bi-diagram-3"></i></div>
            <h5 class="fw-bold">Project Planning</h5>
            <p>Break down projects into phases and modules with clarity.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card">
            <div class="feature-icon"><i class="bi bi-bar-chart-steps"></i></div>
            <h5 class="fw-bold">Gantt Chart</h5>
            <p>Get a visual timeline of all tasks and phases in one view.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card">
            <div class="feature-icon"><i class="bi bi-person-lines-fill"></i></div>
            <h5 class="fw-bold">Client Management</h5>
            <p>Handle your clients and communication professionally.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="pricing" class="pricing text-center">
    <div class="container">
      <h2 class="mb-5 fw-bold">Choose Your Plan</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="pricing-card bronze">
            <h5 class="fw-bold">BRONZE PACKAGE</h5>
            <div class="price-value my-3">Free<span class="fs-6">/mo</span></div>
            <ul>
              <li><i class="bi bi-check-circle"></i> 1 Employee Manage</li>
              <li><i class="bi bi-check-circle"></i> 10 Projects Manage</li>
              <li><i class="bi bi-check-circle"></i> 10 Client Manage</li>
              <li><i class="bi bi-check-circle"></i> Gantt Chart Access</li>
            </ul>
            <a href="#" class="btn btn-light mt-3">Get Bronze</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="pricing-card silver">
            <h5 class="fw-bold">SILVER PACKAGE</h5>
            <div class="price-value my-3">TK. 500<span class="fs-6">/mo</span></div>
            <ul>
              <li><i class="bi bi-check-circle"></i> 10 Employee Manage</li>
              <li><i class="bi bi-check-circle"></i> 20 Projects Manage</li>
              <li><i class="bi bi-check-circle"></i> 20 Client Manage</li>
              <li><i class="bi bi-check-circle"></i> Gantt Chart Access</li>
            </ul>
            <a href="#" class="btn btn-light mt-3">Get Silver</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="pricing-card platinum">
            <h5 class="fw-bold">PLATINUM PACKAGE</h5>
            <div class="price-value my-3">TK. 1250<span class="fs-6">/mo</span></div>
            <ul>
              <li><i class="bi bi-check-circle"></i> 25 Employee Manage</li>
              <li><i class="bi bi-check-circle"></i> Unlimited Projects Manage</li>
              <li><i class="bi bi-check-circle"></i> Unlimited Client Manage</li>
              <li><i class="bi bi-check-circle"></i> Gantt Chart Access</li>
            </ul>
            <a href="#" class="btn btn-light mt-3">Get Platinum</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="text-center">
    <div class="container">
      <p class="mb-2">© {{date('Y')}} Trelloop All rights reserved.</p>
    </div>
  </footer>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
