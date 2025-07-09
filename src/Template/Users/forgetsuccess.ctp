<?php if(@$error != ""){?>
<div id="error"><?php echo $error; ?></div>
<?php }?>


<div class="row justify-content-center align-items-center bg-red">
    <div class="col-sm-7">
        <div class="col-md-2 logo" style="left: 4%;"><img
                src="<?php echo $this->Url->build('/', true)?>img/TamilNadu_Logo.png" class="img-fluid"></div>
        <h1 class="text-white logo col-md-10"><strong style="font-weight: bold;">Archives and Historical Research
                Department</strong><br><small>Chennai</small></h1>
        <div class="overlay"></div>
        <div id="text"></div>
    </div>
    <div class="col-sm-4 card m-t-1">
        <div class="card-body">

            <?php echo $this->Form->create($user, ['id'=>'FormID', 'class'=>'form-horizontal col-md-12', "autocomplete"=>"off", 'enctype'=>'multipart/form-data']);?>
            <h4 class="m-t-0 header-title text-center" style="padding-bottom:20px;">Forget Password</h4>
            <div class="error-msg">
                <center><?php echo $this->Flash->render() ?></center>
            </div>
            <div class="row" style="background-color:#FFF;">
                <div class="container">
                    <div class="page-form col-md-12 col-xs-12 mt-30">
                        <div class="body-content">
                            <p>Your Password has been reset.Your Credentials have been sent to your registered
                                E-Mail</p>
                        </div>
                        <div>
                            <div class="col-md-3 backtxt" style="color:blue;margin-top:10px;">
                                <?php echo $this->Html->link('Go to Login', array('controller' => 'users','action'=>'login')); ?>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>