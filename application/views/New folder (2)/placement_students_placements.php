<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                 <div class="home_steps well text-justify noborder">
                    <h2>Add placement details</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/placement/add_placements', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                        
                        <tr>
                            <td>
                                <label for="company">Company</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="company" placeholder="Company Name" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="details">Details</label>
                            </td>
                            <td><textarea class="form-control margin_bottom_10" name="details" placeholder="Details"  required></textarea>
                            </td>

                        </tr>

                         <?php if (isset($placements_form_error_msg)) if ($placements_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $placements_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($placements_form_success_msg)) if ($placements_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $placements_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                                <br>
                            </td>
                        </tr>

                        </table>
                        </div>
                        </form>
                </div>
                <div class="home_steps well text-justify noborder">
                    <h2>Placement Details</h2>
                    <br />
                    <br />
                     <div class="responsive-table">
                    <table class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                    <thead>
                       <th>Company</th>
                       <th>Details</th>
                       
                    </thead>
                    <?php foreach ($placements_data as $placement):?>
                    <tr>
<td><?php echo( $placement['company']) ?></td>
<td><?php echo( $placement['details']) ?></td>
 </tr>
                <?php endforeach; ?>

                    </table>
                    </div>
                    <div id="result"></div>
                </div>
            </div>
            
        </div>


    </div>




</div>

