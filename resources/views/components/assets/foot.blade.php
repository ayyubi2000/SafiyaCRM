<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<livewire:scripts>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
<!-- Page specific script -->

<script>



  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<livewire:customer-modal />
<script>
 Livewire.on('showSweetAlert', (isType , Text) => {
        
   if (isType == 'success') {
      toastr.success(Text);
    }   
   if (isType == 'info') {
      toastr.info(Text);
    }   
   if (isType == 'warning') {
      toastr.warning(Text);
    }   
   if (isType == 'danger') {
      toastr.error(Text);
    }

});

   
</script>

    
    <!-- Script -->
    <script type='text/javascript'>
    
        function openModal(masterId) {
            livewire.emit('showCustomerModal', masterId);
        }


        $(document).ready(function() {
            // Initialize
            $("#autocomplete_product").autocomplete({

                source: function(request, response) {

                    return $.post("{{ route('autocomplete') }}", {
                        query: request.term,
                        "_token": "{{ csrf_token() }}",
                    }, function(data) {
                        response(data);
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#autocomplete_product').val(ui.item.id +' '+ ui.item.label); // display the selected text
                    $('#countryId').text(ui.item.id); // save selected id to input
                    return false;
                },
                // focus: function(event, ui) {
                //     $("#autocomplete_country").val(ui.item.label);
                //     $("#countryId").text(ui.item.value);
                //     return false;
                // },
            });
        });
    </script>

</body>
</html>