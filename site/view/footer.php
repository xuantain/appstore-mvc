  <div id="footer">
    <ul class="footer-links">
      <!-- <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Clients</a></li>
      <li><a href="#">Contact Us</a></li> -->
    </ul>
  </div><!--end footer-->
</div> <!--end container-->
<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'/>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'/>
<script src='./public/js/jssor.slider.mini.js'/>
<!-- <script src='./public/js/bootstrap.min.js'/> -->
<!-- <script src='./public/js/jquery.js'/> -->
<!-- <script src='./public/js/bootstrap-datetimepicker.min.js'/> -->
<script>
  $(document).ready(function(){
    $('#carousel-generic').bxSlider({
      slideWidth: 200,
      minSlides: 2,
      maxSlides: 3,
      slideMargin: 10
    });
  });
</script>
</body>
</html>