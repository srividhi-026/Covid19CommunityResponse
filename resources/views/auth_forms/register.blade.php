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

                            <div class="input-field col s12 l6">

                                <i class="material-icons-outlined prefix">perm_identity</i>

                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" autofocus>

                                <label for="first_name">First Name</label>

                                @if ($errors->has('first_name'))

                                    <p class="error">{{ $errors->first('first_name') }}</p>

                                @endif

                            </div>

                            <div class="input-field col s12 l6">

                                <i class="material-icons-outlined prefix">people_outline</i>

                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" >

                                <label for="last_name">Last Name</label>

                                @if ($errors->has('last_name'))
                                    <p class="error">{{ $errors->first('last_name') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12 l6">

                                <i class="material-icons-outlined prefix">email</i>

                                <input id="email" name="email" type="email" value="{{ old('email') }}">

                                <label for="email">Email</label>

                                @if ($errors->has('email'))
                                    <p class="error">{{ $errors->first('email') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12 l6">

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

                                <p>Drag the map marker to set you location.</p>

                                <script src='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js'></script>
                                <link href='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css' rel='stylesheet' />

                                <div id='lat-lng-map'></div>

                            </div>
                            
                            
                            <div class="input-field col s12">

                                <label>

                                    <input onclick="displayVolunteerDetailsSection()" id="volunteer-details-checkbox" name="volunteer" type="checkbox" class="filled-in" {{ old('volunteer') ? 'checked' : '' }} />

                                    <span>Do you wish to volunteer your time?</span>

                                </label>

                                <br>

                            </div>
                            
                            <div class="input-field col s12">

                                <label>

                                    <input onclick="displayPPEDetailsSection()" id="ppe-details-checkbox" name="ppe" type="checkbox" class="filled-in" {{ old('ppe') ? 'checked' : '' }} />

                                    <span>Do you have access to Personal Protective Equipment which is available for donation?</span>

                                </label>

                                <br>

                            </div>
                            
                            <div class="input-field col s12">

                                <label>

                                    <input onclick="displayPrinterDetailsSection()" id="printer-details-checkbox" name="printer" type="checkbox" class="filled-in" {{ old('printer') ? 'checked' : '' }} />

                                    <span>Do you have access to a 3D printer?</span>

                                </label>

                                <br>

                            </div>
                        </div>
                            <div id="volunteer-details">
                                <h6><b>Volunteer Information</b></h6>

                                <div class="input-field col s12 ">

                                    <label>

                                        <input name="driving" type="checkbox" class="filled-in" {{ old('driving') ? 'checked' : '' }} />

                                        <span>Access to Car?</span>

                                    </label>
                                    <br>

                                </div>

                                <div class="input-field col s12">

                                    <label>

                                        <input name="over18" type="checkbox" class="filled-in" {{ old('over18') ? 'checked' : '' }} />

                                        <span> Are you over 18?</span>

                                    </label>

                                    <br>
                                    @if ($errors->has('over18'))
                                        <p class="error">{{ $errors->first('over18') }}</p>
                                    @endif

                                </div>

                                <div class="input-field col s12">

                                    <label>

                                        <input name="privacy_policy" type="checkbox" class="filled-in" {{ old('privacy_policy') ? 'checked' : '' }} />

                                        <span> Agree to our Privacy Policy. Read

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

                                        <input name="confidentiality" type="checkbox" class="filled-in" {{ old('confidentiality') ? 'checked' : '' }} />

                                        <span> Agree to our Confidentiality Agreement. Read <a href="{{url('confidentiality')}}" target="_blank"> here </a></span>

                                    </label>

                                    <br>

                                    @if ($errors->has('confidentiality'))
                                        <p class="error">{{ $errors->first('confidentiality') }}</p>
                                    @endif

                                </div>

                                <div class="input-field col s12">

                                    <label>

                                        <input name="contact_email" type="checkbox" class="filled-in" {{ old('contact_email') ? 'checked' : '' }}  />

                                        <span> Can we contact you by email?</span>

                                    </label>

                                    <br>

                                </div>

                                <div class="input-field col s12">

                                    <label>

                                        <input name="group" type="checkbox" class="filled-in" {{ old('group') ? 'checked' : '' }} />

                                        <span> Are you  part of a group?</span>

                                    </label>

                                    <br>

                                </div>
                            </div>
                        
                            <div id="printer-details">
                                <h6><b>3D Printer Information</b></h6>
                                <div class="input-field col s12">

                                    <label>3D Pinter Make</label>
                                    
                                    <input name="printer_make" type="text" class="filled-in" value="{{ old('printer_make') }}" />
                                    
                                    @if ($errors->has('printer_make'))
                                    <p class="error">{{ $errors->first('printer_make') }}</p>
                                    @endif
                                </div>
                                <div class="input-field col s12">

                                    <label>3D Pinter Model</label>
                                    
                                    <input name="printer_model" type="text" class="filled-in" value="{{ old('printer_model') }}"/>
                                    
                                    @if ($errors->has('printer_model'))
                                    <p class="error">{{ $errors->first('printer_model') }}</p>
                                    @endif
                                </div>
                                <div class="input-field col s12">

                                    <label>Material</label>
                                    
                                    <input name="printer_material" type="text" class="filled-in" value="{{ old('printer_material') }}"/>
                                    
                                    @if ($errors->has('printer_material'))
                                    <p class="error">{{ $errors->first('printer_material') }}</p>
                                    @endif
                                </div>
                                
                                <div class="input-field col s12">

                                    <label>Notes</label>
                                    
                                    <input name="printer_notes" type="text" class="filled-in" value="{{ old('printer_notes') }}"/>
                                    
                                    @if ($errors->has('printer_notes'))
                                    <p class="error">{{ $errors->first('printer_notes') }}</p>
                                    @endif
                                </div>

                            </div>
                            
                            <div id="ppe-details">
                                <h6><b>PPE Donations</b></h6>
                                <div class="input-field col s12">

                                    <label>Please describe what PPE supplies you have for donation</label>
                                    
                                    <input name="ppe_supplies_description" type="text" class="filled-in" value="{{ old('ppe_supplies_description') }}"/>
                                    
                                    @if ($errors->has('ppe_supplies_description'))
                                    <p class="error">{{ $errors->first('ppe_supplies_description') }}</p>
                                    @endif
                                </div>
                                
                                <div class="input-field col s12">

                                    <label>Volume of items for collection (How big is your package?)</label>
                                    
                                    <input name="volume" type="text" class="filled-in" value="{{ old('volume') }}"/>
                                    
                                    @if ($errors->has('volume'))
                                    <p class="error">{{ $errors->first('volume') }}</p>
                                    @endif
                                </div>
                            
                                <div class="input-field col s12">

                                    <label>Eircode (To enable a quick pickup from our couriers)</label>
                                    
                                    <input name="eircode" type="text" class="filled-in" value="{{ old('eircode') }}" />
                                    
                                    @if ($errors->has('eircode'))
                                    <p class="error">{{ $errors->first('eircode') }}</p>
                                    @endif
                                </div>
                            
                                <div class="input-field col s12">

                                    <label>General availability times for collection</label>
                                    
                                    <input name="availability_times" type="text" class="filled-in" value="{{ old('availability_times') }}"/>
                                    
                                    @if ($errors->has('availability_times'))
                                    <p class="error">{{ $errors->first('availability_times') }}</p>
                                    @endif
                                </div>
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
        L.mapbox.accessToken = 'pk.eyJ1IjoiY3J5cHRva25pZ2h0IiwiYSI6ImNrN3c3emtyNTAwMnUza203ajkxdnltbnEifQ.cIJgx9Rz3A-uOJ1zsWtdQg';
        var map = L.mapbox.map('lat-lng-map')
            .setView([53.3338, -6.2488], 5)
            .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/dark-v10'));

        var coordinates = document.getElementById('coordinates');

        var marker = L.marker([53.3338, -6.2488], {
            icon: L.mapbox.marker.icon({
                'marker-color': '#f86767'
            }),
            draggable: true
        }).addTo(map);

        // every time the marker is dragged, update the coordinates container
        marker.on('dragend', ondragend);

        // Set the initial marker coordinate on load.
        //ondragend();

        function ondragend() {
            var m = marker.getLatLng();

            document.getElementById('lat').value = m.lat;
            document.getElementById('lng').value = m.lng;

            document.getElementById('lat-label').classList.add("active");
            document.getElementById('lng-label').classList.add("active");
        }
        
        function displayPrinterDetailsSection() {
            // Get the checkbox
            var checkBox = document.getElementById("printer-details-checkbox");
            // Get the output text
            var printerDetails = document.getElementById("printer-details");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
              printerDetails.style.display = "block";
            } else {
              printerDetails.style.display = "none";
            }
        }
        
        function displayVolunteerDetailsSection() {
            // Get the checkbox
            var checkBox = document.getElementById("volunteer-details-checkbox");
            var volunteerDetails = document.getElementById("volunteer-details");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
              volunteerDetails.style.display = "block";
            } else {
              volunteerDetails.style.display = "none";
            }
        }
        
        function displayPPEDetailsSection() {
            // Get the checkbox
            var checkBox = document.getElementById("ppe-details-checkbox");
            var ppeDetails = document.getElementById("ppe-details");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
              ppeDetails.style.display = "block";
            } else {
              ppeDetails.style.display = "none";
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            displayPrinterDetailsSection();
            displayVolunteerDetailsSection();
            displayPPEDetailsSection()
        }, false);
    </script>

@include('layout.footer')
