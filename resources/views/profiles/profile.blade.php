@extends('layouts.app')
@push('styles')    
  <link href="{{asset('plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
@endpush

@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile Setup</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        {{-- Place Button --}}
    </div>
</div>
<div class="row">
    <div class="col col-lg-9 mx-auto">
        
        <h6 class="mb-0 text-uppercase">Profile Setup</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#success-pills-profile" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='lni lni-user font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Profile</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-password" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='lni lni-lock font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Password</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="success-pills-profile" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                   <h6 class="mb-0 text-uppercase">Update Profile</h6>
                                   <hr>
                                   <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div class="col-12">
                                         <label class="form-label" for="name">Full Name</label>
                                         <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
                                      </div>
                                      <div class="col-12">
                                         <label class="form-label" for="email">Email</label>
                                         <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}" readonly>
                                      </div>
                                      <div class="col-12">
                                         <label class="form-label" for="mobile">Mobile</label>
                                         <input type="text" class="form-control" name="mobile" id="mobile" value="{{auth()->user()->mobile}}">
                                      </div>
                                      <div class="col-12">
                                          <label class="form-label" for="files">Avatar</label>
                                          <input id="fancy-file-upload" type="file" name="files" id="files" accept=".jpg, .png, image/jpeg, image/png">
                                      </div>
                                      <div class="col-12">
                                         <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                         </div>
                                      </div>
                                   </form>
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="success-pills-password" role="tabpanel">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
@endsection
@push('scripts')
    
<script src="{{asset('plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('js/form-file-upload.js')}}"></script>
@endpush
