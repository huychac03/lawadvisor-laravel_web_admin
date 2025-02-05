@extends('super_admins.layouts.master')

@section('title')
    Your Profile
@endsection

@section('css')
    @include('super_admins.includes.datatable_css')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- <h3 class="mt-4 mb-4">Social Widgets</h3> -->
            <div class="row">
              
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-primary">
                            <h3 class="widget-user-username">{{ $user ? $user->name : '' }}</h3>
                            <h5 class="widget-user-desc">{{ $user ? $user->email : '' }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{ $user->profile_image_path ? url($user->profile_image_path) : '' }}"
                                    alt="User profile picture">
                        </div>
                        <div class="card-footer">
                            <!-- <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                    </div>

                                </div>

                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                    </div>

                                </div>

                            </div> -->

                        </div>
                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <!-- <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                          </ul> -->
                            Your Credentials
                        </div>
                        <div class="card-body">
                            <!-- <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                  <span class="username">
                                    <a href="#">Jonathan Burke Jr.</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>

                                <p>
                                  Lorem ipsum represents a long-held tradition for designers,
                                  typographers and the like. Some people hate it and argue for
                                  its demise, but others ignore the hate as they create awesome
                                  tools to help create filler text for everyone from bacon lovers
                                  to Charlie Sheen fans.
                                </p>
                                <p>
                                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                  <span class="float-right">
                                    <a href="#" class="link-black text-sm">
                                      <i class="far fa-comments mr-1"></i> Comments (5)
                                    </a>
                                  </span>
                                </p>
                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                              </div>


                              <div class="post clearfix">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                  <span class="username">
                                    <a href="#">Sarah Ross</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Sent you a message - 3 days ago</span>
                                </div>

                                <p>
                                  Lorem ipsum represents a long-held tradition for designers,
                                  typographers and the like. Some people hate it and argue for
                                  its demise, but others ignore the hate as they create awesome
                                  tools to help create filler text for everyone from bacon lovers
                                  to Charlie Sheen fans.
                                </p>
                                <form class="form-horizontal">
                                  <div class="input-group input-group-sm mb-0">
                                    <input class="form-control form-control-sm" placeholder="Response">
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-danger">Send</button>
                                    </div>
                                  </div>
                                </form>
                              </div>


                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                  <span class="username">
                                    <a href="#">Adam Jones</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>

                                <div class="row mb-3">
                                  <div class="col-sm-6">
                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                  </div>

                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                      </div>

                                      <div class="col-sm-6">
                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <p>
                                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                  <span class="float-right">
                                    <a href="#" class="link-black text-sm">
                                      <i class="far fa-comments mr-1"></i> Comments (5)
                                    </a>
                                  </span>
                                </p>
                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                              </div>

                            </div>

                            <div class="tab-pane" id="timeline">

                              <div class="timeline timeline-inverse">

                                <div class="time-label">
                                  <span class="bg-danger">
                                    10 Feb. 2014
                                  </span>
                                </div>


                                <div>
                                  <i class="fas fa-envelope bg-primary"></i>
                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                    <div class="timeline-body">
                                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                      quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </div>
                                </div>


                                <div>
                                  <i class="fas fa-user bg-info"></i>
                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                    </h3>
                                  </div>
                                </div>


                                <div>
                                  <i class="fas fa-comments bg-warning"></i>
                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                    <div class="timeline-body">
                                      Take me to your leader!
                                      Switzerland is small and neutral!
                                      We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                    </div>
                                  </div>
                                </div>


                                <div class="time-label">
                                  <span class="bg-success">
                                    3 Jan. 2014
                                  </span>
                                </div>


                                <div>
                                  <i class="fas fa-camera bg-purple"></i>
                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                    <div class="timeline-body">
                                      <img src="https://placehold.it/150x100" alt="...">
                                      <img src="https://placehold.it/150x100" alt="...">
                                      <img src="https://placehold.it/150x100" alt="...">
                                      <img src="https://placehold.it/150x100" alt="...">
                                    </div>
                                  </div>
                                </div>

                                <div>
                                  <i class="far fa-clock bg-gray"></i>
                                </div>
                              </div>
                            </div>

                            <div class="tab-pane" id="settings">
                              <form class="form-horizontal">
                                <div class="form-group row">
                                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                  <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                  </div>
                                </div>
                              </form>
                            </div>

                          </div> -->
                            <form method="POST"
                                action="{{ route('super_admin.profile.update', ['user' => $user->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="InputName">Name</label>
                                    <input required type="text" name="name"
                                        value="{{ $user && $user->name ? $user->name : null }}"
                                        class="form-control @if ($errors->has('name')) is-invalid @endif"
                                        id="InputName"
                                        placeholder="{{ $user && $user->name ? $user->name : 'PLease Enter Name' }}"
                                        aria-describedby="NameError" aria-invalid="true">
                                    <span id="NameError" class="error invalid-feedback">
                                        @if ($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="InputName">Email</label>
                                    <input required type="text" name="email"
                                        value="{{ $user && $user->email ? $user->email : null }}"
                                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                                        id="InputEmail"
                                        placeholder="{{ $user && $user->email ? $user->email : 'PLease Enter Email' }}"
                                        aria-describedby="EmailError" aria-invalid="true">
                                    <span id="EmailError" class="error invalid-feedback">
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="InputImage">Profile Image</label>
                                    <input type="file" name="profile_image_path"
                                        class="form-control p-1 small @if (count($errors->get('profile_image_path'))) is-invalid @endif
                                   @if ($errors->has('profile_image_path')) is-invalid @endif"
                                        id="InputImage" placeholder="Enter Profile Iamge" aria-describedby="ImageError"
                                        aria-invalid="true">
                                    <span id="InputImage" class="error invalid-feedback">
                                        @if ($errors->has('profile_image_path'))
                                            {{ $errors->first('profile_image_path') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @if ($errors->has('password')) is-invalid @endif"
                                        id="InputPassword" placeholder="Please Input Password"
                                        aria-describedby="PasswordError" aria-invalid="true">
                                    <span id="InputPassword" class="error invalid-feedback">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @if ($errors->has('password')) is-invalid @endif"
                                        id="InputPassword" placeholder="Please Confirm Password"
                                        aria-describedby="PasswordConfirmationError" aria-invalid="true">
                                    <span id="PasswordConfirmationError" class="error invalid-feedback">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('super_admins.includes.datatable_scripts')
@endsection
