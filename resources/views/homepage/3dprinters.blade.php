@include('layout.header')

<div class="container">

    <h4 class="text-center">Put Your 3D Printer on the National Register</h4>

    <a href="{{url('/register')}}">
        <button id="call-to-action"  type="button" class="btn btn-primary">Register Here</button>
    </a>
    <p class="para">
        We are looking to build a strong network of industrial grade 3D printers across the nation. If you have access or know someone with access to a printer, please click the register button above and fill out the form.
    </p>
  
    <h6><b>
            Project Plan
    </h6></b>
    
    <p>
        The goal for this project is to connect manufacturers of essential medical supplies with Ireland’s health service and medical centres.  We have teamed up with manufacturing companies who are willing to lend us their expertise in the area as well as give us access to their 3D printers and clean rooms. By creating a centralised network of industrial grade printers, we can create a resource for the health service to request emergency medical supplies. 
    </p>
    <p>
       The printers may be used for printing personal protective equipment or other medical devices, depending on the printers available. There has been an incredible effort by engineers and designers to build 3D models for these products such as open source ventilators and protective face shields, and we want to create a resource that they can potentially use to bring the products to fruition.
       We have operations facilities available in the National Science Park in Mullingar. There is also space available in ISO 7 grade clean rooms for the assembly of necessary parts.
    </p>
    
    <p>
        Through this initiative, we are looking to utilise the large network of industrial 3D printers across Ireland so that our health service can contact and request printing as necessary.
    </p>
    
    <p>
        We also have a full volunteer workforce with manufacturing experience ready to help to carry out this project. If you are interested in volunteering your printer, please register at the link above. If you have any queries or wish to offer your expertise, please contact gavin@carboncapture.io
    </p>
    
    <div class="printer-images-container">
        <img src="{{url('/img/3Dventilator.jpg')}}" alt="3D ventilator image" class="responsive-img"/>
        <img src="{{url('/img/ppe.jpg')}}" alt="Protective equipment" class="responsive-img"/>
    </div>

    <h6><b>
        Plan Breakdown
    </h6></b>
    <p>
        Our plan has a number of important steps we have to accomplish to execute it. These steps are:
    </p>
    <div id="printer-steps">
        <h6><b>1. Build Network</h6></b>

        <p>
            This project is a large undertaking as we aim to establish an Irish 3D manufacturing plant to cater for the needs of our healthcare system. It is vital that we establish an efficient system to manufacture parts for the country and the best way to do this is a combined effort. The first step in this process is to get as many 3D printers in Ireland onto our database. We are attacking this problem in 2 ways. The two systems are going to be for printers that can be easily transported and for larger printers that can’t be moved.

        <h6><b>2. Contact HSE</h6></b>
        <p>
            It is important for this project that we cater for the needs of the HSE. Our intention is to assist the Irish health service in the best way we can. Therefore, we must create a contact point in the HSE who is continually updating us with their requirements. Our network will react to these demands and provide the necessary components in the fastest time.
        </p>

        <h6><b>3. Categorise printers </h6></b>
        <p>
            Following the initial sign ups, we are going to follow up with the relevant people to get a better understanding of each printer's capabilities. We will create a spreadsheet with all of the printers capabilities as well as their operators.
        </p>


        <h6><b>4. Use of printers</h6></b>
        <p>
            Through this initiative, we are looking to utilise the large network of  industrial 3D printers across Ireland. There will be orders sent out to the printers all over the country every day based on the requirements of the HSE. The parts will then be collected safely by our volunteers and then brought back to the factory for assembly.
        </p>


        <h6><b>5. Assembly</h6></b>
        <p>
            The parts will then be brought in for assessment and then assembly. Tables are ready in the grade 7 cleanrooms, where the parts will be put together. 
        </p>


        <h6><b>6. Sterilisation</h6></b>
        <p>
            Following assembly, the parts must then be sterilised. Again, we know companies that can help with this. However, we are not sure if this can be done in house. The parts will then be sterilized.
        </p>

        <h6><b>7. Packaging</h6></b>
        <p>
            The parts will need to be packaged up and shipped out to where they are needed most. Determining this may end up being a tough decision on a daily basis. This could be an issue soon enough which we should discuss sooner rather than later.
        </p>

        <h6><b>8. Transport</h6></b>
        <p>
            Transport is going to be important for us to get right. Our drivers must be fully gowned and masked to prevent the spread. An efficient transport system will be vital for bringing parts in and bringing finished products out. It must be so tight from the get go that no product is ever held up due to transport.
        </p>


        <h6><b>9. Workforce</h6></b>
        <p>
            We have a full volunteer workforce ready to help with manufacturing experience to help carry out this project.
        </p>

    </div>
</div>

@include('layout.footer')
