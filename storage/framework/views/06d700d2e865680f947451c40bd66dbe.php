<?php $__env->startSection('main'); ?>
    <div class="container col-md-4 mt-3">
        <h1 class="mb-3">Edit Category</h1>
        <form method="POST" action="/update_category/<?php echo e($category->id); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="mb-3">
                <label for="category" class="form-label">Category : </label>
                <input type="text" class="form-control" name="categories" value="<?php echo e($category->categories); ?>">
            </div>
            <div class="mb-3">
                <label for="profile" class="form-label">Profile : </label>
                <input type="file" class="form-control" name="profile[]" multiple>
                <?php
                    $image = explode(',', $category->profile);
                ?>
                <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('assets/category/' . $img)); ?>" alt="image" srcset="" height="70px"
                        width="70px" class="m-2 p-1" style="border: 0.5px solid black">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/category/update.blade.php ENDPATH**/ ?>