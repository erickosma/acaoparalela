@extends('layouts.app')

@section('content')


    <section class="pricing-page">
        <div class="container">
            <div class="center">
                <h2>Escolha como ajudar</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
            <div class="pricing-area text-center">
                <div class="row center">
                    <div class="col-sm-4 plan price-two wow fadeInDown col-lg-offset-2  col-md-offset-2  col-sm-offset-2 ">
                        <ul>
                            <li class="heading-two change-cursor" onclick="window.location='{!! url('perfil/voluntario') !!}'">
                                <h1> Voluntário </h1>
                                <span></span>
                            </li>
                            <li>10 Gb Disk Space</li>
                            <li>2GB Dadicated Ram</li>
                            <li>20 Addon Domain</li>
                            <li>20 Email Account</li>
                            <li>24/7 Support</li>
                            <li class="plan-action">
                                <a href="" class="btn btn-primary">Sign up</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-4 plan price-three wow fadeInDown">
                        <!-- <img src="images/ribon_one.png"> -->
                        <ul>
                            <li class="heading-three change-cursor" onclick="window.location='{!! url('perfil/ong') !!}'" >
                                <h1>Ong</h1>
                                <span></span>
                            </li>
                            <li>50 Gb Disk Space</li>
                            <li>8GB Dadicated Ram</li>
                            <li>Unlimited Addon Domain</li>
                            <li>Unlimited Email Account</li>
                            <li>24/7 Support</li>
                            <li class="plan-action">
                                <a href="" class="btn btn-primary">Sign up</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
    </section><!--/pricing-page-->

    <br>
    <br>
@endsection