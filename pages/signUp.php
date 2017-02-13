<div class="card-panel signup hide" id="signUp">
    <form>
        <div class="row">
            <div class="input-field row">
                <i class="small field-icon material-icons prefix">account_circle</i>
                <input type="text" name="fullname" class="validate fullname" placeholder="Fullname" id="fullname">
            </div>
        </div>
        <div class="row">
            <div class="input-field row">
                <i class="small field-icon material-icons prefix">email</i>
                <input type="email" placeholder="Email" name="email" class="validate email">
                <label for="email" data-error="wrong" data-success="right"></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field row">
                <i class="small field-icon material-icons prefix">phone</i>
                <input type="text" placeholder="Phone" name="phone" class="validate phone">
            </div>
        </div>
        <div class="row">
            <div class="input-field row">
                <i class="small field-icon material-icons prefix">place</i>
                <input type="text" placeholder="Address" name="address" class="validate address">
            </div>
        </div>
        <div class="row">
            <div class="input-field row">
                <select name="" id="" class="user">
                                            <option value="" selected disabled>Select User type</option>
                                            <option value="passenger">Passenger</option>
                                            <option value="driver">Driver</option>
                                        </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field row">
                <!--<i class="small field-icon material-icons prefix">place</i>-->
                <input type="password" placeholder="Password" name="password" class="validate password">
            </div>
        </div>
        <div class="row center">
            <a href="sign_Up" name="sign_Up" class="btn waves-effect waves-ripple red center-align submitButton signUpButton">Sign Up</a>
        </div>
        <div class="progress upprogress hide">
            <div class="indeterminate"></div>
        </div>

    </form>
</div>