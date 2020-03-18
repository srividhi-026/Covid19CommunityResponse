@include('layout.header')

    <main role="main" class="auth-view">

        @if(session()->has('message'))

            <div id="card-alert" class="card light-blue">

                <div class="notification card-content white-text">

                    <i class="notification-icon material-icons-outlined">notification_important</i>

                    <span>SUCCESS: {{session()->pull('message')}}</span>

                </div>

            </div>

        @endif

        @if ($errors->any())

            <div id="card-alert" class="card red lighten-1">

                <div class="notification card-content white-text">

                    <i class="notification-icon material-icons-outlined">notification_important</i>

                    <span>ERROR: Please review your details in the form below.</span>

                    <br>

                </div>

            </div>

        @endif



        <div class="auth-form-container">

            <div class="auth-form">

                <div class="col-12 text-center">

                    <h3>Register</h3>

                </div>

                <br>

                <div>

                    <form method="POST" action="{{ url('do_register') }}">

                        @csrf

                        <div class="row">

                            <div class="input-field col s12">

                                <i class="material-icons-outlined prefix">perm_identity</i>

                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" autofocus>

                                <label for="first_name">First Name</label>

                                @if ($errors->has('first_name'))
                                    <p class="error">{{ $errors->first('first_name') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <i class="material-icons-outlined prefix">people_outline</i>

                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" >

                                <label for="last_name">Last Name</label>

                                @if ($errors->has('last_name'))
                                    <p class="error">{{ $errors->first('last_name') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <i class="material-icons-outlined prefix">email</i>

                                <input id="email" name="email" type="email" value="{{ old('email') }}">

                                <label for="email">Email</label>

                                @if ($errors->has('email'))
                                    <p class="error">{{ $errors->first('email') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s6">

                                <i class="material-icons-outlined prefix">place</i>

                                <input id="lat" name="lat" type="text" value="{{ old('lat') }}">

                                <label id="lat-label" for="lat">Latitude</label>

                                @if ($errors->has('lat'))
                                    <p class="error">{{ $errors->first('lat') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s6">

                                <i class="material-icons-outlined prefix">place</i>

                                <input id="lng" name="lng" type="text" value="{{ old('lng') }}">

                                <label id="lng-label" for="lng">Longitude</label>

                                @if ($errors->has('lng'))

                                    <p class="error">{{ $errors->first('lng') }}</p>

                                @endif

                            </div>

                            <div class="col s12 center">

                                <a class="btn" onclick="getLocation()">Find My Location</a>

                            </div>

                            <div class="input-field col s12">

                                <i class="material-icons-outlined prefix">phone</i>

                                <input id="phone" name="phone" type="text" value="{{ old('phone') }}" >

                                <label for="phone">Phone</label>

                                @if ($errors->has('phone'))
                                    <p class="error">{{ $errors->first('phone') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <i class="material-icons-outlined prefix">place</i>

                                <select name="county" >

                                    <option value="Antrim">Antrim</option>
                                    <option value="Armagh">Armagh</option>
                                    <option value="Carlow">Carlow</option>

                                    <option value="Cavan">Cavan</option>
                                    <option value="Clare">Clare</option>
                                    <option value="Cork">Cork</option>
                                    <option value="Derry">Derry</option>


                                    <option value="Donegal">Donegal</option>
                                    <option value="Down">Down</option>
                                    <option value="Dublin">Dublin</option>

                                    <option value="Fermanagh">Fermanagh</option>
                                    <option value="Galway">Galway</option>
                                    <option value="Kerry">Kerry</option>

                                    <option value="Kildare">Kildare</option>
                                    <option value="Kilkenny">Kilkenny</option>
                                    <option value="Laois">Laois</option>

                                    <option value="Leitrim">Leitrim</option>
                                    <option value="Limerick">Limerick</option>

                                    <option value="Longford">Longford</option>
                                    <option value="Louth">Louth</option>
                                    <option value="Mayo">Mayo</option>

                                    <option value="Meath">Meath</option>
                                    <option value="Monaghan">Monaghan</option>
                                    <option value="Offaly">Offaly</option>

                                    <option value="Roscommon">Roscommon</option>
                                    <option value="Sligo">Sligo</option>
                                    <option value="Tipperary">Tipperary</option>

                                    <option value="Tyrone">Tyrone</option>
                                    <option value="Waterford">Waterford</option>
                                    <option value="Westmeath">Westmeath</option>

                                    <option value="Wexford">Wexford</option>
                                    <option value="Wicklow">Wicklow</option>

                                </select>

                                <label>Select County</label>

                                @if ($errors->has('county'))
                                    <p class="error">{{ $errors->first('county') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12 ">

                                <label>

                                    <input name="driving" type="checkbox" class="filled-in"/>

                                    <span>Access to Car?</span>

                                </label>
                                <br>

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="over18" type="checkbox" class="filled-in"/>

                                    <span> Are you over 18?</span>

                                </label>

                                <br>
                                @if ($errors->has('over18'))
                                    <p class="error">{{ $errors->first('over18') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="privacy_policy" type="checkbox" class="filled-in"/>

                                    <span> Agree our Privacy Policy. Read

                                        <a href="{{url('privacy_policy')}}" target="_blank">
                                            here
                                        </a>

                                    </span>

                                </label>
                                <br>

                                @if ($errors->has('privacy_policy'))
                                    <p class="error">{{ $errors->first('privacy_policy') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="confidentiality" type="checkbox" class="filled-in" />

                                    <span> Confidentitality Agreement. Read <a href="{{url('confidentiality')}}" target="_blank"> here </a></span>

                                </label>

                                <br>
                                @if ($errors->has('confidentiality'))
                                    <p class="error">{{ $errors->first('confidentiality') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="contact_email" type="checkbox" class="filled-in"/>

                                    <span> Can we contact you by email </span>

                                </label>

                            </div>

                        </div>

                        <br>

                        <div class="row center">

                            <button class="btn waves-effect waves-light" type="submit" name="action">

                                Register

                                <i class="material-icons right">send</i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>

    <script>

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            document.getElementById('lat').value = position.coords.latitude;
            document.getElementById('lng').value = position.coords.longitude;

            document.getElementById('lat-label').classList.add("active");
            document.getElementById('lng-label').classList.add("active");
        }
    </script>

@include('layout.footer')
