@extends('layout.app')


@section('style')
    <style type="text/css">

        /* -- color classes -- */
        .coralbg {
            background-color: #FA396F;
        }

        .white {
            color: #fff!important;
        }

        /* -- The "User's Menu Container" specific elements. Custom container for the snippet -- */
        div.user-menu-container {
            z-index: 10;
            background-color: #fff;
            opacity: 0.97;
            filter: alpha(opacity=97);
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

        div.user-menu-container h4 {
            font-weight: 300;
            color: #8b8b8b;
        }

        div.user-menu-container a, div.user-menu-container .btn  {
            transition: 1s ease;
        }

        div.user-menu-container .thumbnail {
            width:100%;
            min-height:22rem;
            border: 0px;
            padding: 0px;
            border-radius: 0;
            border: 0px;
        }

        .user-details {
            background: #eee;
            min-height: 33rem;
        }

        .user-image {
            max-height: 20rem;
            overflow:hidden;
        }

        .overview h3 {
            font-weight: 300;
            margin-top: 15px;
            margin: 10px 0 0 0;
        }

        .overview h4 {
            font-weight: bold!important;
            font-size: 40px;
            margin-top: 0;
        }


        /* -- media query for user profile image -- */
        @media only screen and (max-width: 700px) {
            .user-image {
                min-height:20rem;
            }
        }
    </style>
@endsection

@section('script')
    <script src="{{ mix('app/js/profile.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 justify-content-center mb-5">
            <div class="row">
                <div class="col user-menu-container">
                    <div class="col-md-11 user-details">
                        <div class="row coralbg white">
                            <div class="col-md-6 p-0">
                                <div class="pl-lg-5  pl-4  pt-4">
                                    <h3>Welcome back, Jessica</h3>
                                    <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                                    <h4 class="white"><i class="fa fa-twitter"></i> CoolesOCool</h4>
                                    <button type="button" class="btn btn-labeled btn-info" href="#">
                                        <span class="btn-label"><i class="fa fa-pencil"></i></span>Update</button>
                                </div>
                            </div>
                            <div class="col-md-6 p-0">
                                <div class="user-image">
                                    <img src="https://picsum.photos/600" class="img-responsive thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="row overview">
                            <div class="col-md-4 p-4 text-center">
                                <h3>FOLLOWERS</h3>
                                <h4>2,784</h4>
                            </div>
                            <div class="col-md-4 p-4 text-center">
                                <h3>FOLLOWING</h3>
                                <h4>456</h4>
                            </div>
                            <div class="col-md-4 p-4 text-center">
                                <h3>APPRECIATIONS</h3>
                                <h4>4,901</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

