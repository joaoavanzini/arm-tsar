<html>
  <head>
    <title>Controlar braço robótico</title>
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/icon-arm.ico"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <style>
      .slider{
        -webkit-appearance: none;
        width:100%;
        height:25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
      }

      .slider:hover{
        opacity: 1;
      }

      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
      }

      .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
      }
    </style>
  </head>
  <body>

  <?php 

    if ($modal == '1'){
        ?>  <script type="text/javascript">
        $(function(){
            $('#myModal').modal('show');
        });
      </script><?php
    }
?>



  <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Movimento executado</h4>
        </div>
        <div class="modal-body">
          <p>Seu movimento foi executado com sucesso!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


    <?php echo form_open(); echo validation_errors(); ?>
    
<br>
    <p>Mover eixo attack: <input type="text" id="display1" value="0" readonly></p>
    <input type="range" min="1" max="180" value="90" class="slider" id="myRange" name="attack" oninput="display1.value=value" onchange="display1.value=value"><br>
    
    <p>Mover eixo elevator: <input type="text" id="display2" value="0" readonly></p>
    <input type="range" min="1" max="180" value="90" class="slider" id="myRange" name="elevator" oninput="display2.value=value" onchange="display2.value=value"><br>
    
    <p>Mover eixo body: <input type="text" id="display3" value="0" readonly></p>
    <input type="range" min="1" max="180" value="90" class="slider" id="myRange" name="body" oninput="display3.value=value" onchange="display3.value=value"><br>

    <p>Garra: 
    <select name="claw">
      <option value="">selecione</option>
      <option value="open">Aberto</option>
      <option value="close">Fechado</option>
    </select>
    
    <br><br><input type="submit" value="Enviar"> </p>
    
    <?php echo form_close();?>
  </body>
</html>