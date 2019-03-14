<div class="ui middle aligned center aligned grid">
  <div class="row">
    <div class="eight wide column">
      <div class="ui top attached block header">Data Proposal Tugas Akhir</div>
      <div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Judul Tugas Akhir</h4></div>
            <div class="ten wide column">
              <i><?php echo $proposal[0]['judul']; ?></i>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Dosen Pembimbing 1</h4></div>
            <div class="ten wide column">
              <?php echo $proposal[0]['dosbing1_nama']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Dosen Pembimbing 2</h4></div>
            <div class="ten wide column">
              <?php echo $proposal[0]['dosbing2_nama']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>RMK</h4></div>
            <div class="ten wide column">
              <?php echo $proposal[0]['lrmk']; ?>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <div class="ui grid">
            <div class="six wide column"><h4>Draft TA</h4></div>
            <div class="ten wide column">
              <a class= "ui teal basic button" href="<?php echo base_url('uploads/'.$proposal[0]['path']); ?>" target="_blank">Proposal Tugas Akhir</a>
            </div>
          </div>
        </div>
        <div class="ui attached segment">
          <a class="ui green label"><?php echo $proposal[0]['textstat']; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script>
</script>

</html>
