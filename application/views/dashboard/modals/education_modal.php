<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/9/2018
 * Time: 12:40 AM
 */
?>
<!-- MODAL FOR EDUCATION-->

<div class="modal fade" id="education-modal" tabindex="-1" role="dialog" aria-labelledby="education-modal" aria-hidden="true">
	<div class="modal-dialog window-popup education-modal" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Add Education</h6>
			</div>

			<div class="modal-body">
				<?php
				$attributes = array(
					"id" => "education_form"
				);
				echo form_open("Dashboard/addEducation", $attributes);
				?>
					<div class="form-group">
						<label class="control-label">College*:</label>
						<input class="form-control" type="text" placeholder="College Name" name="institute_name">
					</div>
					<div class="row">
						<div class="form-group col-md-6 date-time-picker">
							<label class="control-label">Start Date</label>
							<select class="selectpicker form-control" name="admission_year" id="admission_year"></select>
						</div>
						<div class="form-group col-md-6 date-time-picker">
							<label class="control-label">End Date</label>
							<select class="selectpicker form-control" name="passout_year" id="passout_year"></select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 date-time-picker">
							<label class="control-label">Degree</label>
							<select class="selectpicker form-control" name="education_name" id="education_name">
								<?php
									foreach ($degree->result_array() as $deg){
										extract($deg);
										?>
										<option value="<?php echo $education_type_id; ?>"> <?php echo $education_name; ?></option>
										<?php
									}
									?>
							</select>
						</div>
						<div class="form-group col-md-4 date-time-picker">
							<label class="control-label">Performance Scale</label>
							<select class="selectpicker form-control" name="type_name" id="type_name">
								<?php
								foreach ($performanceScale->result_array() as $scale){
									extract($scale);
									?>
									<option value="<?php echo $student_education_result_type_id; ?>"> <?php echo $type_name; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label class="control-label">Performance</label>
							<input class="form-control" type="text" placeholder="" name="student_result">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary float-right" id="submit_certificate"><i class="fa fa-check"></i> Save</button>
						<button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- MODAL FOR EDUCATION-->
