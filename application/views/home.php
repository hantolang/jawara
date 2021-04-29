<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_pegawai; ?></h3>

        <p>Interaksi Whatsapp</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('Pegawai') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_posisi; ?></h3>

        <p>Potensi PU</p>
      </div>
      <div class="icon">
        <i class="ion ion-home"></i>
      </div>
      <a href="<?php echo base_url('Posisi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_kota; ?></h3>

        <p>Potensi BPU</p>
      </div>
      <div class="icon">
        <i class="ion ion-man"></i>
      </div>
      <a href="<?php echo base_url('Kota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $jml_kota; ?></h3>

        <p>Jumlah Keluhan Peserta</p>
      </div>
      <div class="icon">
        <i class="ion ion-help"></i>
      </div>
      <a href="<?php echo base_url('Kota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!--komplain-->
<div class="box box-danger direct-chat direct-chat-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Keluhan Terbaru</h3>
    <div class="box-tools pull-right">
      <span data-toggle="tooltip" title="3 New Messages" class="badge bg-red">3</span>
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <!-- In box-tools add this button if you intend to use the contacts pane -->
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
      <!-- Message. Default to the left -->
      <div class="direct-chat-msg">
        <div class="direct-chat-info clearfix">
          <span class="direct-chat-name pull-left">6286725505850@co.us | Joko Anwar | L00-Semarang Pemuda</span>
          <span class="direct-chat-timestamp pull-right">22 Jan 2:05 pm</span>
        </div>
        <!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="assets/dist/img/complaint-3.png" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          Kemarin saat saya mengajukan klaim, dilayani dengan tidak ramah, tidak ada alur yang jelas dari pertama masuk hingga di panggil, saya harus tanya2 kepada petugas yang sedang sibuk sendiri bermain gadget. Mohon untuk di permudah proses nya dan di tegur pada yang bersangkutan.
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->

      <!-- Message to the right -->
      <div class="direct-chat-msg right">
        <div class="direct-chat-info clearfix">
          <span class="direct-chat-name pull-right">628782344345@co.us | Paundra Putra </span>
          <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
        </div>
        <!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="assets/dist/img/light-bulb-15-128.png" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          Ah yang bener, kalo komplain mohon di pastikan , karena semua sudah terstandar dengan baik di kantor kami. Terima kasih.
        </div>
      </div>
    </div>
  </div>

 <div class="box-footer">
    <div class="input-group">
      *Komplain yang di tampilkan telah selesai di tindaklanjuti oleh petugas
    </div>
  </div>
</div>

<!--Bar chart-->
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Grafik <small>Cabang Komplain Terbanyak</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-posisi" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Grafik <small>Cabang dengan Potensi PU/BPU Masuk Terbanyak</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-kota" style="height:250px"></canvas>
      </div>
    </div>
  </div> 
</div>

<!--Pie chart-->
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Jenis Komplain</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-posisi" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Tipe Keyword</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-kota" style="height:250px"></canvas>
      </div>
    </div>
  </div> 
</div>



<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>
  //data posisi
  var pieChartCanvas = $("#data-posisi").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_posisi; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);

  //data kota
  var pieChartCanvas = $("#data-kota").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_kota; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
</script>