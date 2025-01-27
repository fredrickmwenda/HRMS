<!-- <footer class="main-footer">
    <div class="container-fluid">
        <p>&copy; <?php echo e($general_settings->site_title ?? "no title"); ?> || <?php echo e(__('Developed by')); ?>

            <a href=<?php echo e($general_settings->footer_link); ?> class="external"><?php echo e($general_settings->footer); ?></a> || Version - <?php echo e(env('VERSION')); ?>

    </div>
</footer> -->
  

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> ©  <?php echo e($general_settings->site_title ?? "no title"); ?>.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by <a href=<?php echo e($general_settings->footer_link); ?> class="external text-decoration-underline"><?php echo e($general_settings->footer); ?></a> || Version - <?php echo e(env('VERSION')); ?>

                    <!-- <a href="#!" class="text-decoration-underline">Themesbrand</a> -->
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /home/basamiy/Documents/Projects/HRMs/peoplepro-1265/peopleprohrm/resources/views/layout/main_partials/footer.blade.php ENDPATH**/ ?>