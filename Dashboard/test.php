<!-- Modal for adding new Partner -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" role="dialog" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPartnerModalLabel">Add Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a new Partner -->
                        <form id="addPortfolioForm" action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="PartnerTitle" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="PartnerTitle" name="PartnerName" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="PartnerCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="PartnerCategory" name="Description" placeholder="Enter Discription">
                            </div>
                            <div class="">
                                <label for="image1" class="form-label">Company Logo</label>
                                <input type="File" class="form" id="image" name="PartnerImage" placeholder="Upload Imgae">
                            </div>
                            <div class="mb-3">
                                <label for="PartnerDuration" class="form-label">Partner Duration</label>
                                <input type="text" class="form-control" id="PartnerUrl" name="PartnerDuration" placeholder="Enter Partner Duration">
                            </div>                            
                            <!-- You can add more fields as needed -->
                            <div class="mb-3">
                                <label for="PartnerStatus" class="form-label"> Partner Status</label>
                                <input type="radio" name="PartnerStatus" id="ongoingSelect" checked>
                                <label for="ongoingSelect">Ongoing</label>
                                <input type="radio" name="PartnerStatus" id="completedSelect">
                                <label for="completedSelect">Completed</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="savePortfolioBtn">Save changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>