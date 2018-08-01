<?php 



 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Model </title>
    <?php include('head.php'); ?>
    <style type="text/css">
        input {
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="container-fluid">
            <?php include('header.php'); ?>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                 <?php 
                    include('sidebar.php');
                    include('updateData/config.php');
                  ?>
            </div>
            <div class="col-md-9 admin-content " id="addproduct">
              <div class=" well">
                <div class="row">
                        <div class="panel panel-primary filterable filterable-panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Model</h3>       
                            </div>
                            <form id="myform" onsubmit="return false;" enctype="multipart/form-data" method="post" action="">
                                <h1></h1>
                                
                                <div class="form-group">
                                        <div class="col-sm-6 form-group">
                                            <input type="text" name="model_name" id="model_name" class="myinput" placeholder="Enter model name">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <?php 
                                                $db = new Database();
                                                $conn = $db->dbConnection();  
                                                $sql = "SELECT id, name FROM manufacturer WHERE flag = 1";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $count = $stmt->rowCount();
                                            ?>
                                            <select class="form-group" name="manufacturer_id" id="manufacturer_id">
                                                    <option value="0">select maufacturer</option>
                                                <?php 
                                                    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                                    {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <input type="text" name="model_color" id="model_color" class="myinput" placeholder="Enter model color">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" name="model_year" id="model_year" class="myinput" placeholder="Enter model year">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" name="reg_num" id="reg_num" class="myinput" placeholder="Enter registeration number">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" name="note" id="note" class="myinput" placeholder="Enter note">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="file-upload" class="custom-file-upload ket-r">
                                                Model image 1
                                            </label>
                                            <input id="image_upload1" type="file" name="image_upload1"  />
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="file-upload" class="custom-file-upload ket-r">
                                                Model image 2
                                            </label>
                                            <input id="image_upload2" type="file" name="image_upload2"  />
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <!-- <div class="upload">
                                                <label for="file-upload" class="custom-file-upload ket-r">
                                                    Upload
                                                </label>
                                                <input id="file-upload" type="file" name="image_upload"  />              
                                            </div> -->
                                            <div class="submit form-group">
                                                <input type="submit" id="submit" value="SUBMIT" class=" ket-r">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
      
<script>

$(document).ready(function(){

 
        $('#submit').on('click', function(){
            var model_name = $('#model_name').val();
            var manufacturer_id = $('#manufacturer_id').val();
            var model_color = $('#model_color').val();
            var model_year = $('#model_year').val();
            var reg_num = $('#reg_num').val();
            var note = $('#note').val();
            var image_upload1 = $('#image_upload1').val();
            var image_upload2 = $('#image_upload2').val();

            if(model_name === '')
            {
                smoke.alert('Please enter Model Name'); 
                $('#model_name').focus();
                return false;
            }
            else if(manufacturer_id == '0')
            {
                smoke.alert('Please select Mmanufacturer'); 
                $('#manufacturer_id').focus();
                return false;
            }
            else if(model_color === '')
            {
                smoke.alert('Please enter Model Color'); 
                $('#model_color').focus();
                return false;
            }
            else if(model_year === '')
            {
                smoke.alert('Please enter Model Year'); 
                $('#model_year').focus();
                return false;
            }
            else if(reg_num === '')
            {
                smoke.alert('Please enter Registeration no.'); 
                $('#reg_num').focus();
                return false;
            }
            else if(note === '')
            {
                smoke.alert('Please enter Note'); 
                $('#note').focus();
                return false;
            }
            else if(image_upload1 === '')
            {
                smoke.alert('Please upload image 1'); 
                $('#image_upload1').focus();
                return false;
            }
            else if(image_upload2 === '')
            {
                smoke.alert('Please upload image 2'); 
                $('#image_upload2').focus();
                return false;
            }
            else
            {            
                $("#myform").ajaxSubmit({
                    url: 'updateData/save-model.php',
                    type: 'post', 
                    success:function(responseText){
                        if(responseText == 1){
                          smoke.alert("Manufacturer added successfully!!!");
                          $('#manufacturer_name').val('');
                        }else{
                          alert(responseText);
                        }
                    }
                });        
            }



        });
  
});
</script>
</body>
</html>
