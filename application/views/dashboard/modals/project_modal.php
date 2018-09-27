<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/8/2018
 * Time: 11:13 PM
 */
?>
<!-- MODAL FOR PROJECTS-->
<div class="modal fade" id="update-project-modal" tabindex="-1" role="dialog" aria-labelledby="update-project-modal" aria-hidden="true">
    <div class="modal-dialog window-popup update-project-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Add New Project</h6>
            </div>

            <div class="modal-body">
                    <?php
                        $attributes = array(
                            "id" => "project_form"
                        );
                        echo form_open_multipart("Dashboard/addProject", $attributes);
                    ?>

                    <div class="form-group">
                        <label class="control-label">Title*</label>
                        <input class="form-control" type="text" placeholder="Project name" name="project_name">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 date-time-picker">
                            <label class="control-label">Start Date</label>
                            <input class="form-control" type="text" placeholder="Start Date" name="start_date" value="10/24/2017" id="start_date">
                        </div>
                        <div class="form-group col-md-6 date-time-picker hide-date">
                            <label class="control-label">End Date</label>
                            <input class="form-control" type="text" placeholder="Ending Date" name="end_date" id="end_date" >
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="currently_ongoing_project" id="currently_ongoing_project" >
                            Currently Working
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description*</label>
                        <input class="form-control" type="text" placeholder="Project Description" name="project_description">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Project Link</label>
                        <input class="form-control" type="text" placeholder="URL of your project" name="project_link">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Project Snapshot*</label>
                        <input class="form-control" multiple="multiple" type="file" placeholder="Snaps of your project" name="project_snap[]">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Faculty Name</label>
                        <select name="faculty_member" class="form-control faculty_member" 
                                id="faculty_member" data-placeholder="Select Faculty " style="width: 100%;">
                            <option value="0" selected disabled>Select Faculty</option>
                            <option value="-1"> Own</option>
                                <?php
                                    foreach ($faculty->result_array() as $faculties) {
                                        extract($faculties);                                                            $fullname = $faculty_first_name ." ". $faculty_last_name;

                                    ?>
                                    <option value="<?php echo $faculty_id; ?>">
                                        <?php echo $fullname; ?>
                                    </option>
                                    <?php
                                    }
                            ?>
                        </select>
                    </div>

                    <div class="form-group add-student-form">
                        <div class="row" id="student-form">
                        
                            <div class="col col-md-5">
                                <label class="control-label">Student Name</label>
                                <select  name="team_members[]" id="team_members0" class='form-control team_members' data-placeholder='Select Team Members' style='width: 100%;'>
                                <!--<select name="team_members[]" id="team_members0" disabled class=" form-control" data-placeholder="Select Team Members" style="width: 100%;">-->
                                <option value="<?php echo $student_id; ?>" selected ><?php echo $student_first_name . " " . $student_last_name; ?></option>
                            </select>
                            </div>
                            <div class="col col-md-5">
                                <label>Role</label>
                                <input type="text" name="project_role[]" id="project_role0">
                            </div>
                                                    
                        </div><!-- end of row -->

                        
                    </div><!-- end of form group -->


                    <div class="row">
                        <div class="col col-md-1">
                            <button type="button" class="btn btn-primary btn-sm add-more-students" name="add_more_roles">ADD</button>
                        </div>
                    </div>

                   

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary float-right" id="HeyHere"><i class="fa fa-check"></i> Save</button>

                        <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR PROJECTS-->