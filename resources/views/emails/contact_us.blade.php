@extends('layouts.master_home_page')
@section('title')
    Kontakt
@endsection
@section('current_page')
    Kontakt
@endsection
@section('contents')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top: -70px">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-map"></i>
                        <h3>Unsere Adresse</h3>
                        <p>{{$information->address}}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope"></i>
                        <h3>E-Mail</h3>
                        <p>{{$information->email}}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-telephone"></i>
                        <h3>Rufen Sie uns an</h3>
                        <p>{{$information->phone_number}}</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">

                <div class="col-lg-6 ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2433.7085351725113!2d13.255717276185756!3d52.41195844422363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a85bc0d0208985%3A0xefe11c00f29e5214!2sHocksteinweg%2016%2C%2014165%20Berlin!5e0!3m2!1sen!2sde!4v1731623570314!5m2!1sen!2sde"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form id="contact-form" action="{{ route('send_email') }}" method="post" role="form"
                          class="php-email-form">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                       required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefonnummer"
                                   required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Ihr Nachricht"
                                      required></textarea>
                        </div>
                        <div class="my-3">
                            <div id="error-message" style="color: red"></div>
                            <div id="success-message" style="color: var(--color-primary); font-weight: bolder"></div>
                        </div>
                        <button type="submit" id="submit-btn">Senden</button>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

    @section('JS')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#contact-form').on('submit', function (event) {
                    event.preventDefault(); // Prevent page reload

                    // Hide success and error messages initially
                    $('#success-message').hide();
                    $('#error-message').hide();

                    // Disable the button after form submission
                    $('#submit-btn').prop('disabled', true); // Disable the button to prevent multiple submissions

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function (response) {
                            // Check if the response contains success and show success message if available
                            if (response.success) {
                                $('#success-message').text(response.success).fadeIn();

                                // Hide the success message after 5 seconds
                                setTimeout(function () {
                                    $('#success-message').fadeOut();
                                }, 4000);

                                // Clear the form fields after successful submission
                                $('#contact-form')[0].reset();

                                // Hide the submit button after the submission
                                $('#submit-btn').hide();

                                // Re-enable and show the submit button after 5 seconds
                                setTimeout(function () {
                                    $('#submit-btn').show(); // Show the button again
                                    $('#submit-btn').prop('disabled', false); // Re-enable the button
                                }, 5000);
                            } else {
                                // Show error message if no success response
                                $('#error-message').text('Beim Senden der Nachricht ist ein Fehler aufgetreten.').fadeIn();
                            }
                        },
                        error: function (xhr) {
                            // Show error message if there's an issue with the request
                            $('#error-message').text('Beim Senden der Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.').fadeIn();

                            // Re-enable the button if there's an error
                            $('#submit-btn').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
    @endsection

@endsection
