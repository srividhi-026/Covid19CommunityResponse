@include('layout.header')

<div class="container">

    <h4 class="text-center">Donate Your PPE on the National Register</h4>

    <a href="{{url('/register', ['page' => 'ppe'])}}">
        <button id="call-to-action" type="button" class="btn btn-primary">Register Here</button>
    </a>
    <p class="para">
        During this crisis, we need our community to help one another as much as possible. If you have products or raw materials which can be used to protect our front-line staff and care workers, we will do our utmost to deliver them to those that need them.
    </p>
    <p>
        Here are some of the materials we need.  We will update this regularly.
    </p>
    <div class="list-of-ppe-items">
        <h6><b>
                Products:
        </h6></b>
        <ul>
            <li><b>Personal Protective Equipment (PPE)</b>: Gloves, face-masks, face shields, bio-hazard suits and more</li>
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
        <p>
            Please ensure these products are in good working order and in good condition. Boxes of disposable materials (e.g. gloves) should be unopened. We will not be able to return goods to owners. Donators notified by email in how to pass these materials to our drivers in a safe and hygienic manner. Those receiving these materials must acknowledge the risks associated.
        </p>
    </div>

</div>

@include('layout.footer')
