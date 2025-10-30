<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>AGROVET</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">Jhon Correa</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="<?= $_ENV['HOST'] ?>assets/js/jquery.min.js"></script>
<!-- plugins JS Files -->
<script src="<?= $_ENV['HOST'] ?>assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/chart.js/chart.umd.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/echarts/echarts.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/quill/quill.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/simple-datatables/simple-datatables.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/plugins/php-email-form/validate.js"></script>

<script src="<?= $_ENV['HOST'] ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= $_ENV['HOST'] ?>assets/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Template Main JS File -->
<script src="<?= $_ENV['HOST'] ?>assets/js/main.js"></script>

<script>
    HOST = '<?= $_ENV["HOST"] ?>';

    $('.modal').on('hidden.bs.modal', function() {

        $(".needs-validation").trigger("reset");
        $(".needs-validation").attr('class', "row g-3 needs-validation"); //timeout allows for 'was-validated' to be added then removed       

        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=hidden]")
            .val('')
            .end();

    })

    $(document).keydown(function(event) {
        if (event.keyCode == 27) {
            $('.modal').hide();
        }
    });

    function showMessage(msg, type) {
        $.toast({
            heading: 'AGROVET',
            text: msg,
            position: 'top-center',
            stack: false,
            icon: type
        })
    }

    $(document).ajaxStart(function() {
        // Mostrar el overlay cuando comience una solicitud AJAX
        $('#overlay').fadeIn();
    }).ajaxStop(function() {
        // Ocultar el overlay cuando todas las solicitudes AJAX hayan terminado
        $('#overlay').fadeOut();
    });
</script>