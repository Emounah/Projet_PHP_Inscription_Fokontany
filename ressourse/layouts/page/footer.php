<footer class="bg-dark text-black">
        <div class="farany">
            <h1>FOKONTANY<span>.</span></h1>         
            <p>Copyright ©2024.Tous droit reservés</p>
            <a href="#"><i class="fas fa-arrow-up"></i></a>
        </div>
</footer>
    <script src="js/scroll.js"></script>
    <script src="js/main.js"></script>
    <script src="sass/bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>
    <script src="../sass/bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script>
        $('document').ready(function(){
            $('.owl-carousel').owlCarousel({
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                margin:10,
                responsiveClass:true,
                loop:true,
                smartSpeed:450,
                autoplay:true,
                autoplayTimeout:8000,
                autoplayHoverPause:true,
                nav:true,
                responsive:{
                    0:{
                        items:3,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:true
                    },
                    1000:{
                        items:3,
                        nav:true,
                        // loop:false
                    }
                },
                // stagePadding:30,

            });
        })
          
    </script>
    
    <script src="Public/aos/js/aos.js"></script>
        <script>
             AOS.init();
        </script>
</body>
</html>