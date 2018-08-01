<?php 



 ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Models </title>
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
            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="css/responsive.dataTables.min.css">
            <link rel="stylesheet" href="css/buttons.dataTables.min.css">
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
                                <h3 class="panel-title">View Models</h3>       
                            </div>
                            <table class="table" id="models_table">
                                <thead>
                                    <tr class="filters">
                                        <th style="text-align:center;">Sr No.</th>
                                        <th style="text-align:center;">Manufacturer Name</th>
                                        <th style="text-align:center;">Model Name</th>
                                        <th style="text-align:center;">View</th>   
                                        <th style="text-align:center;">Sell</th>                 
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php 
                                        $db = new Database();
                                        $conn = $db->dbConnection();  
                                        $sql = "SELECT a.id,a.name as model_name,b.name as man_name FROM models a inner join manufacturer b on a.manufacturer_id = b.id where a.flag = 1";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $count = $stmt->rowCount();
                                        $i =0;
                                        if($count > 0)
                                        {
                                            while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                            {
                                                $i++;
                                    ?>
                                             <tr>
                                                <td style="text-align:center;"><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $row['man_name']; ?></td>
                                                <td class="text-center"><?php echo $row['model_name']; ?></td>
                                                <td style="text-align:center;">
                                                    <a href="javscript:void(0);" class="btn btn-default view_model" id="<?php echo $row['id']; ?>">View</a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a href="javscript:void(0);" class="btn btn-default sell_model" id="<?php echo $row['id']; ?>">Sell</a>
                                                </td>
                                            </tr>
                                    <?php   
                                            }
                                        }
                                        else 
                                        {
                                    ?>
                                        <tr>
                                            <td colspan="4">There are no models yet.</td>
                                        </tr>
                                     <?php   
                                        }
                                     ?>
                
                </tbody>
            </table>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Model Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fa fa-user prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="m_model_color">Model color</label>
                            <input type="text" id="m_model_color" class="form-control">
                        </div>
                        <div class="md-form mb-5">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="m_model_year">Model year</label>
                            <input type="text" id="m_model_year" class="form-control">
                            
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="m_reg_no">Registeration no.</label>
                            <input type="text" id="m_reg_no" class="form-control">
                            
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="m_note">Note.</label>
                            <input type="text" id="m_note" class="form-control">
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script>

$(document).ready(function(){

 
        $('.view_model').on('click', function(){
            var model_id = $(this).attr('id');
            if(model_id != '')
            {            
                $.ajax({
                    url: 'updateData/getmodeldata.php',
                    type: 'post',
                    data: {id:model_id},
                    datatype: 'JSON',
                    success:function(responseText){
                        var obj = JSON.parse(responseText);
                        /*alert(obj[0].model_year);*/
                        $('#m_model_color').val(obj[0].model_color);
                        $('#m_model_year').val(obj[0].model_year);
                        $('#m_reg_no').val(obj[0].reg_num);
                        $('#m_note').val(obj[0].note);
                        $('#modalRegisterForm').modal('show');
                    }
                });        
            }



        });
        
        $('.sell_model').on('click', function(){
            var model_id = $(this).attr('id');      
        
            $.ajax({
                url: 'updateData/del-model.php',
                type: 'post', 
                data: {id:model_id},
                success:function(responseText){
                    if(responseText == 1){
                      window.location.reload();
                    }else{
                      alert(responseText);
                    }
                }
            });        
        });


        $('#models_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv'
        ]
    } );

});
</script>
</body>
</html>
