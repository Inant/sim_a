
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
© 2018 Eliteadmin by themedesigner.in
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>assets/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>assets/dist/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
  $('#myTable').DataTable();
  $(document).ready(function() {
    var table = $('#example').DataTable({
      "columnDefs": [{
        "visible": false,
        "targets": 2
      }],
      "order": [
        [2, 'asc']
      ],
      "displayLength": 25,
      "drawCallback": function(settings) {
        var api = this.api();
        var rows = api.rows({
          page: 'current'
        }).nodes();
        var last = null;
        api.column(2, {
          page: 'current'
        }).data().each(function(group, i) {
          if (last !== group) {
            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
            last = group;
          }
        });
      }
    });
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function() {
      var currentOrder = table.order()[0];
      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        table.order([2, 'desc']).draw();
      } else {
        table.order([2, 'asc']).draw();
      }
    });
  });
});
$('#example23').DataTable({
  dom: 'Bfrtip',
  buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
  ]
});
</script>
<script>
function doconfirm()
{
    job=confirm("Yakin Menghapus Data?");
    if(job!=true)
    {
        return false;
    }
}
</script>
</body>

</html>
