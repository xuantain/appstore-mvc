  <div id="footer">
    <ul class="footer-links">
      <!-- <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Clients</a></li>
      <li><a href="#">Contact Us</a></li> -->
    </ul>
  </div><!--end footer-->
</div> <!--end container-->
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <script src='./public/js/jquery.bxslider.min.js'></script>
  <!-- <script src='./public/js/bootstrap.min.js'></script> -->
  <!-- <script src='./public/js/jquery.js'></script> -->
  <script>
    $(document).ready(function(){
      $('.slide').bxSlider({
        auto: true,
        autoControls: true
      });
    });
    $('#btnCancel').click(function(e) {
      e.preventDefault();
      $('#addApp form input').val('');
    });
  </script>
</body>
</html>