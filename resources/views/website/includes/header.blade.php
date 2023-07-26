<style>
    .mobile-menu-area .mean-nav {
    background: #186b56 none repeat scroll 0 0;
}

.mainmenu ul.sub-menu {
    background-color: #ffffff;
    border-top: 1px solid #1bb4b9;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    left: -23px;
    margin: 0;
    padding: 14px 21px 16px;
    position: absolute;
    text-align: left;
    top: 30px;
    -webkit-transform: rotateX(90deg);
    transform: rotateX(90deg);
    -webkit-transform-origin: center top 0;
    -ms-transform-origin: center top 0;
    transform-origin: center top 0;
    -webkit-transition: all 0.6s ease 0s;
    transition: all 0.6s ease 0s;
    visibility: hidden;
    width: 261px;
    z-index: -99;
}
.mainmenu ul#nav li ul.sub-menu > li a {
    color: #444444;
    display: block;
    font-size: 13px;
    font-weight: 300;
    line-height: 33px;
    text-transform: capitalize;
}
</style>
<!--Header Area Start-->
<header>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="">
                <a href="#"><img src="{{asset('custom/website/img/header_pppo.jpg')}}" width="100%" alt="PPPA"></a>
            </div>
        </div>
    </div>
<!--Logo Mainmenu Start-->
<div class="row" style="background-color: #186b59; border: 1px solid white; text-align:center">
    <div class="col-lg-12 d-none d-lg-block">
        <div class="mainmenu-area" style="padding:0px; float: unset;">
            <div class="mainmenu">
                <nav>
                    <ul id="nav">
                        <li class="current"><a style="line-height:30px; color:white" href="{{route('web-project-list')}}">Projects</a></li>
                        <li class="current"><a style="line-height:30px; color:white" href="{{route('sectors')}}">Sector</a></li>
                        <li class="current"><a style="line-height:30px; color:white" href="{{route('ministries')}}">Ministry</a></li>
                        <li><a style="line-height:30px; color:white" href="#">Phases<i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li class="current"><a href="{{route('phase','identification-phase')}}">Identitification Phase</a></li>
                                <li class="current"><a href="{{route('phase','development-phase')}}">Development Phase</a></li>
                                <li class="current"><a href="{{route('phase','procurement-phase')}}">Procurement Phase</a></li>
                                <li class="current"><a href="{{route('phase','award-phase')}}">Award Phase</a></li>
                                <li class="current"><a href="{{route('phase','implementation-phase')}}">Implementation Phase</a></li>
                            </ul>
                        </li>
                        <li class="current"><a style="line-height:30px; color:white" href="{{route('glossary')}}">Glossary</a></li>
                        <li class="current"><a style="line-height:30px; color:white" href="{{route('faq')}}">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </div>    
    </div>
</div>
<!--End of Logo Mainmenu-->
<!-- Mobile Menu Area start -->
<div class="mobile-menu-area" style="background: #186b56">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white" href="{{route('web-project-list')}}">Projects</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white" href="{{route('sectors')}}">Sector</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white" href="{{route('ministries')}}">Ministry</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('phase','identification-phase')}}">Identitification Phase</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('phase','development-phase')}}">Development Phase</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('phase','procurement-phase')}}">Procurement Phase</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('phase','award-phase')}}">Award Phase</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('phase','implementation-phase')}}">Implementation Phase</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('glossary')}}">Glossary</a></li>
                            <li class="current"><a style="line-height:30px; background: #186b56; color:white"href="{{route('faq')}}">FAQ</a></li>
                        </ul>
                    </nav>
                </div>					
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area end -->  
</header>
<!--End of Header Area-->