<nav class="white" role="navigation">

    <div class="nav-wrapper">

        <a class="brand-logo" href="{{url('/')}}" >

            <img class="logo" src="{{url('img/logo.svg')}}" alt="Covid Community Response" />

        </a>

        <a href="#" data-target="mobile-demo" class="sidenav-trigger">

            <i class="material-icons about">menu</i>

        </a>

        <ul class="right hide-on-med-and-down">

            <li>

                <a href="{{url('about')}}" class="about">

                    About

                </a>

            </li>
            
            <li>

                <a href="{{url('3d-printers')}}" class="about">

                    Register 3D Printers

                </a>

            </li>
            
            <li>

                <a href="{{url('register-ppe')}}" class="about">

                    Register PPE Supplies

                </a>

            </li>

            <li>

                <a href="{{ url('map') }}" class="about">

                    Map

                </a>

            </li>

            <li>

                <a href="{{ url('register') }}" class="about">

                    Register

                </a>

            </li>

        </ul>

    </div>

</nav>

<ul class="sidenav" id="mobile-demo">

    <li>

        <a href="{{url('about')}}" class="about">

            About

        </a>

    </li>
    
    <li>

        <a href="{{url('register-ppe')}}" class="about">

            Register PPE Supplies

        </a>

    </li>
    
    <li>

        <a href="{{ url('3d-printers') }}" class="about">

            Register 3D Printers

        </a>

    </li>

    <li>

        <a href="{{ url('map') }}" class="about">

            Map

        </a>

    </li>

    <li>

        <a href="{{ url('register') }}" class="about">

            Register

        </a>

    </li>

</ul>
