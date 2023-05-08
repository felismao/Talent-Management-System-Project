<style>
    .row {
        white-space: nowrap;
    }

    .row > div {
        width: 300px;
        display: inline-block;
    }

    h2{
        color:#000000!important;
    }
    p, li, div{
        color:#000000!important;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        left: 0;
    }

    input::-webkit-datetime-edit {
        position: relative;
        left: 15px;
    }

    input::-webkit-datetime-edit-fields-wrapper {
        position: relative;
        left: 15px;
    }

    input:hover, textarea:hover, select:hover {
        outline: none;
        border: 1px solid #095484;
        background: #e6eef7;
    }
    .title-block select, .title-block input {
        margin-bottom: 10px;
    }


</style>
<?= $this->Html->css('form.css') ?>

<body style="background-color:#ffffff;">

<main id="main" data-aos="fade" data-aos-delay="1500">

    <section id="about" class="about">
        <div class="container">
            <div class="container" style="padding: 20%">
                <?= $this->Form->create($user) ?>
                <form>
                    <h2>Add User</h2>

                    <div class="colums">
                        <div class="item">
                            <label for="name">Username<span>*</span></label>
                            <?php echo $this->Form->input('username', array('placeholder'=>"johndoe"));?>
                        </div>
                        <div class="item">
                            <label for="name">Email<span>*</span></label>
                            <?php echo $this->Form->input('email', ['placeholder'=>"johndoe@gmail.com"])?>
                        </div>
                        <div class="item">
                            <label for="name">Password<span>*</span></label>
                            <?php echo $this->Form->input('password',['type'=>'password']);?>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 text-center" style="padding-bottom: 25px">
                                <?= $this->Form->button(__('Submit'),['class'=>'button-submit']) ?>
                            </div>
                        </div>
                    </div>

                    <?= $this->Form->end() ?>
    </section><!-- End About Section -->
</main>
