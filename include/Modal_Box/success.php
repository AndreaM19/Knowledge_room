<!-- Success -->
        <div class="modal fade" id="successBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Item added with success</h3>
              </div>
              <div class="modal-body">
                <h4>Data inserts:</h4>
                <h5>Title: <?php echo $_POST['title']?></h5>
                <h5>Link: <?php echo $_POST['link']?></h5>
                <h5>Top category: <?php echo $_POST['topCategory']?></h5>
                <h5>Sub category: <?php echo $_POST['subCategory']?></h5>
                <h5>Comments:</h5>
                <p><?php echo $_POST['comment']?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>