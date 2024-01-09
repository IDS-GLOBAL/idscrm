<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        
        
        
            <p>Welcome to IDS CRM Sign In Portal</p>
            <div class="m-t" id="dealerlogin">
                <div id="e_login_msg" class="form-group">
                    <input type="email" name="e_login" class="form-control" id="e_login" placeholder="Email" required="">
                </div>
                <div id="p_login_msg" class="form-group">
                    <input type="password" name="p_login" class="form-control" id="p_login" placeholder="Password" required="">
					<span id="error_msg" class="form-text m-b-none"></span>
                </div>
                <button type="button" id="go_signin" class="btn btn-primary block full-width m-b">Login</button>

                <a id="forgot_password"><small>Forgot Your Password???</small></a>
                <p class="text-muted text-center"><small><br />Don't have an account?</small><br /></p>
                <a id="register_here" class="btn btn-sm btn-danger btn-block page-scroll" href="#getademo"  data-dismiss="modal">REGISTER HERE</a>
                <input id="attmptd" type="hidden"  value="" />
                <div id="sign_results">
                
                </div>
            </div>
        
        
        
        
      </div>
      <div class="modal-footer">
      <a id="full_screen_button" class="btn btn-sm pull-left">Go To Full Screen!</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->