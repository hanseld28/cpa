<?php $__env->startSection('view-css'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('view-sub-header'); ?>
    <?php echo $__env->make('templates.sub-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('view-content'); ?>
    <?php echo $__env->make('templates.control-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(session('success')): ?>
      <div id="alert-success" class="alert alert-success" role="alert">
        <?php echo e(session('success')['messages']); ?> 
      </div>
    <?php endif; ?>
    
    <table id="table-forms" class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Título</td>
                <td>Descrição</td>
                <td>Data de início</td>
                <td>Data final</td>
                <td>user_type_id</td> 
                <td>Opções</td>
            </tr>    
        </thead>

        <tbody> 
            <?php $__currentLoopData = $evaluationForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($form->id); ?></td>
              <td><?php echo e($form->title); ?></td>
              <td><?php echo e($form->description); ?></td>
              <td><?php echo e($form->formatted_begin_date); ?></td>
              <td><?php echo e($form->formatted_end_date); ?></td>
              <td><?php echo e($form->user_type_id); ?></td>
              <td>
                <a href="<?php echo e(route('form.show', $form->id)); ?>">Visualizar</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('view-js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\@Projetos\cpa\resources\views/user/commission-dashboard.blade.php ENDPATH**/ ?>