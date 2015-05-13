    <!--header start-->
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html">Flat<span>Lab</span></a> -->
                    <a href="#"><img src="{{{asset('./assets/images/logo.png')}}}" alt="Image 1"></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="{{route('index')}}"><?= Lang::get('twovpn.index'); ?></a></li> -->
                        <!-- <li><a href="{{route('about')}}"><?= Lang::get('twovpn.about'); ?></a></li> -->
<!--                         <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><?= Lang::get('twovpn.service'); ?><b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu"> -->
<!--                                 <li><a href="{{route('vpnService')}}"><?= Lang::get('twovpn.VPN'); ?></a></li>
                                <li><a href="{{route('ssService')}}"><?= Lang::get('twovpn.SS'); ?></a></li> -->
<!--                             </ul>
                        </li>
                        <li></li> -->
                        <li><a href="{{route('home')}}" class="btn btn-default"><?= Lang::get('twovpn.login'); ?></a></li>
                        <li><a href="{{url('/user/register')}}" class="btn btn-default"><?= Lang::get('twovpn.register'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    <!--header end-->