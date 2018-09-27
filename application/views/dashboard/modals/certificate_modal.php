<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/9/2018
 * Time: 12:40 AM
 */
?>
<!-- MODAL FOR CERTIFICATES-->
<div class="modal fade" id="update-certificate-modal" tabindex="-1" role="dialog" aria-labelledby="update-certificate-modal" aria-hidden="true">
    <div class="modal-dialog window-popup update-project-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title" id="certificate_title">Add new Certificate</h6>
            </div>

            <div class="modal-body">
                <form action="../dashboard/addCertificates" method="post" id="certificates_form" enctype="multipart/form-data">
                    <div hidden>
                        <input type="text" id="certificate_id" name="certificate_id">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Certificate Name*</label>
                        <input class="form-control" type="text" placeholder="Certificate Name" name="certificate_name" id="certificate_name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Certificate Image*</label>
                        <input class="form-control" type="file" accept="image/*,application/pdf" placeholder="" name="certificate_image">
                        <img src="" alt="Certificate Image" id="certificate_image" hidden>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Certificate Description*</label>
                        <input class="form-control" type="text" placeholder="Certificate Description" name="certificate_discription" id="certificate_discription">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 date-time-picker">
                            <label class="control-label">Start Date</label>
                            <input class="form-control" type="text" placeholder="Start Date" name="start_datetimepicker" value="10/24/2017" id="start_certi_date">
                        </div>
                        <div class="form-group col-md-6 date-time-picker">
                            <label class="control-label">End Date</label>
                            <input class="form-control" type="text" placeholder="Ending Date" name="end_datetimepicker" id="end_certi_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Institute Name*</label>
                        <input class="form-control" type="text" placeholder="Institute Name" name="institute_name" id="institute_name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Certificate License Number</label>
                        <input class="form-control" type="text" placeholder="Enter your Certificate License Number" name="certificate_license_number" id="certificate_license_number"> </div>
                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary float-right" id="add_certificate"><i class="fa fa-check"></i> Save</button>
                        <button type="reset" id="clearcertificateform" data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR CERTIFICATES-->