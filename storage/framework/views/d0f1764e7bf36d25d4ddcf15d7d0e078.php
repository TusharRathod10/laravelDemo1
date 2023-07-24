<?php $__env->startSection('main'); ?>
    <div class="container mt-3">
        <h1 class="mb-3 display-3">Category</h1>
        <?php if(session()->has('success')): ?>
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="alert alert-success my-2 px-5 py-2 position-absolute">
                    <?php echo e(session()->get('success')); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(session('delete')): ?>
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="alert alert-danger my-2 px-5 py-2 position-absolute">
                    <?php echo e(session('delete')); ?>

                </div>
            </div>
        <?php endif; ?>
        <a href="/add_category" class="btn btn-outline-success mb-3 mt-5 float-end">Add Category</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">C.Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($cat->id); ?></th>
                        <td><?php echo e($cat->categories); ?></td>
                        <td>
                            <?php
                                $image = explode(',', $cat->profile);
                            ?>
                            <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('assets/category/' . $img)); ?>" alt="image" srcset="" height="70px"
                                    width="70px">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><a href="/edit_category/<?php echo e($cat->id); ?>" class="btn btn-sm btn-primary">Edit</a></td>
                        <td>
                            <form action="/remove_category/<?php echo e($cat->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="float-end mt-2"> <?php echo e($category->onEachSide(0)->links()); ?></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/category/categories.blade.php ENDPATH**/ ?>