
<?php require_once('../../../config/config.php');  // CONECTION GOES HERE
if(isset($_POST['rowid'])){ ?>

    <form class="user" method="POST">
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="" class="control-label">Participants</label>
        <input type="hidden" name="event_id" value="<?php echo $row['rowid'];?>">
       <select name="users[]" class="select2">
           <option value="">-- Select users--</option>
           <option value="1">User 1 from the loop </option>
           <option value="2">User 2 from the loop</option>
           <option value="3">User 3 from the loop</option>
        </div>
        
    </div>

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
