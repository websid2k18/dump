<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <?php $this->view('under_construction'); ?>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                       <?php $this->view('placement_news',$news_data); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                         <?php $this->view('placement_login_sidebar'); ?>
                    </div>
                </div>


            </div>
        </div>


    </div>




</div>


