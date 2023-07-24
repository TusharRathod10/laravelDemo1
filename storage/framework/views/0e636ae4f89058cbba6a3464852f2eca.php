<?php $__env->startSection('main'); ?>
    <div class="container col-md-4 mt-3">
        <h1 class="mb-3">New AjaxForm</h1>
        <a href="/get_data" class="btn btn-outline-success mb-3 float-end">Show Data</a>
        <p id="msg" style="color:dodgerblue; font-weight: 500; position:absolute;"></p>
        <form id="form-data" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group mt-5">
                <label for="name" class="form-label">Name: </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>

            <div class="form-group mt-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>

            <div class="form-group mt-3">
                <label for="password" class="form-label">Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>

            <div class="form-group mt-3">
                <label for="confirm_password" class="form-label">Confirm password: </label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Enter Confirm-Password" required>
            </div>

            
            <div class="my-3">
                <label for="profile" class="form-label">Profile : </label>
                <input type="file" class="form-control" name="profile[]" multiple required>
            </div>

            <button type="submit" class="btn btn-primary" value="submit" id="submitBtn">Submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-data").submit(function(event) {
                event.preventDefault();

                var form = $("#form-data")[0];
                var data = new FormData(form);

                $("#submitBtn").prop("disabled", true);

                $.ajax({
                    type: "post",
                    url: "<?php echo e(route('create')); ?>",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#msg").text(data.res);
                        $("#submitBtn").prop("disabled", false);
                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='password']").val('');
                        $("input[type='file']").val('');
                        $('#form-data')[0].reset();
                    },
                    error: function(e) {
                        $("#msg").text(e.responseText);
                        $("#submitBtn").prop("disabled", false);
                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='password']").val('');
                        $("input[type='file']").val('');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var hideError = function() {
                $("#msg").hide();
            };

            $("#form-data").submit(function() {
                setTimeout(hideError, 3000);
                $('#msg').show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/ajax/ajax-form.blade.php ENDPATH**/ ?>