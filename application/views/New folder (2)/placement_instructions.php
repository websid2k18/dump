<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <div class="home_steps well text-justify noborder">
                    <h2>Steps to be followed</h2>
                    <br>
                    
                    <h3>Students</h3>
                    <ol>
                        <li>For new registration, click on the 'STUDENT' link in the bottom of login panel.</li>
                        <li>Enter your name,Email-Id,Mobile  Number,any username,password you desire and your university register number.</li>
                        <li>You could login only after admin verifies your account and a confirmation mail would be sent to the Email-Id you provided</li>
                        <li>After successful registration, enter your username in the username box and your password in password box and click login under Login Panel.</li>
                        <li>Click on the 'Edit Details' option in left 'Actions' panel and enter your details. Press 'Update' button.</li>
                        <li>Click on 'Your Marks' option in left panel to add marks of your semesters.</li>
                        <li>Click Add button next to each semester and enter your marks and status of each subject. You can get marks of all your exams from <a href="http://results.cusat.ac.in/">http://results.cusat.ac.in/</a></li>
                        <li>You can use Edit or Delete button for changing already entered marks.</li>
                        <li>Whenever you edit your marks your account would be deactivated for verification of marks by admin.</li>
                        <li>Entering incorrect marks may lead to account suspension for a period of three months.</li>
                        <li>During the period of suspension you wouldn't be eligible for placement related activities.</li>
                        <li>Press Logout link in top right corner.</li>
                    </ol>
                    <br>
                    <h3>Companies</h3>
                    <ol>
                        <li>For new registration, click on the 'COMPANY' link in the bottom of login panel.</li>
                        <li>Enter your Company Name,your Web Site,Email-Id,Mobile  Number,any username you desire and your password.</li>
                        <li>You could login only after admin verifies your account and a confirmation mail would be sent to the Email-Id you provided.</li>
                        <li>After successful registration, enter your username in the username box and your password in password box and click login under Login Panel.</li>
                        <li>You could view student's details, their academic performance placement history and resume</li>
                        <li>You could directly send job offers to students also.</li>
                        <li>Press Logout link in top right corner.</li>
                    </ol>
                    <br>
                </div>
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


