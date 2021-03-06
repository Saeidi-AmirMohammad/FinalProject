<footer class="main-footer">
    <strong>CopyLeft &copy; 2021 <a href="https://github.com/Saeidi-AmirMohammad">امير محمد سعيدی</a>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src ="../../Public/HomeAssist/dist/js/jquery.js"></script>
<script src="../../Public/HomeAssist/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../Public/HomeAssist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../../Public/HomeAssist/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../../Public/HomeAssist/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../Public/HomeAssist/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../Public/HomeAssist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../Public/HomeAssist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../Public/HomeAssist/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../Public/HomeAssist/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../Public/HomeAssist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../Public/HomeAssist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../Public/HomeAssist/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../Public/HomeAssist/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../Public/HomeAssist/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../Public/HomeAssist/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../Public/HomeAssist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../Public/HomeAssist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../Public/HomeAssist/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../Public/HomeAssist/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../Public/HomeAssist/dist/js/adminlte.min.js.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../Public/HomeAssist/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../Public/HomeAssist/dist/js/demo.js"></script>

<script src="jquery-3.3.1.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>>
<!--persianCalendar-->
<script src="../../Public/HomeAssist/dist/js/persian-date.min.js"></script>
<script src="../../Public/HomeAssist/dist/js/persian-datepicker.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()



        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()


        $('.normal-example').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });




    })
</script>

</body>
</html>