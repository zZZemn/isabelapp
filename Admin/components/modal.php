<!-- contact.php -->
<div class="modal" tabindex="-1" role="dialog" id="contactAddContact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-telephone-fill"></i> Add Contact</h5>
            </div>
            <form id="contactFrmAddContact">
                <input type="hidden" name="SubmitType" value="AddNewContact">
                <div class="modal-body">
                    <div class="">
                        <label for="contactName">Contact Name:</label>
                        <input type="text" class="form-control mt-1" name="contactName" id="contactName" required>
                    </div>
                    <div class="mt-3">
                        <label for="contactNo">Contact No:</label>
                        <input type="text" class="form-control mt-1" name="contactNo" id="contactNo" required>
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

<div class="modal" tabindex="-1" role="dialog" id="contactEditContact">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-telephone-fill"></i> Edit Contact</h5>
            </div>
            <form id="contactFrmEditContact">
                <input type="hidden" name="SubmitType" value="EditContact">
                <input type="hidden" name="editHotlineId" id="editHotlineId" value="">
                <div class="modal-body">
                    <div class="">
                        <label for="EditContactName">Contact Name:</label>
                        <input type="text" class="form-control mt-1" name="EditContactName" id="EditContactName" required>
                    </div>
                    <div class="mt-3">
                        <label for="EditContactNo">Contact No:</label>
                        <input type="text" class="form-control mt-1" name="EditContactNo" id="EditContactNo" required>
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
<!-- end of contact.php -->

<!-- news.php -->
<div class="modal" tabindex="-1" role="dialog" id="newsAddNewsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-newspaper"></i> Add News Update</h5>
            </div>
            <form id="newsFrmAddNews">
                <input type="hidden" name="SubmitType" value="AddNewsUpdate">
                <div class="modal-body">
                    <div class="">
                        <label for="newsName">Name:</label>
                        <input type="text" class="form-control mt-1" name="newsName" id="newsName" required>
                    </div>
                    <div class="">
                        <label for="newsDescription">Description:</label>
                        <input type="text" class="form-control mt-1" name="newsDescription" id="newsDescription" required>
                    </div>
                    <div class="mt-3">
                        <label for="newsAddress">Address:</label>
                        <input type="text" class="form-control mt-1" name="newsAddress" id="newsAddress" required>
                    </div>
                    <div class="mt-3">
                        <label for="newsMap">Map:</label>
                        <textarea class="form-control mt-1" name="newsMap" id="newsMap" required></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="newsDate">Date:</label>
                        <input type="date" class="form-control mt-1" name="newsDate" id="newsDate" required>
                    </div>
                    <div class="mt-3">
                        <label for="newsTime">Time:</label>
                        <input type="time" class="form-control mt-1" name="newsTime" id="newsTime" required>
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

<div class="modal" tabindex="-1" role="dialog" id="newsEditNewsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-newspaper"></i> Add News Update</h5>
            </div>
            <form id="newsFrmEditNews">
                <input type="hidden" name="SubmitType" value="EditNews">
                <input type="hidden" name="newsId" id="newsId" value="">
                <div class="modal-body">
                    <div class="">
                        <label for="EditNewsName">Name:</label>
                        <input type="text" class="form-control mt-1" name="EditNewsName" id="EditNewsName" required>
                    </div>
                    <div class="">
                        <label for="EditNewsDescription">Description:</label>
                        <input type="text" class="form-control mt-1" name="EditNewsDescription" id="EditNewsDescription" required>
                    </div>
                    <div class="mt-3">
                        <label for="EditNewsAddress">Address:</label>
                        <input type="text" class="form-control mt-1" name="EditNewsAddress" id="EditNewsAddress" required>
                    </div>
                    <div class="mt-3">
                        <label for="EditNewsDate">Date:</label>
                        <input type="date" class="form-control mt-1" name="EditNewsDate" id="EditNewsDate" required>
                    </div>
                    <div class="mt-3">
                        <label for="EditNewsTime">Time:</label>
                        <input type="time" class="form-control mt-1" name="EditNewsTime" id="EditNewsTime" required>
                    </div>
                    <div class="mt-3">
                        <label for="EditNewsMap">Map:</label>
                        <textarea class="form-control mt-1" name="EditNewsMap" id="EditNewsMap" required></textarea>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <label for="MapPrev">Map Preview:</label>
                        <div id="MapPrev" class="mt-3" style="max-width: 100%; overflow: auto;">

                        </div>
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
<!-- End of news.php -->

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