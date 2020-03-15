@include('layout.header')
    <div class="flex-center position-ref full-height bg-gradient-primary">
        <div class="content">
            <div class="title m-b-md">
                Covid Community Response Team
            </div>

            <div class="sub-title">
                An effort to coordinate all community based activity.            
            </div>
           
            <a href="https://discord.gg/Ej2HrDW" class="discord-chat">

                <button>Join the Conversation</button>

            </a>
        </div>
    </div>
@include('layout.footer')
 <!-- Styles -->
 <style>
    html, body {
        background-color: #89b5fa;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        color: black;
    }

    .m-b-md {
        margin-bottom: 10px;
    }

    .sub-title {
        font-size: 34px;
        color: black;
    }

    .discord-chat > button {
        color: black;
        margin-top: 10px;
    }
</style>