@include('layout.header')

    <div class="main-wrapper container-fluid">

        <div class="row banner">
            <br><br>
            <h1 class="header center ">
                <span class="orange-font  banner-text">NATIONAL SUPPORT HELPLINE</span><br>
                <span class="banner-number">TEXT: +353 86 180 OR CALL: +353 21 237 7809 </span> <br>
                <span class="green-text banner-text">ONE COMMUNITY, TOGETHER.</span> <br>
            </h1>
        </div>

        <div class="row links">

            <div class="orange-container col s12 m6 orange-container">

                <a href="{{url('register')}}" class="main-link">REGISTER TO VOLUNTEER</a>

            </div>

            <div class="col s12 m6 green-container">

                <a href="https://discord.gg/Ej2HrDW" class="main-link">JOIN THE DISCUSSION</a>

            </div>

        </div>

    </div>

@include('layout.footer')
