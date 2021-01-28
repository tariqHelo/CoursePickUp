@extends('dashbord.layouts') 

@section('title')
<title>Your Profile </title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Account setting</h3>
        </div>
    </div>
    <div class="content-body">
        <!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                        <li class="nav-item">
                            <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                                href="#account-vertical-general" aria-expanded="true"> <i class="ft-globe mr-50"></i>
                                General </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                href="#account-vertical-password" aria-expanded="false"> <i class="ft-lock mr-50"></i>
                                Change Password </a>
                        </li>
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                        aria-labelledby="account-pill-general" aria-expanded="true">

                                        <form action="{{route('changeProfile')}}" method="post"
                                            enctype="multipart/form-data" novalidate>
                                            <div class="media">
                                                <a href="javascript: void(0);">
                                                    <img src="{{asset('' . Auth::user()->image)}}" class="rounded mr-75"
                                                        alt="profile image" height="64" width="64" />
                                                    @error('image')
                                                    <strong class="text-success">{{ $message }}</strong>
                                                    @enderror
                                                </a>
                                                <div class="media-body mt-75">
                                                    <div
                                                        class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label
                                                            class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                            for="account-upload">Upload new photo</label>
                                                        <input required type="file" name="image" id="account-upload"
                                                            hidden />
                                                        <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50">
                                                        <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr />
                                            @csrf

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            @error('username')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                            <label for="account-username">Username</label>
                                                            <input type="text" class="form-control"
                                                                id="account-username" placeholder="Username"
                                                                value="{{Auth::user()->username}}" name="username"
                                                                required
                                                                data-validation-required-message="This username field is required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">Name</label>
                                                            <input required name="name" type="text" class="form-control"
                                                                id="account-name" placeholder="Name"
                                                                value="{{Auth::user()->name}}" required
                                                                data-validation-required-message="This name field is required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="account-e-mail">E-mail</label>
                                                            <input type="email" class="form-control" id="account-e-mail"
                                                                placeholder="Email" value="{{Auth::user()->email}}"
                                                                name="email" required
                                                                data-validation-required-message="This email field is required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12"></div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                        aria-labelledby="account-pill-password" aria-expanded="false">
                                        <form action="{{route('updatePassword')}}" method="post"
                                            enctype="multipart/form-data" novalidate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-old-password">Old Password</label>
                                                            <input required type="password" class="form-control"
                                                                name="oldPassword" id="account-old-password" required
                                                                placeholder="Old Password"
                                                                data-validation-required-message="This old password field is required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-new-password">New Password</label>
                                                            <input type="password" name="password"
                                                                id="account-new-password" class="form-control"
                                                                placeholder="New Password" required
                                                                data-validation-required-message="The password field is required"
                                                                minlength="6" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-retype-new-password">Retype New
                                                                Password</label>
                                                            <input type="password" name="confirmPassword"
                                                                class="form-control" required
                                                                id="account-retype-new-password"
                                                                data-validation-match-match="password"
                                                                placeholder="New Password"
                                                                data-validation-required-message="The Confirm password field is required"
                                                                minlength="6" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                        aria-labelledby="account-pill-info" aria-expanded="false">
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="accountTextarea">Bio</label>
                                                        <textarea class="form-control" id="accountTextarea" rows="3"
                                                            placeholder="Your Bio data here..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-birth-date">Birth date</label>
                                                            <input type="text" class="form-control birthdate-picker"
                                                                required placeholder="Birth date"
                                                                id="account-birth-date"
                                                                data-validation-required-message="This birthdate field is required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="accountSelect">Country</label>
                                                        <select required class="form-control" id="accountSelect">
                                                            <option>USA</option>
                                                            <option>India</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="languageselect2">Languages</label>
                                                        <select required class="form-control" id="languageselect2"
                                                            multiple="multiple">
                                                            <option value="English" selected>English</option>
                                                            <option value="Spanish">Spanish</option>
                                                            <option value="French">French</option>
                                                            <option value="Russian">Russian</option>
                                                            <option value="German">German</option>
                                                            <option value="Arabic" selected>Arabic</option>
                                                            <option value="Sanskrit">Sanskrit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-phone">Phone</label>
                                                            <input type="text" class="form-control" id="account-phone"
                                                                required placeholder="Phone number"
                                                                value="(+656) 254 2568"
                                                                data-validation-required-message="This phone number field is required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-website">Website</label>
                                                        <input required type="text" class="form-control"
                                                            id="account-website" placeholder="Website address" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="musicselect2">Favourite Music</label>
                                                        <select required class="form-control" id="musicselect2"
                                                            multiple="multiple">
                                                            <option value="Rock">Rock</option>
                                                            <option value="Jazz" selected>Jazz</option>
                                                            <option value="Disco">Disco</option>
                                                            <option value="Pop">Pop</option>
                                                            <option value="Techno">Techno</option>
                                                            <option value="Folk" selected>Folk</option>
                                                            <option value="Hip hop">Hip hop</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="moviesselect2">Favourite movies</label>
                                                        <select required class="form-control" id="moviesselect2"
                                                            multiple="multiple">
                                                            <option value="The Dark Knight" selected>The Dark Knight
                                                            </option>
                                                            <option value="Harry Potter" selected>Harry Potter</option>
                                                            <option value="Airplane!">Airplane!</option>
                                                            <option value="Perl Harbour">Perl Harbour</option>
                                                            <option value="Spider Man">Spider Man</option>
                                                            <option value="Iron Man" selected>Iron Man</option>
                                                            <option value="Avatar">Avatar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                                        aria-labelledby="account-pill-social" aria-expanded="false">
                                        <form>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-twitter">Twitter</label>
                                                        <input required type="text" id="account-twitter"
                                                            class="form-control" placeholder="Add link"
                                                            value="https://www.twitter.com" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-facebook">Facebook</label>
                                                        <input required type="text" id="account-facebook"
                                                            class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-google">Google+</label>
                                                        <input required type="text" id="account-google"
                                                            class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-linkedin">LinkedIn</label>
                                                        <input required type="text" id="account-linkedin"
                                                            class="form-control" placeholder="Add link"
                                                            value="https://www.linkedin.com" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-instagram">Instagram</label>
                                                        <input required type="text" id="account-instagram"
                                                            class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-quora">Quora</label>
                                                        <input required type="text" id="account-quora"
                                                            class="form-control" placeholder="Add link" />
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                        aria-labelledby="account-pill-connections" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                    <strong>Twitter</strong></a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <button class="btn btn-sm btn-secondary float-right">edit</button>
                                                <h6>You are connected to facebook.</h6>
                                                <span>Johndoe@gmail.com</span>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="javascript: void(0);" class="btn btn-danger">
                                                    Connect to
                                                    <strong>Google</strong>
                                                </a>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <button class="btn btn-sm btn-secondary float-right">edit</button>
                                                <h6>You are connected to Instagram.</h6>
                                                <span>Johndoe@gmail.com</span>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                        aria-labelledby="account-pill-notifications" aria-expanded="false">
                                        <div class="row">
                                            <h6 class="ml-1 mb-2">Activity</h6>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm" checked
                                                        id="accountSwitch1" />
                                                    <label class="ml-50" for="accountSwitch1">Email me when someone
                                                        comments onmy article</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm" checked
                                                        id="accountSwitch2" />
                                                    <label for="accountSwitch2" class="ml-50">Email me when someone
                                                        answers on my form</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm"
                                                        id="accountSwitch3" />
                                                    <label for="accountSwitch3" class="ml-50">Email me hen someone
                                                        follows me</label>
                                                </div>
                                            </div>
                                            <h6 class="ml-1 my-2">Application</h6>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm" checked
                                                        id="accountSwitch4" />
                                                    <label for="accountSwitch4" class="ml-50">News and
                                                        announcements</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm"
                                                        id="accountSwitch5" />
                                                    <label for="accountSwitch5" class="ml-50">Weekly product
                                                        updates</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="checkbox" class="switchery" data-size="sm" checked
                                                        id="accountSwitch6" />
                                                    <label for="accountSwitch6" class="ml-50">Weekly blog digest</label>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account setting page end -->
    </div>
</div>

<script>
    document.getElementById("account-upload").addEventListener("change", function showFileSize() {
    // (Can't use `typeof FileReader === "function"` because apparently it
    // comes back as "object" on some browsers. So just see if it's there
    // at all.)
    if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return;
    }

    var input = document.getElementById('fileinput');
    if (!input.files) { // This is VERY unlikely, browser support is near-universal
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
    } else if (!input.files[0]) {
        console.log("Please select a file before clicking 'Load'");
    } else {
        var file = input.files[0];
        console.log("File " + file.name + " is " + file.size + " bytes in size");
    }
});
</script>
@endsection