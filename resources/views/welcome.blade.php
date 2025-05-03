@extends('layouts.front')

@section('content')
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
@endsection

