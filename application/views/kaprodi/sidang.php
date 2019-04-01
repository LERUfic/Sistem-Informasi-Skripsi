<div class="ui middle aligned center aligned grid">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row">
    <div class="five wide column">
      <form class="ui large form" method="POST" action="<?php echo base_url('kaprodi/sidang') ?>">
        <h4 class="ui dividing header">Submit Sidang TA</h4>
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="book icon"></i>
              <input type="text" name="nrp" placeholder="NRP Mahasiswa">
            </div>
          </div>
          <div class="field">
            <div class="ui calendar" id="kalender_mulai">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" name="d_mulai" placeholder="Waktu Mulai Seminar">
              </div>
            </div>
          </div>
          <div class="field">
            <div class="ui calendar" id="kalender_selesai">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" name="d_selesai" placeholder="Waktu Selesai Seminar">
              </div>
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
<script>
  $(document).ready(function() {
    // $('#kalender_mulai').calendar();
    $('#kalender_mulai').calendar({
      ampm: false,
      monthFirst: false,
      formatter: {
        date: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          return year + '/' + month + '/' + day;
        }
      }
    });
    $('#kalender_selesai').calendar({
      ampm: false,
      monthFirst: false,
      formatter: {
        date: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          return year + '/' + month + '/' + day;
        }
      }
    });
    // $('#kalender_selesai').calendar();
  });
</script>

</html>
