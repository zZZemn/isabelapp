<!-- contact.php -->
<div class="modal" tabindex="-1" role="dialog" id="contactAddContact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-telephone-fill"></i> Contact</h5>
            </div>
            <form id="contactFrmAddContact">
                <input type="hidden" name="SubmitType" value="AddNewContact">
                <div class="modal-body">
                    <div class="">
                        <label for="contactName">Contact Name:</label>
                        <input type="text" class="form-control mt-1" name="contactName" id="contactName" required">
                    </div>
                    <div class="mt-3">
                        <label for="contactNo">Contact No:</label>
                        <input type="text" class="form-control mt-1" name="contactNo" id="contactNo" required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary btnCloseModal" id="btnCloseModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal" tabindex="-1" role="dialog" id="contactEditContact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-telephone-fill"></i> Contact</h5>
            </div>
            <form id="contactFrmEditContact">
                <input type="hidden" name="SubmitType" value="EditContact">
                <input type="hidden" name="editHotlineId" id="editHotlineId" value="">
                <div class="modal-body">
                    <div class="">
                        <label for="EditContactName">Contact Name:</label>
                        <input type="text" class="form-control mt-1" name="EditContactName" id="EditContactName" required">
                    </div>
                    <div class="mt-3">
                        <label for="EditContactNo">Contact No:</label>
                        <input type="text" class="form-control mt-1" name="EditContactNo" id="EditContactNo" required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary btnCloseModal" id="btnCloseModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <div class="modal" tabindex="-1" role="dialog" id="AddImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-cloud-arrow-up"></i> New Image</h5>
            </div>
            <form id="frmUploadImage">
                <div class="modal-body">
                    <input type="hidden" value="SMEsUploadNewImage" name="SubmitType" id="accomId">
                    <input type="hidden" value="" name="ID" id="accomId">
                    <div class="">
                        <label for="accomImage" style="margin-left: 5px;">Upload Here:</label>
                        <input type="file" class="form-control mt-1" name="accomImage" id="accomImage" required accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary btnCloseModal" id="btnCloseModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->