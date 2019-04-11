        </div>
    </div>
    <!-- footer content -->
    <footer>
        <div class="pull-left">
            <a href="http://s/epp/index.php">&copy; 2019 | E - Placement Portal | All Rights Reserved.</a>
        </div>
        <div class="pull-right">
            <p class="pull-left">&nbsp;&nbsp;Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/plugins/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/plugins/nprogress/nprogress.js'); ?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?= base_url('assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets/plugins/moment/min/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?= base_url('assets/plugins/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery.hotkeys/jquery.hotkeys.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/google-code-prettify/src/prettify.js'); ?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?= base_url('assets/plugins/jquery.tagsinput/src/jquery.tagsinput.js'); ?>"></script>
    <!-- Switchery -->
    <script src="<?= base_url('assets/plugins/switchery/dist/switchery.min.js'); ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
    <!-- Parsley -->
    <script src="<?= base_url('assets/plugins/parsleyjs/dist/parsley.min.js'); ?>"></script>
    <!-- Autosize -->
    <script src="<?= base_url('assets/plugins/autosize/dist/autosize.min.js'); ?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?= base_url('assets/plugins/devbridge-autocomplete/dist/jquery.autocomplete.min.js'); ?>"></script>
    <!-- starrr -->
    <script src="<?= base_url('assets/plugins/starrr/dist/starrr.js'); ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('assets/js/datatables.min.js'); ?>"></script>


    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#MyTable').DataTable( {
                "paging"    : true,
                "ordering"  : true,
                "info"      : true,
                // select: {
                //     style: 'multi'
                // }
            } );
            /*begin export buttons*/
            codeListTable = $("#MyTable").DataTable();
            new $.fn.dataTable.Buttons( codeListTable, {
                buttons: [
                {
                    extend:    'colvis',
                    text:      '<i class="fa fa-print"></i> show collumns',
                    titleAttr: 'Print',
                    className: 'btn btn-default btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, 
                {
                    extend:    'copy',
                    text:      '<i class="fa fa-files-o"></i> Copy',
                    titleAttr: 'Copy',
                    className: 'btn btn-default btn-sm'
                },
                {
                    extend:    'csv',
                    text:      '<i class="fa fa-files-o"></i> CSV',
                    titleAttr: 'CSV',
                    className: 'btn btn-default btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend:    'excel',
                    text:      '<i class="fa fa-files-o"></i> Excel',
                    titleAttr: 'Excel',
                    className: 'btn btn-default btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend:    'pdf',
                    text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                    titleAttr: 'PDF',
                    className: 'btn btn-default btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                },               
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i> Print',
                    titleAttr: 'Print',
                    className: 'btn btn-default btn-sm',
                    exportOptions: {
                        columns: ':visible'
                    }
                },                 
                ]
            } );
            codeListTable.buttons().container().appendTo('#exportBtn');
        } ); 

        /* for file upload Image */
        $(document).ready(function() {
            $('.file-upload').file_upload();
        });

    </script>
</body>
</html>