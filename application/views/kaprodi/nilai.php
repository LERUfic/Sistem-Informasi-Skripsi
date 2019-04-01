<div class="ui middle aligned center aligned grid">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row">
    <div class="five wide column">
      <form class="ui large form" method="POST" action="<?php echo base_url('kaprodi/nilai') ?>">
        <h4 class="ui dividing header">Submit Sidang TA</h4>
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="nrp" placeholder="NRP Mahasiswa">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="book icon"></i>
              <input type="text" name="nilai" placeholder="Nilai Mahasiswa">
            </div>
          </div>  
          <input type="submit" class="ui fluid large teal submit button" value="Ajukan">
        </div>
      </form>
    </div>
  </div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
</div>

</body>

</html>
