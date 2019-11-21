<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CPA</title>
        
        <?php echo $__env->yieldContent('view-css'); ?>

        <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('css/stylesheet.css')); ?>">
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </head>
    <body>
        <?php echo $__env->make('templates.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('templates.lateral-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->yieldContent('view-sub-header'); ?>

        <div id="container">
            <div id="content"> 

                <?php echo $__env->yieldContent('view-content'); ?>
            
            </div>
        </div> 

        <?php echo $__env->yieldContent('view-js'); ?>
    </body>
</html><?php /**PATH C:\Users\user\Documents\@Projetos\cpa\resources\views/templates/master.blade.php ENDPATH**/ ?>