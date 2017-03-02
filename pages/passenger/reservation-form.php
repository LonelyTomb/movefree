<div class="reservationForm row form-overview">
    <div class="col s10 l6">
        <div class="card">
            <div class="card-content">
                <form>
                    <div class="row">
                        <div class="input-field row">
                            <i class="material-icons prefix field-icon hide-on-small-only">place</i>
                            <input type="text" placeholder="Current location" class="validate place">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field row">
                            <i class="material-icons prefix field-icon hide-on-small-only">pin_drop</i>
                            <input type="text" placeholder="Destination" class="validate destination">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field row">
                            <i class="prefix field-icon material-icons hide-on-small-only">&#8358;</i>
                            <input type="text" placeholder="Amount" class="validate price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field row">
                            <select class="payType">
                        <option value="" selected disabled>Choose Select Payment type</option>
                        <option value="card">Card</option>
                        <option value="payondelivery">Pay on Delivery</option>
                    </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field row">
                            <input type="text" placeholder="(HH:MM) Pick Time" class="validate time col s8 m7">
                            <select name="time_suffix" id="" class="time_suffix col s4 m3 l3">
                            <option value=""selected disabled></option>
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                    </select>
                        </div>
                    </div>
                    <div class="row center">
                        <a href="#" class="btn waves-effect waves-ripple red center-align reservebutton submitButton">Make Reservation</a>
                    </div>
                    <div class="progress hide">
                        <div class="indeterminate"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
