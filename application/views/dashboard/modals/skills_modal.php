<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/10/2018
 * Time: 12:13 PM
 */
?>

        <!-- MODAL FOR SKILLS-->
        <div class="modal fade" id="skills_modal" tabindex="-1" role="dialog" aria-labelledby="skills_modal"
             aria-hidden="true">
            <div class="modal-dialog window-popup skills_modal" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="title">ADD SKILLS</h6>
                    </div>

                    <div class="modal-body">
                        <?php
                        $attributes = array(
                            "id" => "skills_form"
                        );
                        echo form_open("Dashboard/addSkills", $attributes);
                        ?>
                            <div class="form-group">
                                <label class="control-label">Skills</label>
                                <select name="student_skills[]" class="form-control student_skills" multiple="multiple"
                                        id="student_skills" data-placeholder="Select Skills to add"
                                        style="width: 100%;">

                                    <?php
                                    foreach ($skills->result_array() as $skill) {
                                        extract($skill);
                                    ?>
                                        <option value="<?php echo $skill_id; ?>"><?php echo $skill_name; ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>

                                <br>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="other_skills" name="skills"><span class="checkbox-material"></span>
                                        Other Skills
                                    </label>
                                </div>
                                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group label-floating is-empty" id="other-skill" hidden>
                                        <label class="control-label">Other Skill</label>
                                        <input class="form-control" type="text" name="other_skills">
                                        <span class="material-input"></span></div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary float-right "><i class="fa fa-check"></i>
                                    Add
                                </button>
                                <button type="reset" data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i
                                        class="fa fa-times"></i> Close
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL FOR PROJECTS-->


