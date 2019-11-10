    <!-- End of page container -->
    </div>

    <!-- Start of minimalist footer -->
    <footer class="footer text-center">
        © CLIDESA CMS
    </footer>
    <!-- End of minimalist footer -->

    
    <!-- JS import's -->
    <script src="<?= base_url('assets/jquery/jquery-3.4.1.min.js')?>"></script>
	<script src="<?= base_url('assets/popper/popper.min.js')?>"></script>

    <script src="<?= base_url('assets/css/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    
    
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/js/custom.min.js')?>"></script>
    <!-- Chart JS -->
    <script src="<?= base_url('assets/js/dashboard1.js')?>"></script>
    
    <!-- Own JS files -->
    
    <script src="<?= base_url('assets/plugins/dropify/js/dropify.min.js') ?>"></script>
    <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
    
    
</body>

</html>
