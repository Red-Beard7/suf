<!--#################################################    VIEW MODALS   ##############################################-->

<!--&&&===    DELETE PRODUCT    ===&&&-->
<div class="modal fade" id="delete_product_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('admin.delete.product')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <p class="small text-muted">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="product_id" name="product_id">
                    <input type="hidden" id="image_name" name="image_name">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--#################################################    PRODUCTS MODALS    #########################################-->

<!--&&&===    EDIT PRODUCT TABLE    ===&&&-->
<?php if(isset($product)): ?>
    <div class="modal fade" id="edit_product_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?php echo e(url()->current()); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-0">Title</label>
                                <input type="text" name="title" class="form-control crud_form" value="<?php echo e($product['title']); ?>"
                                       placeholder="Title" aria-label>
                            </div>
                            <div class="form-group col">
                                <label class="mb-0">Brand</label>
                                <select name="brand" class="mt-2 form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> crud_form" aria-label required>
                                    <option selected hidden value="">Select a brand*</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($brand['id'] === $product['brand_id']): ?> selected <?php endif; ?> value="<?php echo e($brand['id']); ?>"><?php echo e($brand['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php if(isSeller()): ?>
                                <input type="hidden" name="seller" value="<?php echo e(Auth::id()); ?>">
                            <?php else: ?>
                                <div class="form-group col">
                                    <label class="mb-0">Seller</label>
                                    <select id="sellers" name="seller" class="form-control <?php $__errorArgs = ['seller'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> crud_form" aria-label required>
                                        <option selected hidden value="">Select a seller*</option>
                                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($seller['user_id'] === $product['seller_id']): ?> selected <?php endif; ?> value="<?php echo e($seller['user_id']); ?>"><?php echo e($seller['username']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="form-group col">
                                <label class="mb-0">Category</label>
                                <select id="categories" class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> crud_form" name="sub_category" aria-label required>
                                    <option selected hidden value="">Select a category *</option>
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="<?php echo e($section['title']); ?>"></optgroup>
                                        <?php $__currentLoopData = $section['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup label=" &nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($category['title']); ?>"></optgroup>
                                            <?php $__currentLoopData = $category['sub_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($subCat['id'] === $product['category_id']): ?> selected <?php endif; ?> value="<?php echo e($subCat['id']); ?>"> &nbsp;&nbsp;&nbsp;&nbsp; ------ <?php echo e($subCat['title']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-0">Label</label>
                                <input type="text" name="label" class="form-control crud_form" value="<?php echo e($product['label']); ?>"
                                       placeholder="Label" aria-label>
                            </div>
                            <div class="form-group col">
                                <label class="mb-0">Keywords</label>
                                <input type="text" name="keywords" class="form-control crud_form" value="<?php echo e($product['keywords']); ?>"
                                       placeholder="Keywords" aria-label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-0">Base Price</label>
                                <input type="number" name="base_price" class="form-control crud_form" value="<?php echo e($product['base_price']); ?>"
                                       placeholder="Base price" aria-label>
                            </div>
                            <div class="form-group col">
                                <label class="mb-0">Discount (%)</label>
                                <input type="number" name="discount" max="99" min="0" class="form-control crud_form" value="<?php echo e($product['discount']); ?>"
                                       placeholder="Discount" aria-label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Description</label>
                            <textarea  name="description" class="form-control crud_form"
                                       rows="4" placeholder="Description..." aria-label><?php echo e($product['description']); ?>"</textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" <?php if($product['is_featured'] === 'Yes'): ?> checked <?php endif; ?>>
                                <label class="custom-control-label" for="is_featured">Featured</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!--&&&===    ADD VARIATION MODAL    ===&&&-->
    <div class="modal fade" id="add_variation" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.create.variation', ['id' => $product['id']])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Variation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            Attribute
                            <select class="form-control" id="attribute" name="attribute" style="width: 100%" aria-label required>
                                <option selected hidden value="">Select an attribute</option>
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($attr['id']); ?>"><?php echo e($attr['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            Value(s)
                            <select class="variation form-control" id="values_s2" name="variation_options[]" style="width: 100%" aria-label>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--&&&===    SET PRICE MODAL    ===&&&-->
    <div class="modal fade" id="set_price" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.update.extra-price', ['id' => $product['id']])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Extra Price</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="number" name="price" class="form-control" placeholder="Enter price" aria-label autofocus required>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="variation_option_id">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Set</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--&&&===    SET STOCK MODAL    ===&&&-->
    <div class="modal fade" id="set_stock" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.update.stock', ['id' => $product['id']])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="number" name="stock" class="form-control" placeholder="Enter stock amount" aria-label>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="variation_option_id">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Set</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--&&&===    ADD IMAGE MODAL    ===&&&-->
    <div class="modal fade" id="add_image_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.create.product-image', ['id' => $product['id']])); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Image(s)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" multiple="" name="images[]" class="custom-file-input crud_form"  accept=".jpg,.png,.jpeg,image/*" required>
                                <label class="custom-file-label crud_form file">Choose image(s)</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_id" value="<?php echo e($product['id']); ?>">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>



<!--#################################################    ATTRIBUTE MODALS    #########################################-->

<!--&&&===    CREATE ATTRIBUTE    ===&&&-->
<div class="modal fade" id="add_attribute" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('admin.create.attribute')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" aria-label required>
                    </div>
                    <div class="form-group">
                        <select class="form-control select2-multiple" name="values" multiple="multiple" style="width: 100%" aria-label>
                            <option>orange</option>
                            <option>white</option>
                            <option>purple</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--&&&===    CREATE BRAND    ===&&&-->
<div class="modal fade" id="brand" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="create_brand" action="<?php echo e(route('admin.create.brand')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Brand name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-label required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="brand_id" id="brand_id">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_update_brand" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/nabcellent-7/Desktop/PHP/My Projects/suf-laravel/resources/views/Admin/products/modals.blade.php ENDPATH**/ ?>