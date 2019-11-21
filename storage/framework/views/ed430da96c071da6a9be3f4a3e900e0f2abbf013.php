<?php $__env->startSection('view-css'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('view-sub-header'); ?>
    <?php echo $__env->make('templates.sub-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('view-content'); ?>
    <?php echo $__env->make('templates.control-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('view-js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\@Projetos\cpa\resources\views/user/commission-dashboard.blade.php ENDPATH**/ ?>