<form id="upload_form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputFile">Añadir un archivo</label>
    <input type="file" name="file1" id="file1">
    
    <input type="hidden" id="id_producto" value="<?php echo $_POST["id_producto"]; ?>">
    
    <p class="help-block">Solo se admiten archivos zip de 1GB como máximo</p>
  </div>
 
  <input type="button" value="Subir archivo Zip" onClick="uploadFile('1')">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>