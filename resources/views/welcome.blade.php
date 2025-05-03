<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trelloop</title>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('css/frontpage.css')}}" rel="stylesheet">
</head>
<body>
  <header class="hero">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold m-0"><i class="bi bi-kanban"></i> TrellooP</h1>
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
      <p class="mb-2">©{{date('Y')}} Trelloop All rights reserved.</p>
    </div>
  </footer>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
