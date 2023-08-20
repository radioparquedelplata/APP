<script src="<?=siteUrl?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?=siteUrl?>assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?=siteUrl?>assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=siteUrl?>assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=siteUrl?>assets/js/page/datatables.js"></script>
  <script src="<?=siteUrl?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=siteUrl?>assets/js/custom.js"></script>
  <script src="<?=siteUrl?>assets/js/script.js"></script>
  <script src="<?=siteUrl?>assets/js/notify.js"></script>
  <script type="text/javascript" src="<?=siteUrl?>assets/js/jquery.validate.js"></script>
  <script src="<?=siteUrl;?>assets/sweetalert/lib/sweet-alert.min.js"></script>
   <script src="<?=siteUrl;?>assets/js/dropify.js"></script>
    <script>
        $(document).ready(function(){
            // Basic

            $('.dropify-image').dropify({
                messages: {
                    default : '<center><h6>Drag and drop an image here or click</h6></center>',
                    error   : 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': '<center>The file size is too big broo ({{ value }} max).</center>',
                    'minWidth': '<center>The image width is too small ({{ value }}}px min).</center>',
                    'maxWidth': '<center>The image width is too big ({{ value }}}px max).</center>',
                    'minHeight': '<center>The image height is too small ({{ value }}}px min).</center>',
                    'maxHeight': '<center>The image height is too big ({{ value }}px max).</center>',
                    'imageFormat': '<center>The image format is not allowed ({{ value }} only).</center>',
                    'fileExtension': '<center>The file is not allowed ({{ value }} only).</center>'
                },
            });
        });
    </script>
   <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy;<?=date('Y');?> <div class="bullet"></div> Design By <a href="http://ekamsoftwares.com/">Ekam Softwares</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
</body>
</html>