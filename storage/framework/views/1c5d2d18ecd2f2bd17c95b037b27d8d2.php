<?php if($paginator->hasPages()): ?>
    <ul class="pagination pagination">
        <?php if($paginator->onFirstPage()): ?>
            <li class="disabled"><span>«</span></li>
        <?php else: ?>
            <li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">«</a></li>
        <?php endif; ?>
        <?php if($paginator->currentPage() > 3): ?>
            <li class="hidden-xs"><a href="<?php echo e($paginator->url(1)); ?>">1</a></li>
        <?php endif; ?>
        <?php if($paginator->currentPage() > 4): ?>
            <li><span>...</span></li>
        <?php endif; ?>
        <?php $__currentLoopData = range(1, $paginator->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2): ?>
                <?php if($i == $paginator->currentPage()): ?>
                    <li class="active"><span><?php echo e($i); ?></span></li>
                <?php else: ?>
                    <li><a href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a></li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($paginator->currentPage() < $paginator->lastPage() - 3): ?>
            <li><span>...</span></li>
        <?php endif; ?>
        <?php if($paginator->currentPage() < $paginator->lastPage() - 2): ?>
            <li class="hidden-xs"><a href="<?php echo e($paginator->url($paginator->lastPage())); ?>"><?php echo e($paginator->lastPage()); ?></a></li>
        <?php endif; ?>
        <?php if($paginator->hasMorePages()): ?>
            <li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">»</a></li>
        <?php else: ?>
            <li class="disabled"><span>»</span></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\laravelDemo\resources\views/pagination/custom.blade.php ENDPATH**/ ?>