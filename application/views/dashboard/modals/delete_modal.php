<!-- MODAL FOR POST DELETE-->
<div class="modal modal-sm fade" id="delete-post-modal" tabindex="-1" role="dialog" aria-labelledby="delete-post-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup delete-post-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Delete Post</h6>
            </div>

            <div class="modal-body">
                <?php
                $attributes = array(
                    "id" => "delete_form",
                    "enctype" => "multipart/form-data",
                );
                echo form_open("Dashboard/deletePost", $attributes);
                ?>

                    <div class="form-actions">
                        <button type="button" id="delete_post" class="btn btn-primary float-right "><i class="fa fa-check"></i> Delete</button>
                        <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR POST DELETE-->


<!-- MODAL FOR SKILL DELETE-->
<div class="modal modal-sm fade" id="delete-skill-modal" tabindex="-1" role="dialog" aria-labelledby="delete-skill-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup delete-skill-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Delete Skill</h6>
            </div>

            <div class="modal-body">
                <?php
                $attributes = array(
                    "id" => "delete_form",
                    "enctype" => "multipart/form-data",
                );
                echo form_open("Dashboard/deleteSkill", $attributes);
                ?>

                <div class="form-actions">
                    <button type="button" id="delete_skill_btn" class="btn btn-primary float-right "><i class="fa fa-check"></i> Delete</button>
                    <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR SKILL DELETE-->

<!-- MODAL FOR CERTIFICATE DELETE-->
<div class="modal modal-sm fade" id="delete-certificate-modal" tabindex="-1" role="dialog" aria-labelledby="delete-certificate-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup delete-certificate-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Delete Certificate</h6>
            </div>

            <div class="modal-body">
                <?php
                $attributes = array(
                    "id" => "delete_form",
                    "enctype" => "multipart/form-data",
                );
                echo form_open("Dashboard/deleteCertificate", $attributes);
                ?>

                <div class="form-actions">
                    <button type="button" id="delete_certificate_btn" class="btn btn-primary float-right "><i class="fa fa-check"></i> Delete</button>
                    <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR CERTIFICATE DELETE-->


<!-- MODAL FOR Work Experience DELETE-->
<div class="modal modal-sm fade" id="delete-workexp-modal" tabindex="-1" role="dialog" aria-labelledby="delete-workexp-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup delete-workexp-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Delete Work Experience</h6>
            </div>

            <div class="modal-body">
                <?php
                $attributes = array(
                    "id" => "delete_form",
                    "enctype" => "multipart/form-data",
                );
                echo form_open("Dashboard/deleteWorkExperience", $attributes);
                ?>

                <div class="form-actions">
                    <button type="button" id="delete_workexp_btn" class="btn btn-primary float-right "><i class="fa fa-check"></i> Delete</button>
                    <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR Work Experience DELETE-->


<!-- MODAL FOR PROJECT DELETE-->
<div class="modal modal-sm fade" id="delete-project-modal" tabindex="-1" role="dialog" aria-labelledby="delete-project-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup delete-project-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Delete Project</h6>
            </div>

            <div class="modal-body">
                <?php
                $attributes = array(
                    "id" => "delete_form",
                    "enctype" => "multipart/form-data",
                );
                echo form_open("Dashboard/deleteProject", $attributes);
                ?>

                <div class="form-actions">
                    <button type="button" id="delete_project_btn" class="btn btn-primary float-right "><i class="fa fa-check"></i> Delete</button>
                    <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR PROJECT DELETE-->