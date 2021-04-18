
<!--#################################################    MODALS    #################################################-->

<!--&&&===    CREATE SECTION    ===&&&-->
<div class="modal fade" id="add_section" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/products/categories" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" aria-label required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--&&&===    CREATE/UPDATE CATEGORIES    ===&&&-->
<div class="modal fade" id="category_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm_add_category" action="/products/categories" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label>Title</label>
                            <input type="text" class="form-control" id="cat_title" name="title" aria-label required>
                        </div>
                        <div class="form-group col">
                            <label>Discount</label>
                            <input type="number" class="form-control" min="0" max="99" id="discount" name="discount" aria-label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control" name="description" aria-label></textarea>
                    </div>
                    <div id="cat_check_group" class="form-group">
                        <label>Select Sections</label>
                        <% categoryInfo.sections.forEach((row) => { %>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="sections" value="<%= row.id %>" id="<%= row.id %>">
                            <label class="custom-control-label" for="<%= row.id %>"><%= row.title %></label>
                        </div>
                        <% }); %>
                    </div>
                    <div id="cat_radio_group" class="form-group">
                        <label>Select Section</label>
                        <% categoryInfo.sections.forEach((row) => { %>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="<%= row.title %>" name="section" value="<%= row.id %>" class="custom-control-input" required>
                            <label class="custom-control-label" for="<%= row.title %>"><%= row.title %></label>
                        </div>
                        <% }); %>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="category_id" name="category_id">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--&&&===    SUB-CATEGORIES    ===&&&-->
<div class="modal fade" id="sub_category_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/products/sub-category" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="section">Section</label>
                            <select name="section" id="section" class="form-control" required>
                                <option selected hidden value="">Select *</option>
                                <% categoryInfo.sections.forEach((row) => { %>
                                <option value="<%= row.id %>"><%= row.title %></option>
                                <% }) %>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option selected hidden value="">Select *</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-label required>
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="number" class="form-control" min="0" max="99" name="discount" aria-label>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" class="form-control" name="description" aria-label></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="sub_category_id" name="sub_category_id">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>