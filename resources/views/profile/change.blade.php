@extends('layout.app')

@section('title', ' - Perfil')
@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
    <style type="text/css">
        .square, .btn {
            border-radius: 0px!important;
        }

        /* -- color classes -- */
        .coralbg {
            background-color: #FA396F;
        }

        .coral {
            color: #FA396f;
        }

        .turqbg {
            background-color: #46D8D2;
        }

        .turq {
            color: #46D8D2;
        }

        .white {
            color: #fff!important;
        }

        /* -- The "User's Menu Container" specific elements. Custom container for the snippet -- */
        div.user-menu-container {
            z-index: 10;
            background-color: #fff;
            margin-top: 20px;
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

        div.user-menu-container .btn-lg {
            padding: 0px 12px;
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
            min-height:200px;
            border: 0px!important;
            padding: 0px;
            border-radius: 0;
            border: 0px!important;
        }

        /* -- Vertical Button Group -- */
        div.user-menu-container .btn-group-vertical {
            display: block;
        }

        div.user-menu-container .btn-group-vertical>a {
            padding: 20px 25px;
            background-color: #46D8D2;
            color: white;
            border-color: #fff;
        }

        div.btn-group-vertical>a:hover {
            color: white;
            border-color: white;
        }

        div.btn-group-vertical>a.active {
            background: #FA396F;
            box-shadow: none;
            color: white;
        }
        /* -- Individual button styles of vertical btn group -- */
        div.user-menu-btns {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        div.user-menu-btns div.btn-group-vertical>a.active:after{
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #46D8D2;
        }
        /* -- The main tab & content styling of the vertical buttons info-- */
        div.user-menu-content {
            color: #323232;
        }

        ul.user-menu-list {
            list-style: none;
            margin-top: 20px;
            margin-bottom: 0;
            padding: 10px;
            border: 1px solid #eee;
        }
        ul.user-menu-list>li {
            padding-bottom: 8px;
            text-align: center;
        }

        div.user-menu div.user-menu-content:not(.active){
            display: none;
        }

        /* -- The btn stylings for the btn icons -- */
        .btn-label {position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
        .btn-labeled {padding-top: 0;padding-bottom: 0;}

        /* -- Custom classes for the snippet, won't effect any existing bootstrap classes of your site, but can be reused. -- */

        .user-pad {
            padding: 20px 25px;
        }

        .no-pad {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        .user-details {
            background: #eee;
            min-height: 333px;
        }

        .user-image {
            max-height:200px;
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

        .view {
            position:relative;
            overflow:hidden;
            margin-top: 10px;
        }

        .view p {
            margin-top: 20px;
            margin-bottom: 0;
        }

        .caption {
            position:absolute;
            top:0;
            right:0;
            background: rgba(70, 216, 210, 0.44);
            width:100%;
            height:100%;
            padding:2%;
            display: none;
            text-align:center;
            color:#fff !important;
            z-index:2;
        }

        .caption a {
            padding-right: 10px;
            color: #fff;
        }

        .info {
            display: block;
            padding: 10px;
            background: #eee;
            text-transform: uppercase;
            font-weight: 300;
            text-align: right;
        }

        .info p, .stats p {
            margin-bottom: 0;
        }

        .stats {
            display: block;
            padding: 10px;
            color: white;
        }

        .share-links {
            border: 1px solid #eee;
            padding: 15px;
            margin-top: 15px;
        }

        .square, .btn {
            border-radius: 0px!important;
        }

        /* -- media query for user profile image -- */
        @media (max-width: 767px) {
            .user-image {
                max-height: 400px;
            }
        }


        .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: rgba(214, 224, 226, 0.2);
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card .card-heading {
            padding: 0 20px;
            margin: 0;
        }

        .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #777;
            border-bottom: 1px solid #e5e5e5;
        }

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #999999;
        }

        .card .card-body {
            padding: 0 20px;
            margin-top: 20px;
        }

        .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #999;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .card.people:first-child {
            margin-left: 0;
        }

        .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .card.people .card-top.green {
            background-color: #53a93f;
        }

        .card.people .card-top.blue {
            background-color: #427fed;
        }

        .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: rgba(214, 224, 226, 0.2);
        }

        .card.hovercard .cardheader {
            background: url("http://lorempixel.com/850/280/nature/4/");
            background-size: cover;
            height: 135px;
        }

        .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
        }

        .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }

        .btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }

    </style>
@endsection

@section('script')
    <script src="{{ mix('app/js/profile.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">

            <div class="container">
                <div class="row user-menu-container square">
                    <div class="col-md-12 user-details">
                        <div class="row coralbg white">
                            <div class="col-md-6 no-pad">
                                <div class="user-pad">
                                    <h3>Welcome back, Jessica</h3>
                                    <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                                    <h4 class="white"><i class="fa fa-twitter"></i> CoolesOCool</h4>
                                    <button type="button" class="btn btn-labeled btn-info" href="#">
                                        <span class="btn-label"><i class="fa fa-pencil"></i></span>Update</button>
                                </div>
                            </div>
                            <div class="col-md-6 no-pad">
                                <div class="user-image">
                                    <img src="https://farm7.staticflickr.com/6163/6195546981_200e87ddaf_b.jpg" class="img-responsive thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="row overview">
                            <div class="col-md-4 user-pad text-center">
                                <h3>FOLLOWERS</h3>
                                <h4>2,784</h4>
                            </div>
                            <div class="col-md-4 user-pad text-center">
                                <h3>FOLLOWING</h3>
                                <h4>456</h4>
                            </div>
                            <div class="col-md-4 user-pad text-center">
                                <h3>APPRECIATIONS</h3>
                                <h4>4,901</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row user-menu-container square">
                    <div class="col-md-1 user-menu-btns">
                        <div class="btn-group-vertical square" id="responsive">
                            <a href="#" class="btn btn-block btn-default active">
                                <i class="fa fa-bell-o fa-3x"></i>
                            </a>
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-envelope-o fa-3x"></i>
                            </a>
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-laptop fa-3x"></i>
                            </a>
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-cloud-upload fa-3x"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 user-menu user-pad">
                        <div class="user-menu-content active">
                            <h3>
                                Recent Interactions
                            </h3>
                            <ul class="user-menu-list">
                                <li>
                                    <h4><i class="fa fa-user coral"></i> Roselynn Smith followed you.</h4>
                                </li>
                                <li>
                                    <h4><i class="fa fa-heart-o coral"></i> Jonathan Hawkins followed you.</h4>
                                </li>
                                <li>
                                    <h4><i class="fa fa-paper-plane-o coral"></i> Gracie Jenkins followed you.</h4>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-labeled btn-success" href="#">
                                        <span class="btn-label"><i class="fa fa-bell-o"></i></span>View all activity</button>
                                </li>
                            </ul>
                        </div>
                        <div class="user-menu-content">
                            <h3>
                                Your Inbox
                            </h3>
                            <ul class="user-menu-list">
                                <li>
                                    <h4>From Roselyn Smith <small class="coral"><strong>NEW</strong> <i class="fa fa-clock-o"></i> 7:42 A.M.</small></h4>
                                </li>
                                <li>
                                    <h4>From Jonathan Hawkins <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                                </li>
                                <li>
                                    <h4>From Georgia Jennings <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-labeled btn-danger" href="#">
                                        <span class="btn-label"><i class="fa fa-envelope-o"></i></span>View All Messages</button>
                                </li>
                            </ul>
                        </div>
                        <div class="user-menu-content">
                            <h3>
                                Trending
                            </h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="view">
                                        <div class="caption">
                                            <p>47LabsDesign</p>
                                            <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                            <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                        </div>
                                        <img src="http://24.media.tumblr.com/273167b30c7af4437dcf14ed894b0768/tumblr_n5waxesawa1st5lhmo1_1280.jpg" class="img-responsive">
                                    </div>
                                    <div class="info">
                                        <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                                        <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                                        </p>
                                    </div>
                                    <div class="stats turqbg">
                                        <span class="fa fa-heart-o"> <strong>47</strong></span>
                                        <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="view">
                                        <div class="caption">
                                            <p>47LabsDesign</p>
                                            <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                            <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                        </div>
                                        <img src="http://24.media.tumblr.com/282fadab7d782edce9debf3872c00ef1/tumblr_n3tswomqPS1st5lhmo1_1280.jpg" class="img-responsive">
                                    </div>
                                    <div class="info">
                                        <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                                        <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                                        </p>
                                    </div>
                                    <div class="stats turqbg">
                                        <span class="fa fa-heart-o"> <strong>47</strong></span>
                                        <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-menu-content">
                            <h2 class="text-center">
                                START SHARING
                            </h2>
                            <div style="text-align: center;"><i class="fa fa-cloud-upload fa-4x"></i></div>
                            <div class="share-links">
                                <div style="text-align: center;"><button type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
                                        <span class="btn-label"><i class="fa fa-bell-o"></i></span>A FINISHED PROJECT
                                    </button></div>
                                <div style="text-align: center;"><button type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
                                        <span class="btn-label"><i class="fa fa-bell-o"></i></span>A WORK IN PROGRESS
                                    </button></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <section id="profile-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">



        <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">

                        <div class="card hovercard">
                            <div class="cardheader">

                            </div>
                            <div class="avatar">
                                <img alt="" src="http://lorempixel.com/100/100/people/9/">
                            </div>
                            <div class="info">
                                <div class="title">
                                    <a target="_blank" href="https://scripteden.com/">Script Eden</a>
                                </div>
                                <div class="desc">Passionate designer</div>
                                <div class="desc">Curious developer</div>
                                <div class="desc">Tech geek</div>
                            </div>
                            <div class="bottom">
                                <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" rel="publisher"
                                   href="https://plus.google.com/+ahmshahnuralam">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" rel="publisher"
                                   href="https://plus.google.com/shahnuralam">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>



            <a href="#" class="logout">Sair</a>
        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

