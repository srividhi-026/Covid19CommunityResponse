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

                    <h3>CCR Call Agent Registration</h3>

                    <p>
                        Welcome & thank you volunteering as an agent. Please complete this form to register as an
                        agent on the CCR National Helpline.
                    </p>

                </div>

                <br>

                <div>

                    <form method="POST" action="{{ url('agent_register') }}">

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

                                <i class="material-icons-outlined prefix">home</i>

                                <input id="email" name="address" type="text" value="{{ old('address') }}">

                                <label for="address">Address</label>

                                @if ($errors->has('address'))
                                    <p class="error">{{ $errors->first('address') }}</p>
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

                                <label>

                                    <input name="data_protection_policy" type="checkbox" class="filled-in" {{ old('data_protection_policy') ? 'checked' : '' }} />

                                    <span> I have read and agree with the

                                        <a href="{{url('agent_data_protection_policy')}}" target="_blank">
                                            CCR Data Protection Policy
                                        </a>

                                    </span>

                                </label>

                                <br>

                                @if ($errors->has('data_protection_policy'))
                                    <p class="error">{{ $errors->first('data_protection_policy') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="privacy_policy" type="checkbox" class="filled-in" {{ old('privacy_policy') ? 'checked' : '' }} />

                                    <span> I have read and agree with the
                                        <a href="{{url('agent_privacy_policy')}}" target="_blank">
                                        CCR Privacy Policy
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

                                    <span> I have read and agree with the
                                        <a href="{{url('agent_ca')}}" target="_blank">
                                        CCR Confidentiality Agreement
                                        </a>
                                    </span>

                                </label>

                                <br>

                                @if ($errors->has('confidentiality'))
                                    <p class="error">{{ $errors->first('confidentiality') }}</p>
                                @endif

                            </div>



                            <div class="input-field col s12">

                                <label>

                                    <input name="checklist" type="checkbox" class="filled-in" {{ old('checklist') ? 'checked' : '' }} />

                                    <span> I have read and agree with the
                                        <a href="{{url('cyber_security_checklist')}}" target="_blank">
                                        CCR Cyber Security Checklist
                                        </a>
                                    </span>

                                </label>

                                <br>

                                @if ($errors->has('checklist'))
                                    <p class="error">{{ $errors->first('checklist') }}</p>
                                @endif

                            </div>

                            <div class="input-field col s12">

                                <label>

                                    <input name="gdpr" type="checkbox" class="filled-in" {{ old('gdpr') ? 'checked' : '' }} />

                                    <span> I have read and agree with the
                                        <a href="https://www.dropbox.com/sh/cfr1mcp1pyercwe/AAA75_grCkCBlGPI40PbWTDRa/Covid%20Community%20Response%20GDPR%20Training-4.mp4?dl=0" target="_blank">
                                        CCR GDPR Training
                                        </a>
                                    </span>

                                </label>

                                <br>

                                @if ($errors->has('gdpr'))
                                    <p class="error">{{ $errors->first('gdpr') }}</p>
                                @endif

                            </div>

                            <br>
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

@include('layout.footer')
