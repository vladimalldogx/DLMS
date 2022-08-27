
<!-- Modal For Add Announcements -->
<div class="modal fade" id="modalForAddAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" action="query/addAnnouncement.php" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Announcennts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Announcement Title</label>
            <input type="" name="announname" id="course_name" class="form-control" placeholder="Input Title" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Choose Type</label>
            <select class="form-control" name="type">
            <option value="0" disabled>Select Option</option>
             <option value="External">External</option>
             <option value="Internal">Internal</option>
                                    
                                       
            </select>
          </div>
          <div class="form-group">
            <label>Message</label>
           <textarea class="form-control" name="message" placeholder="Write Message"></textarea>
          </div>
        </div>
        <input type="hidden" name="adminname" value="<?=$adminname?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>