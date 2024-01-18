<div class="modal" id="edit-profile-modal" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
        <header class="modal-header quickview__header">
            <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
        </header>
        <form action="{{ route('user.ajax') }}" enctype="multipart/form-data" id="user-data-form">
            <input type="hidden" name="action" value="UPDATE_USER_DETAILS">
            <div class="register">
                <div class="account__login--header mb-25">
                    <h2 class="account__login--header__title h3 mb-10">Edit Profile</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Name
                            <input name="name" class="account__login--input" placeholder="Full Name" type="text"
                                value="{{ $user->name ?? 'User' }}">
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>
                            Email
                            <input name="email" class="account__login--input" placeholder="Email id" type="text"
                                value="{{ $user->email ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            Mobile
                            <input name="mobile" class="account__login--input" placeholder="Mobile Number" type="number" value="{{ $user->mobile ?? null }}" disabled>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            Date of Birth
                            <input name="birth_date" class="account__login--input"
                                type="text" placeholder="dd/mm/yyyy" value="{{ $user->birth_date ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            Time of Birth
                            <input name="birth_time" class="account__login--input"
                                type="text" placeholder="hour:minute AM/PM" value="{{ $user->birth_time ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-8">
                        <label>
                            Place of Birth
                            <input name="birth_place" class="account__login--input" placeholder="City, State, Country"
                                type="text" value="{{ $user->birth_place ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            Gender
                            <select name="gender" class="account__login--input">
                                <option value="">Select</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : null }}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : null }}>Female
                                </option>
                                <option value="female" {{ $user->gender == 'other' ? 'selected' : null }}>Other
                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            City
                            <input name="city" class="account__login--input" placeholder="Your City Name"
                                type="text" value="{{ $user->city ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            State
                            <input name="state" class="account__login--input" placeholder="Your State Name"
                                type="text" value="{{ $user->state ?? null }}">
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label>
                            Pincode
                            <input name="pincode" class="account__login--input" placeholder="Enter Pincode"
                                type="number" value="{{ $user->pincode ?? null }}">
                        </label>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" id="user-data-btn" class="btn my-1" type="submit" style="max-width:150px;">
                        Update
                        {!! Hpx::spinner() !!}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#user-data-form').submit(function(e) {
            e.preventDefault();
            var x = new Ajx;
            x.form = '#user-data-form';
            x.ajxLoader('#user-data-btn .loaderx');
            x.disableBtn('#user-data-btn');
            x.globalAlert(true);
            x.start(function(response){
                if(response.status == true){
                    $('#user__name').text($('#user-data-form [name="name"]').val());
                }
            });
        });
    });
</script>
