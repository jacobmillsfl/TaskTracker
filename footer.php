<?php
/*
	includes footer, scroll-to-top button and logout modal
*/
?>
	<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
		<b><?php if(isset($_SESSION["FirstName"])) echo "Welcome, ". ucfirst($_SESSION["FirstName"]);  ?></b>
		
          <small>Copyright © TaskTracker 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="php/_Logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>