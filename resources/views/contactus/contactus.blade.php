@include('common.header')
    <section class="section map pt-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.593336209615!2d72.63721567531873!3d23.185037879060307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d247ac15088e183%3A0x34e5284bc9dbc494!2sVikartr%20Technologies!5e0!3m2!1sen!2sin!4v1711274914378!5m2!1sen!2sin" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section class="section contact-details">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box mb-5">
                        <div class="sec-title mb-45">
                            <span class="sub-text new-text white-color caption uppercase">Let's Talk</span>
                            <h4 class="title white-color mb-5">Speak With Expert Engineers.</h4>
                        </div>
                        <div class="address-box mb-4">
                            <div class="address-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Email:</span>
                                <a href="mailto:info@vikartrtechnologies.com">info@vikartrtechnologies.com</a>
                            </div>
                        </div>
                        <div class="address-box mb-4">
                            <div class="address-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Phone:</span>
                                <a href="tel:+9227000753">92270 00753</a>
                            </div>
                        </div>
                        <div class="address-box">
                            <div class="address-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Address:</span>
                                <div class="desc">E-823, Radhe Infinity, Raksha Shakti Cir, Urjanagar 1, Randesan, Gandhinagar, Gujarat 382421</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 px-5">
                    <!-- <h2>BOOK A CALL WITH US</h2> -->
                    <a href="#" data-toggle="modal" data-target="#contactModal" class="text-white"><h2>BOOK A CALL WITH US</h2></a>
                    <br><br>
                    <div class="btn-wrapper btn-fit align-left">
                        <a href="https://calendly.com/bhavik-vikartrtechnologies/30min" class="btn" target="_blank">Schedule a Meeting</a>
                        <div class="btn__shadow white"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@include('common.footer')


<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Book a Call</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your form for adding a new contact record -->
                <form id="addContactForm" action="{{ route('book_call_with_us') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <!-- Add more fields as needed -->
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitContactForm()">Submit</button>
            </div> -->
        </div>
    </div>
</div>
<script>
   
    function submitContactForm() {
        // Fetch form data
        var formData = new FormData(document.getElementById('addContactForm'));
        
        // Perform AJAX request to add contact record
        fetch('/book_call_with_us', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('Contact record added successfully!');
                $('#contactModal').modal('hide'); // Hide the modal on successful submission
            } else {
                alert('Error adding contact record. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error adding contact record. Please try again.');
        });
    }
</script>