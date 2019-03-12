<div class="ui middle aligned center aligned grid">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row">
    <form class="ui large form" enctype="multipart/form-data" method="POST" action="<?php echo base_url('mahasiswa/ajukan') ?>">
      <h4 class="ui dividing header">Submit Judul TA</h4>
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="judul" placeholder="Judul">
          </div>
        </div>
        <div class="field">
          <div id="rmkx" class="ui fluid search selection dropdown">
            <input id="rmk" type="hidden" name="rmk">
            <i class="dropdown icon"></i>
            <div class="default text">RMK</div>
            <div class="menu">
              <div class="item" data-value="1">RPL</div>
              <div class="item" data-value="2">NCC</div>
              <div class="item" data-value="3">KCV</div>
              <div class="item" data-value="4">AJK</div>
              <div class="item" data-value="5">IGS</div>
              <div class="item" data-value="6">ALPRO</div>
              <div class="item" data-value="7">MI</div>
              <div class="item" data-value="8">DTK</div>
            </div>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="dosbing1" placeholder="Dosen Pembimbing 1">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="dosbing2" placeholder="Dosen Pembimbing 2">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="envelope icon"></i>
            <input name="draftTA" type="file" id="file">
          </div>
        </div>
        <input type="submit" class="ui fluid large teal submit button" value="Ajukan">
      </div>
    </form>
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
    $('#rmkx').dropdown();
  });
  </script>

</html>
