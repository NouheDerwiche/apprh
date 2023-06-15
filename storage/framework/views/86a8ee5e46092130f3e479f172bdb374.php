<?php $__env->startSection('content'); ?>






                <!--begin::Content-->
                <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">


                    <!--begin::Post-->
                    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class=" container-xxl ">
                            <!--begin::Card-->
                            <div class="card ">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <h2 class="card-title fw-bold text-center">
                                        Calendrier
                                    </h2>

                                    <div class="card-toolbar">
                                        <a href="<?php echo e(route('tache.create')); ?>" class="btn btn-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2"><svg width="24" height="24"
                                                    viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11.364" y="20.364"
                                                        width="16" height="2" rx="1"
                                                        transform="rotate(-90 11.364 20.364)" fill="currentColor">
                                                    </rect>
                                                    <rect x="4.36396" y="11.364" width="16"
                                                        height="2" rx="1" fill="currentColor"></rect>
                                                </svg></span>
                                            <!--end::Svg Icon-->
                                            Ajouter une tache
                                            </a>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                <div class="card-body">
                    <div class="calendar-container" wire:ignore>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('calendar', [])->html();
} elseif ($_instance->childHasBeenRendered('bQ6Wxli')) {
    $componentId = $_instance->getRenderedChildComponentId('bQ6Wxli');
    $componentTag = $_instance->getRenderedChildComponentTagName('bQ6Wxli');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bQ6Wxli');
} else {
    $response = \Livewire\Livewire::mount('calendar', []);
    $html = $response->html();
    $_instance->logRenderedChild('bQ6Wxli', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <?php echo \Livewire\Livewire::scripts(); ?>

                    <?php echo $__env->yieldPushContent('scripts'); ?>
                </div>
                <!--end::Card body-->




                   </div>
                            <!--end::Card-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/calendar.blade.php ENDPATH**/ ?>