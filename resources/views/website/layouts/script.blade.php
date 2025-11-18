<script>
        document.querySelectorAll('.click-scroll').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

</script>
<!-- JAVASCRIPT FILES -->
<script src="{{asset('website/js/jquery.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/jquery.sticky.js')}}"></script>
<script src="{{asset('website/js/click-scroll.js')}}"></script>
<script src="{{asset('website/js/counter.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>




<!-- jQuery + Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Smooth Scroll Script (بدون أخطاء) -->
