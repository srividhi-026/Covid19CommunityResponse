@include('layout.header')

<div class="container">

    <h4 class="text-center">Donate PPE (Personal Protective Equipment)</h4>

    <img src="{{url('/img/ppe_new.jpeg')}}" class="responsive-img img-fit" alt="Volunteer Logo"></img>

    <a href="{{url('register', ['page' => 'ppe'])}}">
        <button id="call-to-action" type="button" class="btn btn-primary">Register Here</button>
    </a>
    <p class="para">
        During this crisis, we need our community to help one another as much as possible. Our front line heroes
        all over the country need many basic supplies right now, particularly in the area of PPE personal
        protective equipment.
    </p>
    <p class="para">
        If you have products or raw materials which can be used to protect our front line staff and care workers,
        our Bravo Charlie Tango team will pick up and do our utmost to deliver them to those that need them most.
    </p>

    <p class="text-center"><b>Every little helps.</b></p>
    <p>Here are some of the materials we need. We will update this regularly.</p>
    <div class="list-of-ppe-items">
        <h6><b>
                Products:
        </h6></b>
        <ul>
            <li>PPE: Gloves, face-masks, face shields, bio-hazard suits and more. If in doubt please ask us.
</li>
            <li>Walkie talkies and baby monitors</li>
        </ul>
    </div>

    <div class="list-of-ppe-items">
        <h6><b>
                Raw Materials:
        </h6></b>
        <ul>
            <li>Foam, elastic string for face shields</li>
            <li>3D printing filament</li>
            <li>Access to vacuum formers or laser cutters</li>
            <li>Plastic sheeting</li>
        </ul>
        <p class="para">
            Please ensure these products are in good working order and in good condition. Boxes of disposable
            materials (e.g. gloves) should be unopened. We will not be able to return goods to owners. Donators
            will be notified by email or text about how to pass these materials to our delivery volunteers in a
            safe and hygienic manner. Those receiving these materials must acknowledge the risks associated.
        </p>

        <p class="text-center"><b>You Donate. We Pick Up. We Deliver.</b></p>

        <p>
            TeamOSV is an open-source design and make movement committed to the development of frontline emergency
            products and services to help fight the Covid-19 crisis. The initiative is made up of individuals
            who are committing their time and resources to create viable solutions to tackle the urgent needs of
            the community. For more details, please visit our website at
            <a href="https://opensourceventilator.ie/" target="_blank">https://opensourceventilator.ie/</a>.
        </p>

        <p>
            The Alpha Bravo Tango biker team are a voluntary group of motorcyclists from all over Ireland,
            covering every country. We have committed to moving whatever needs moving in order to help our front
            lines by bike, car or van.
        </p>

        <p>
            To see how this works, please drop by and visit our Facebook page <a href="https://www.facebook.com/bravocharlietango1/" target="_blank">here</a>. Check out this
            video that shows our process from door to door <a href="https://www.facebook.com/bravocharlietango1/videos/255701888784730/" target="_blank">here</a>!
        </p>

    </div>

</div>

@include('layout.footer')
