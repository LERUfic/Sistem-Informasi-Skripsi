  <div class="ui middle aligned center aligned grid">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
      <div class="fourteen wide column">
      <table id="listTA" class="ui celled table">
        <thead>
          <tr>
            <th>NRP</th>
            <th>Judul Proposal Tugas Akhir</th>
            <th>Dosen Pembimbing 1</th>
            <th>Dosen Pembimbing 2</th>
            <th>RMK</th>
            <th>Button</th>
          </tr>
        </thead>
      </table>
      </div>
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
  </div>
  <div class="ui basic modal">
    <div class="ui icon header">
      <i class="archive icon"></i>
      Konfirmasi Perubahan Status.
    </div>
    <div class="content">
      <p id="pesan"></p>
    </div>
    <div class="actions">
      <div class="ui blue basic cancel inverted button">
        <i class="remove icon"></i>
        Tidak.
      </div>
      <div id="rejectButton" data-value="" class="ui red basic cancel inverted button">
        <i class="remove icon"></i>
        Tolak Proposal.
      </div>
      <div id="ubahButton" data-value="" class="ui green ok inverted button">
        <i class="checkmark icon"></i>
        Ya, Ubah Status!
      </div>
    </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    var table = $('#listTA').DataTable({
      "pageLength" : 5,
      "ajax": {
            url : "<?php echo base_url("dosen/getListTA") ?>",
            type : 'POST'
        },
      "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>Konfirmasi</button>"
        },
        {
            "targets": 1,
            "data": null,
            "render": function(data,type,row){
              return "<a href='<?php echo base_url('uploads') ?>/"+data[6]+"' target='_blank'>"+data[1]+"</a>";
            }
        } ]
    });

    $('#listTA tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#pesan').html("Status saat ini adalah<h3 style='color:red'>"+data[5]+"</h3>");
        $('#ubahButton').attr("data-value",data[0]);
        $('#rejectButton').attr("data-value",data[0]);
        $('.ui.basic.modal').modal('show');
    });

    $('#ubahButton').click(function(){
      $.ajax({
        url: "<?php echo base_url("dosen/ubahStatusTA") ?>",
        method: "POST",
        data: {nrp: $(this).attr('data-value')}
      }).done(function(){
        setTimeout(function(){
           location.reload();
      }, 2000); 
      });
    });

    $('#rejectButton').click(function(){
      $.ajax({
        url: "<?php echo base_url("dosen/rejectStatusTA") ?>",
        method: "POST",
        data: {nrp: $(this).attr('data-value')}
      }).done(function(){
        setTimeout(function(){
           location.reload();
      }, 2000); 
      });
    });
} );
</script>

</html>
