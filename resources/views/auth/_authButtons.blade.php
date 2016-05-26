@if($signInUp=='Login')
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" style="margin-bottom: 1px;" class="btn btn-primary">{{$signInUp}}</button> OR
        <a class="btn btn-primary " href="/auth/register" role="button">New User Sign Up</a>
        <div class="authButton">
            <a  class="btn btn-info " id="googleLogin" href="/auth/google" role="button"> <span style="vertical-align:top;margin-left:28px">Continue with Google</span></a>
            <a  class="btn btn-info " id="socialLogin" href="/auth/facebook" role="button"><i class="fa fa-facebook-square fa-2x"></i> <span style="vertical-align:top;">Continue with Facebook</span></a>
            <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Password?</a>
        </div>
    </div>
</div>
    @elseif($signInUp=='Register')
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" style="margin-bottom: 1px;" class="btn btn-primary">Register</button> OR
            <a  class="btn btn-info " id="googleLogin" href="/auth/google" role="button"> <span style="vertical-align:top;margin-left:28px">Continue with Google</span></a>
            <div class="authButton">
                <a  class="btn btn-info " id="socialLogin" href="/auth/facebook" role="button"><i class="fa fa-facebook-square fa-2x"></i> <span style="vertical-align:top;">Continue with Facebook</span></a>
                <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Password?</a>
            </div>
        </div>
    </div>
    @endif
