<div class="card-body p-0 border-0 p-0 rounded-10">
    <div class="p-4">
        <h4 class="tx-15 text-uppercase mb-3">Biodata</h4>
        <p class="m-b-5">
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-user me-2"></i></span><span
                class="font-weight-semibold me-2">Nama:</span><span>{{ Auth::user()->name }}</span>
        </p>
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span
                class="font-weight-semibold me-2">Email:</span><span>{{ Auth::user()->email }}</span>
        </p>
        <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span
                class="font-weight-semibold me-2">Role:</span><span>{{ Auth::user()->getroleNames()[0] }}</span>
        </p>
        </p>

        <style>
            p {
                text-align: justify;
                text-justify: inter-word;
                font-family: 'Poppins' !important;
            }
        </style>

        <h5 class="mb-2 mt-3 fw-semibold">Profil :</h5>



    </div>
    <div class="border-top"></div>
    <!-- <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Statistics</label>
        <div class="profile-cover__info ms-4 ms-auto p-0">
            <ul class="nav p-0 border-bottom-0 mb-0">
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">113</span>Projects</li>
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">245</span>Followers</li>
                <li class="border p-2 br-5 bg-light wd-100 ht-70"><span class="border-0 mb-0 pb-0">128</span>Following</li>
            </ul>
        </div>
    </div>
    <div class="border-top"></div>
    <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Contact</label>
        <div class="d-sm-flex">
            <div class="mg-sm-r-20 mg-b-10">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-md-phone-portrait"></i>
                        </div>
                        <div class="media-body"> <span>Mobile</span>
                            <div> +245 354 654 </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-sm-r-20 mg-b-10">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-slack"></i>
                        </div>
                        <div class="media-body"> <span>Slack</span>
                            <div> @spruko.w </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-md-locate"></i>
                        </div>
                        <div class="media-body"> <span>Current Address</span>
                            <div> San Francisco, CA </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top"></div>
    <div class="p-4">
        <label class="main-content-label tx-13 mg-b-20">Social</label>
        <div class="d-lg-flex">
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-logo-github"></i>
                        </div>
                        <div class="media-body"> <span>Github</span> <a href="">github.com/spruko</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-twitter"></i>
                        </div>
                        <div class="media-body"> <span>Twitter</span> <a href="">twitter.com/spruko.me</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-logo-linkedin"></i>
                        </div>
                        <div class="media-body"> <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a> </div>
                    </div>
                </div>
            </div>
            <div class="mg-md-r-20 mg-b-10">
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-danger-transparent text-danger">
                            <i class="icon ion-md-link"></i>
                        </div>
                        <div class="media-body"> <span>My Portfolio</span> <a href="">spruko.com/</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
