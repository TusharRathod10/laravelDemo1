<?php $__env->startSection('main'); ?>
<div class="container col-md-4 mt-3">
    <h1 class="mb-3">Ajax Update Form</h1>
    <a href="/get_data" class="btn btn-outline-success mb-3 float-end">Show Data</a>
    <p id="msg" style="color:dodgerblue; font-weight: 500; position:absolute;"></p>
    <form id="update-data" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group mt-5">
            <input type="hidden" name="id" value="<?php echo e($editdata[0]->id); ?>">
            <label for="name" class="form-label">Name: </label>
            <input type="text" name="name" value="<?php echo e($editdata[0]->name); ?>" class="form-control"
                placeholder="Enter Name" required>
        </div>

        <div class="form-group mt-3">
            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" value="<?php echo e($editdata[0]->email); ?>" class="form-control"
                placeholder="Enter Email" required>
        </div>

        <div class="form-group mt-3">
            <label for="password" class="form-label">Password: </label>
            <input type="password" name="password" value="<?php echo e($editdata[0]->password); ?>" class="form-control"
                placeholder="Enter Password" required>
        </div>

        <div class="my-3">
            <label for="profile" class="form-label">Profile : </label>
            <input type="file" class="form-control" name="profile[]" multiple>
            <?php
            $image = explode(',', $editdata[0]->profile);
            ?>
            <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e(asset('assets/ajax/' . $img)); ?>" alt="image" srcset="" height="70px" width="70px"
                class="m-2 p-1" style="border: 0.5px solid black">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button type="submit" class="btn btn-primary" value="update">Update</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
            $("#update-data").submit(function(event) {
                event.preventDefault();

                var form = $("#update-data")[0];
                var data = new FormData(form);

                $.ajax({
                    type: "post",
                    url: "<?php echo e(route('updatedata')); ?>",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#msg").text(data.res);
                    },
                });
            });
        });
</script>
<script>
    $(document).ready(function() {
            var hideError = function() {
                $("#msg").hide();
                window.open("/get_data", "_self");
            };

            $("#update-data").submit(function() {
                setTimeout(hideError, 3000);
                $('#msg').show();
            });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/ajax/ajax-edit.blade.php ENDPATH**/ ?>