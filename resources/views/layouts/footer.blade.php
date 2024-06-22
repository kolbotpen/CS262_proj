<footer class="position-relative footer">
    <div class="footer-grid-container">
        <div class="footer1 outfit">
            <h6>CONTACT US &bull; 💌</h6>
            <p style="margin-bottom: 0px;"><b class="bold">By email</b></p>
            <a href="mailto:cwattanak@paragoniu.edu.kh">Chansovisoth Wattanak</a><br>
            <a href="mailto:kpen@paragoniu.edu.kh">Kolbot Pen</a><br>
            <a href="mailto:ssovann1@paragoniu.edu.kh">Soponloe Sovann</a><br>
            <p style="margin-top:15px ;margin-bottom: 0px;"><b class="bold">Visit us at</b></p>
            <address>
                ParagonIU, Phnom Penh<br>
                Cambodia
            </address>
        </div>

        <div class="footer2">
            <h6>POWERED BY &bull; 🚀</h6>
            <p>&bull; HTML<br>&bull; CSS<br>&bull; PHP<br>&bull; JavaScript<br>&bull; MySQL<br>&bull; Laravel</p>
        </div>

        <div class="footer3">
            <div class="footer-logo-slogan">
                <img class="footer-logo floating" src="{{ asset('assets/images/logo2.svg') }}" alt="LOGO" draggable="false">
                <h6>FIND OUT WHAT WE'RE UP TO!</h6>
            </div>
            <ul class="social-icons">
                <li><a href="https://facebook.com" target="_blank"><img class="footer-icon" src="{{ asset('assets/images/social-facebook.png') }}" draggable="false"><span class="footer-icon-name bold-400">FACEBOOK</span></a></li>
                <li><a href="https://instagram.com" target="_blank"><img class="footer-icon" src="{{ asset('assets/images/social-instagram.png') }}" draggable="false"><span class="footer-icon-name bold-400">INSTAGRAM</span></a></li>
                <li><a href="https://twitter.com" target="_blank"><img class="footer-icon" src="{{ asset('assets/images/social-twitter.png') }}" draggable="false"><span class="footer-icon-name bold-400">TWITTER</span></a></li>
                <li><a href="https://linkedin.com" target="_blank"><img class="footer-icon" src="{{ asset('assets/images/social-linkedin.png') }}" draggable="false"><span class="footer-icon-name bold-400">LINKEDIN</span></a></li>
            </ul>            
        </div>
        
    </div>
    <div class="footer-copyright">
        <hr>
        <p>Copyright &copy; <span id="currentYear"></span> &bull; All Rights Reserved by OURDEN</p>
    </div>
</footer>

<script>
    // GET CURRENT YEAR
    document.addEventListener('DOMContentLoaded', function() {
        var currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    });
</script>
