  <div class="ui middle aligned center aligned grid">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
      <div class="twelve wide column">
      <table id="listTA" class="ui celled table">
        <thead>
          <tr>
            <th>NRP</th>
            <th>Judul Proposal Tugas Akhir</th>
            <th>Dosen Pembimbing 1</th>
            <th>Dosen Pembimbing 2</th>
            <th>RMK</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('#listTA').DataTable({
      "pageLength" : 5,
      "ajax": {
            url : "<?php echo base_url("mahasiswa/getListTA") ?>",
            type : 'POST'
        },
    });
} );
</script>

</html>
