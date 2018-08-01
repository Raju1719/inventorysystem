<?php 



 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Manufacturer </title>
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
                 <?php include('sidebar.php'); ?>
            </div>
            <div class="col-md-9 admin-content " id="addproduct">
              <div class=" well">
                <div class="row">
                        <div class="panel panel-primary filterable filterable-panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Manufacturer</h3>       
                            </div>
                            <form id="myform" onsubmit="return false;" enctype="multipart/form-data" method="post" action="">
                                <h1></h1>
                                
                                <div class="form-group">
                                    <div class="clearfix">
                                        <div class="col-sm-12">
                                            <input type="text" name="manufacturer_name" id="manufacturer_name" class="myinput" placeholder="Enter manufacturer name">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="clearfix ">
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <!-- <div class="upload">
                                                <label for="file-upload" class="custom-file-upload ket-r">
                                                    Upload
                                                </label>
                                                <input id="file-upload" type="file" name="image_upload"  />              
                                            </div> -->
                                            <div class="submit">
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
            var manufacturer_name = $('#manufacturer_name').val();         

                            
            if(manufacturer_name === '')
            {
                smoke.alert('Please enter Manufacturer Name'); 
                $('#manufacturer_name').focus();
                return false;
            }
            else
            {            
                $("#myform").ajaxSubmit({
                    url: 'updateData/save-m.php',
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
