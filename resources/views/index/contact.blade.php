<section id="feature" class="mx-auto w-100 mt-5 bg-light">

    <div class="d-flex justify-content-center mt-5">
        <div class="row card-lg-ac col-12 col-sm-12">
            <div class="col-md-4 col-sm-10 mb-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active show" id="list-home-list" data-toggle="tab"
                       href="#list-home" role="tab" aria-controls="list-home" aria-selected="true">Home</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab"
                       href="#list-profile" role="tab" aria-controls="list-profile" aria-selected="false">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="tab"
                       href="#list-messages" role="tab" aria-controls="list-messages" aria-selected="false">Messages</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="tab"
                       href="#list-settings" role="tab" aria-controls="list-settings" aria-selected="false">Settings</a>
                </div>
            </div>
            <div class="col-md-8 col-sm-10">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="list-home" role="tabpanel"  aria-labelledby="list-home-list">
                        <div class="row col-md-12 justify-content-center">
                            <div class="col-md-4">
                                <img class="img-responsive" src="https://picsum.photos/150/120" alt="Card image cap">
                            </div>
                            <p class="col-md-7">Velit aute mollit ipsum ad dolor consectetur nulla officia culpa adipisicing exercitation
                                fugiat tempor. Voluptate deserunt sit sunt nisi aliqua fugiat proident ea ut. Mollit
                                voluptate reprehenderit occaecat nisi ad non minim tempor sunt voluptate consectetur
                                exercitation id ut nulla. Ea et fugiat aliquip nostrud sunt incididunt consectetur culpa
                                aliquip eiusmod dolor. Anim ad Lorem aliqua in cupidatat nisi enim eu nostrud do aliquip
                                veniam minim.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <p>Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do
                            cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id
                            ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore
                            do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum
                            reprehenderit irure non commodo enim culpa commodo veniam incididunt veniam ad.</p>
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <p>Ut ut do pariatur aliquip aliqua aliquip exercitation do nostrud commodo reprehenderit aute
                            ipsum voluptate. Irure Lorem et laboris nostrud amet cupidatat cupidatat anim do ut velit
                            mollit consequat enim tempor. Consectetur est minim nostrud nostrud consectetur irure labore
                            voluptate irure. Ipsum id Lorem sit sint voluptate est pariatur eu ad cupidatat et deserunt
                            culpa sit eiusmod deserunt. Consectetur et fugiat anim do eiusmod aliquip nulla laborum elit
                            adipisicing pariatur cillum.</p>
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit
                            nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum
                            occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit
                            dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi
                            amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod
                            eu pariatur culpa mollit in irure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!--/#feature-->

<section id="feature" class="mx-auto w-100 mt-5 bg-light">
    <div class="d-flex justify-content-center">
        <h3>Indique uma ong</h3>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="row card-lg-ac">

            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                               value="Mark" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">State</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </div>
    </div>
</section>
@section('script')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

@endsection
