<div class="ui middle aligned center aligned grid">
  <div class="row">
    <div class="eight wide column">
      <div class="ui top attached block header">Data Proposal Tugas Akhir</div>
      <div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Judul Tugas Akhir</h4></div>
            <div class="ten wide column">
              <i><?php echo $seminar[0]['tema']; ?></i>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Dosen Pembimbing 1</h4></div>
            <div class="ten wide column">
              <?php echo $seminar[0]['d_mulai']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Dosen Pembimbing 2</h4></div>
            <div class="ten wide column">
              <?php echo $seminar[0]['d_selesai']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>RMK</h4></div>
            <div class="ten wide column">
              <?php echo $seminar[0]['tempat']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <a class="ui green label"><?php echo $seminar[0]['textstat']; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script>
</script>

</html>
