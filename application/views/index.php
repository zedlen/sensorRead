<?php $this->load->view("include/header");
      $this->load->view("include/second_header");
	         ?>
              <div class="content-wrapper">
                <div class="clearfix"></div>          
                <section class="content">
                  <div class="clearfix"></div>
                 
                  <!--<div class="row"><div class="col-md-10 col-sm-10 col-xs-10" id="chartContainer" style="height: 300px; width:100%;"></div>-->
                  <div style="width:100%;">
                    <canvas id="canvas"></canvas>
                  </div>
                  
                </section>
              </div>
            </div>
            <div class="clearfix"></div>
            <button type="button" class="btn btn-primary" id="export_data_canvas">Exportar</button>
            <?php
      $this->load->view("include/footer"); 
             ?>
      