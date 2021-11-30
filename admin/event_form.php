
<?php require_once('includes/config.php');  // CONECTION GOES HERE
if(isset($_POST['rowid'])){ 
     $query= mysqli_query($con,"SELECT * FROM `usertbl` WHERE 1");
   
    
    ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <form class="user" method="POST">
    <div class="form-group">
        <div class="col-sm-6">
        <label for="" class="control-label">Participants</label>
        <input type="hidden" name="event_id" value="<?php echo $row['rowid'];?>">
        <select name="users[]" class="js-example-basic-multiple form-control" multiple="multiple" style="width:100%;">
            <option value="">-- Select users--</option>
        <?php
            while ($row = mysqli_fetch_array($query)) {
                
        ?>
       
           <option value="<?php echo $row['uid'];?>"><?php echo $row['Firstname'];?> - <?php echo $row['Lastname'];?></option>
        </div>
        <?php
            }
        
        ?>
    </div>
    <br><br>
            <hr>
    <input class="btn btn-primary" type="submit" value="Save Event" name="addbtnev">
</form>

<?php

}
?>
<script>
 $('.select2').select2({
  //theme: 'form-control',
   dropdownParent: $('#AddParticipantModal')
     
 });
    </script>
<script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>