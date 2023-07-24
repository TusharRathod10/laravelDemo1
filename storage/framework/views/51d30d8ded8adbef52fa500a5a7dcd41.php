<?php $__env->startSection('main'); ?>
    <div class="container col-md-4 mt-3">
        <h1 class="mb-3">New Category</h1>
        <form method="POST" action="/store_category" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="category" class="form-label">Category : </label>
                <input type="text" class="form-control" name="categories" placeholder="Enter New Category">
            </div>
            <?php if($errors->has('categories')): ?>
                <p class="text-danger"><?php echo e($errors->first('categories')); ?></p>
            <?php endif; ?>
            <div class="mb-3">
                <label for="profile" class="form-label">Profile : </label>
                <input type="file" class="form-control" name="profile[]" multiple>
            </div>
            <?php if($errors->has('profile')): ?>
                <p class="text-danger"><?php echo e($errors->first('profile')); ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/category/create.blade.php ENDPATH**/ ?>