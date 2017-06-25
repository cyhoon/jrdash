<div class="row">

    <div class="span6">

        <form id="register_form" class="form-horizontal" method="post" action="<?=site_url('user/register')?>">

            <div class="control-group">
                <label class="control-label">Login</label>
                <div class="controls">
                    <input type="text" name="login" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <input type="text" name="email" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input type="password" name="password" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Confirm Password</label>
                <div class="controls">
                    <input type="password" name="confirm_password" class="input-xlarge" />
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Register" class="btn btn-primary" />
                </div>
            </div>


        </form>

        <a href="<?=site_url('/')?>"">Back</a>

    </div>

</div>

<script type="text/javascript">
    $(function(){
        $("#register_form").submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            // 적합한 구조로 바꾸는게 serialize , unserialize 로 복호화한다.
            var postData = $(this).serialize();

            $.post(url, postData, function(o){
                if (o.result == 1){
                    window.location.href ='<?=site_url('dashboard');?>';
                }else{

                    alert('Invalid Login');
                }
            },'json')
        });
    });
</script>