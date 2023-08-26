<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 m-2">
                    <li class="nav-item">
                        <img src="{{ asset('images/logo4.png') }}" alt="Logo" width="150" height="100">
                    </li>
                    {{-- <h4 class="footer-heading text-dark">Drip4stickers</h4> --}}
                    <div class="footer-underline text-dark"></div>
                    <p class="text-dark">
                        online platform where you can browse and select stickers for your laptop, phone,
                        and other devices. You have the option to choose the products you like </p>
                </div>

                <div class="col-md-3 mt-4">
                    <h4 class="footer-heading text-dark">Shop Now</h4>
                    <div class="footer-underline text-dark"></div>
                    <div class="mb-2 text-dark"><a href="{{ url('/collections') }}" class="text-dark">Collections</a>
                    </div>
                    <div class="mb-2 text-dark"><a href="{{ url('/customcategories') }}" class="text-dark">custom
                            categories</a></div>
                </div>
                <div class="col-md-3 mt-4">
                    <h4 class="footer-heading text-dark">Reach Us</h4>
                    <div class="footer-underline"></div>

                    <div class="mb-2">
                        <a href="" class="text-dark">
                            <i class="fa fa-phone"></i> 0770495169
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-dark">
                            <i class="fa fa-envelope"></i> islamratiyat@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<script src="script.js"></script>
<script>
    (function($) { // Begin jQuery
        $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
                $('nav ul').slideToggle();
            });
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        }); // end DOM ready
    })(jQuery); // end jQuery
</script>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="../../js/jquery.min.js"></script>
{{-- <script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script> --}}
<script src="js/main.js"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery.exzoom.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@yield('script')



@livewireScripts
@stack('script')
