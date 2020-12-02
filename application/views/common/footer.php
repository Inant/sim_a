
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

  // pembayaran spp
  $('.hide').hide();

  $('#nisn').change(function () { 
      let url = $(this).data('url');
      let nisn = $(this).val();

      $.ajax({
        type: "get",
        url: url,
        data: {nisn:nisn},
        dataType: 'json',
        success: function (response) {
          $('#nama').val(response.nama_siswa);
          $('#beasiswa').val(response.beasiswa);
          $('#spp').val(response.id_spp);
          $('#nominal_spp').val(response.nominal);
        }
      });
  });

  var beasiswa = parseInt($('#beasiswa').val());
  var nominal_spp = parseInt($('#nominal_spp').val());
  $('.bulan').click(function (e) {
    let selectedMonth = $('input:checkbox:checked').length;
    let totalBeasiswa = selectedMonth * beasiswa;
    let total = selectedMonth * nominal_spp - totalBeasiswa;
    $('#total').val(total);
  });

  $('#bayar').keyup(function (e) { 
    let bayar = parseInt($(this).val());
    let total = parseInt($('#total').val());

    let kembalian = bayar - total;
    $('#kembalian').val(kembalian);
  });

  // pembayaran
  $('#form-spp').submit(function (e) {
    let total = parseInt($('#total').val());
    let bayar = parseInt($('#bayar').val());

    if (total <= 0) {
      alert('Total tidak boleh nol.')
      e.preventDefault();
    }
    else if (bayar < total) {
      alert('Jumlah bayar tidak boleh kurang dari total.')
      e.preventDefault();
    }
    else{
      $(e).unbind('submit');
    }
    
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
