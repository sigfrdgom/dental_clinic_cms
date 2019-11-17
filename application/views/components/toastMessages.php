<div id="div-message">
    <?php if (!empty($this->session->flashdata('message'))) { ?>
        <script>
            window.addEventListener('DOMContentLoaded', listener);

            function listener() {
                $.toast({
                    heading: `<?= $this->session->flashdata('title') ?>`,
                    text: `<?= $this->session->flashdata('message') ?>`,
                    showHideTransition: 'fade',
                    allowToastClose: true,
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    bgColor: '#46e1b6',
                    textColor: '#ffffff',
                });
            }
        </script>
    <?php } else if (!empty($this->session->flashdata('error'))) { ?>
        <script>
            window.addEventListener('DOMContentLoaded', listener);

            function listener() {
                $.toast({
                    heading: `<?= $this->session->flashdata('title') ?>`,
                    text: `<?= $this->session->flashdata('error') ?>`,
                    showHideTransition: 'fade',
                    allowToastClose: true,
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 6,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    bgColor: '#ef5350',
                    textColor: '#ffffff',
                });
            }
        </script>
    <?php }
    ?>
</div>