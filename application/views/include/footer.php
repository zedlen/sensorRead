        <footer class="main-footer">
            <div class="container">
              <div class="pull-right">
                <b>Version</b> 0.1
              </div>
              <strong>Created by: Luis,Alejandro,Osvaldo</strong> 
            </div>
            <!-- /.container -->
          </footer>
        <script src="<?php echo base_url(); ?>/assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/build/js/custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/js/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/js/Chart.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/vendors/select2/dist/js/select2.full.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url();?>/assets/js/canvasjs.min.js"></script>
        <!--Spinet-->
        <script src="<?php echo base_url();?>/assets/vendors/spinet/spinet.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/sweetalert/dist/sweetalert.min.js"></script>
        <!--Chart-->

        <script src="<?php echo base_url();?>assets/vendors/moment/moment.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/moment/min/locales.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.bundle.js"></script>

        <script type="text/javascript">
        function exportToCsv(filename, rows) {
          var processRow = function (row) {
            var finalVal = '';
            for (var j = 0; j < row.length; j++) {
              var innerValue = row[j] === null ? '' : row[j].toString();
              if (row[j] instanceof Date) {
                innerValue = row[j].toLocaleString();
              };
              var result = innerValue.replace(/"/g, '""');
              if (result.search(/("|,|\n)/g) >= 0)
                result = '"' + result + '"';
              if (j > 0)
                finalVal += ',';
              finalVal += result;
            }
            return finalVal + '\n';
          };

          var csvFile = '';
          for (var i = 0; i < rows.length; i++) {
            csvFile += processRow(rows[i]);
          }

          var blob = new Blob([csvFile], { type: 'text/csv;charset=utf-8;' });
          if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(blob, filename);
          } else {
            var link = document.createElement("a");
            if (link.download !== undefined) { // feature detection
              // Browsers that support HTML5 download attribute
              var url = URL.createObjectURL(blob);
              link.setAttribute("href", url);
              link.setAttribute("download", filename);
              link.style.visibility = 'hidden';
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
            }
          }
        }
        $("#export_data_canvas").click(function() {
          var data=[],
              headers=["Fecha y hora"];
          console.log(config.data.datasets.length)
          for (var i = 0; i < config.data.datasets.length; i++) {  
            headers.push(config.data.datasets[i].label)  
          }
          data.push(headers)
          var max_lenght=0;
          for (var i = 0; i < config.data.datasets.length; i++) {
            if (config.data.datasets[i].data.length>max_lenght) {
              max_lenght=config.data.datasets[i].data.length
            }
          }
          for (var i = 0; i < max_lenght; i++) {
            var aux=[]
            for (var j = 0; j < config.data.datasets.length; j++) {
              if (j==0) {
                aux.push(config.data.datasets[j].data[i].x);
              }   
              aux.push(config.data.datasets[j].data[i].y)
             
            }
            data.push(aux)
          }
          //console.log(data)
          exportToCsv("exportData.csv",data)
        })
        var base_url='<?php echo base_url();?>'
        var config = {
          type: 'line',
          data: {
            datasets: [{
              label:"Dato",
              data:[],
              borderColor:"#d4131b",
              backgroundColor:'rgba(255,255,255,0)',
              pointRadius:0
            }]
          },
          options: {
            elements:{
              points:{
                radius:0
              }
            },
            responsive: true,
            animation:false,
            title:{
              display:false,
              text:"data"
            },
            scales: {
              xAxes: [{
                type: "time",
                display: false,
                scaleLabel: {
                  display: false,
                  labelString: 'Date'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'value'
                }
              }]
            }            
          }
        };
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
        if(typeof(w) == "undefined"||w==null){
          w = new Worker("assets/js/workers/worker_data_import.js");
           w.postMessage({'url':base_url});  
           w.onmessage = function(event,thiss) {
            var data=event.data;
            console.log(parseInt(data))
            var time= moment().format('MM/DD/YYYY HH:mm:ss');
            config.data.datasets[0].data.push({
              x: time,
              y: parseInt(data)
            });                
            window.myLine.update();                  
            //w.terminate()
          };          
        }
    </script>
            </body>
</html>
