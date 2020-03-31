@include('layout.header')

    <div class="main-wrapper container-fluid">

        <div class="row banner">
            <br><br>
            <h1 class="center">
                <span class="orange-font banner-text">NATIONAL SUPPORT HELPLINE</span><br>
                <span class="header banner-number">TEXT: </span> <span class="banner-number normal-text"><a href="tel:086 180 0256"><b>086 180 0256 </b></a></span><span class="header banner-number">&nbsp;&nbsp; CALL: </span><span class="banner-number normal-text"><a href="tel:021 237 7809"><b>021 237 7809</b></a></span><br>
                <span class="green-text banner-text">ONE COMMUNITY, TOGETHER.</span> <br>
            </h1>
        </div>

        <div class="row links">

            <div class="orange-container col s12 m6 orange-container">

                <a href="{{url('register', ['page' => 'volunteer'])}}" class="main-link">REGISTER TO VOLUNTEER</a>

            </div>

            <div class="col s12 m6 green-container">

                <a href="https://discord.gg/Ej2HrDW" class="main-link" target="_blank">JOIN THE DISCUSSION</a>

            </div>

        </div>

    </div>

@include('layout.footer')
