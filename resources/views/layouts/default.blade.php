<!--
______                            _              _                                     _
| ___ \                          | |            | |                                   | |
| |_/ /___ __      __ ___  _ __  | |__   _   _  | |      __ _  _ __  __ _ __   __ ___ | |
|  __// _ \\ \ /\ / // _ \| '__| | '_ \ | | | | | |     / _` || '__|/ _` |\ \ / // _ \| |
| |  | (_) |\ V  V /|  __/| |    | |_) || |_| | | |____| (_| || |  | (_| | \ V /|  __/| |
\_|   \___/  \_/\_/  \___||_|    |_.__/  \__, | \_____/ \__,_||_|   \__,_|  \_/  \___||_|
                                          __/ |
                                         |___/
  ========================================================
                                           TwoVPN.com
 	=========================================================
  Laravel: v5.0.0 
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.partials.header')
  </head>

  <body>
  	<div class="wrapper">
    <!--header start-->
    <header class="header-frontend">
			@include('layouts.partials.nav')
    </header>

    	@yield('content')

    <footer class="footer">
    	@include('layouts.partials.footer')
    </footer>
    <!--header end-->
  	</div>
  </body>
</html>