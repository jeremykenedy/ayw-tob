<?php
// THIS WIDGET REQUIRES reset_pw.js TO BE LOADED ON THE PAGE ITS BEING USED ON 
$page = $red->page;
?>

<div class="modal fade" id="reset_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="reset_form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">reset.password</h4>
        </div>
        <div class="modal-body">
           <div class="container">
            <div class="row">
              <div class="col-md-12 col-xs-12">
                enter.your.email
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-xs-12">
                email
              </div>
              <div class="col-md-12 col-xs-12">
                <?php echo $page->formInput('email', 'email_reset', 'test', array('class' => 'required', 'data-req' => 'email', 'autocomplete' => 'off'));?>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
          <button id="reset_button" type="button" class="btn btn-primary">reset.password</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->