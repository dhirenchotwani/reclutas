<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/9/2018
 * Time: 7:44 PM
 */
?>
<!-- MODAL FOR REPORT-->
<div class="modal modal-sm fade" id="report-post-modal" tabindex="-1" role="dialog" aria-labelledby="report-post-modal" aria-hidden="true" style="margin: 10% auto 0;">
    <div class="modal-dialog window-popup report-post-modal" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Report Post</h6>
            </div>

            <div class="modal-body">
                <form action="">

                    <div class="form-group">
                        <label class="control-label">Select a reason to Report</label>
                        <select name="report_reason_id" class="form-control reasons_list" id="report_reason_id" style="width: 100%;">
                            <option value="0" selected disabled>Reason Of Reporting</option>
                            <?php
                            foreach ($report_reasons->result_array() as $reason) {
                                extract($reason);
                                ?>
                                <option value="<?php echo $report_reason_id; ?>"><?php echo $reason_text; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-primary float-right " id="report_news_feed_button"><i class="fa fa-check"></i> Report</button>
                        <button  data-dismiss="modal" class="btn btn-grey-light float-right mr-3"><i class="fa fa-times"></i> Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR PROJECTS-->
