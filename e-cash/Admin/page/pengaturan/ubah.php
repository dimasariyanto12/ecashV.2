<?php

  include "hak_akses.php";
   $id1 =base64_decode($_GET['id']);
    $id2 =base64_decode($id1);
    $id3 =base64_decode($id2);

    $result = $mysqli->getData("SELECT * FROM tbl_pembayaran where id_pembayaran='$id3'");
    foreach ($result as $r): 

      
?> 

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">                
                <form class="form-horizontal" action="?page=pengaturan&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $page; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            $en1 =base64_encode($id3);
                            $en2 =base64_encode($en1);
                            $en3 =base64_encode($en2);
                        ?>
                        <input type="hidden" class="form-control" name="id_pembayaran" required="" value="<?= $en3; ?>" />
                         <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" value="<?= $r['nama_pembayaran']?>" name="nama_pembayaran" placeholder="Masukkan Nama Pembayaran" required=""  />    
                            </div>
                        </div>
                       
                       
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jumlah Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nominal_pembayaran" placeholder="Masukan Nominal Pembayaran" required="" value="<?= $mysqli->format_ribuan($r['nominal_pembayaran']); ?>" onkeyup="convertToRupiah(this);" />    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jumlah Cicilan</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="jumlah_cicilan" placeholder="Masukan Jumlah Cicilan" required="" value="<?= ($r['jumlah_cicilan']); ?>" onkeyup="convertToRupiah(this);"/>    
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_kelas">
                                  
                                    <?php
                                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas where status='0' ORDER BY tingkat_kelas ASC");

                                        foreach ($query_kelas as $qk) {
                                    ?>
                                            <option value="<?= $qk['id_kelas']; ?>" <?php if($r['id_kelas']==$qk['id_kelas']) { echo "selected=''"; } ?>><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>    
                            </div>
                        </div>
                        
                       
                        </div>


                    
                    <div class="panel-footer">
                        <a href="?page=pengaturan" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary " name="update">Ubah</button><br><br>

                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>


    
    <!-- END PAGE CONTENT WRAPPER -->  
<script type="text/javascript">
    function convertToRupiah(objek) {
      separator = ".";
      a = objek.value;
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      objek.value = c;

    } 
</script>                                              
<?php
    endforeach;
?>          


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

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

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

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>