<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/8/2018
 * Time: 11:02 PM
 */
?>
<!-- MODAL FOR WORK EXPERIENCE-->
<div class="modal fade" id="update-experience-modal" tabindex="-1" role="dialog" aria-labelledby="update-experience-modal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog window-popup update-project-modal" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="title" id="work_exp_title">Add Work Experience</h6>
            </div>

            <div class="modal-body">
                <form action="../dashboard/addWorkExperience" method="post" id="work_experience_form" enctype="multipart/form-data">
                    <div hidden>
                        <input type="text" id="student_work_experience_id" name="student_work_experience_id">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Name*</label>
                        <input class="form-control" type="text" placeholder="Company name" name="company_name" id="company_name">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 date-time-picker">
                            <label class="control-label"  name="datetimepicker">Start Date</label>
                            <input class="form-control" type="text" placeholder="Start Date" name="start_date" id="starting_date" >
                        </div>
                        <div class="form-group col-md-6 date-time-picker" id="hide_date">
                            <label class="control-label">End Date</label>
                            <input class="form-control" type="text" placeholder="Ending Date" name="end_date" id="ending_date">
                        </div>
                    </div>
                    <div class="checkbox" >
                        <label>
                            <input type="checkbox" name="currently_ongoing" id="currently_ongoing">
                            Currently Working
                        </label>
                    </div>
                    <div class="form-group"  id="letter_of_recommendation">
                        <label class="control-label">Letter Of Recommendation*</label>
                        <input class="form-control" type="file" accept="image/*,application/pdf" placeholder="" name="letter_of_recommendation">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Work Role</label>
                        <input class="form-control" type="text" placeholder="Enter your contribution" name="work_role" id="work_role">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary float-right" id="add_work_exp"><i class="fa fa-check"></i> Save</button>
                        <button type="reset" id="clearworkexperienceform" data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR WORK EXPERIENCE-->

